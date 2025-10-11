<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\EnviarMensagensModel;
use App\Models\AlunoModel; 
use App\Models\AlunoTelefoneModel; 
use App\Models\ControleRefeicoesModel; 
use App\Models\TurmaModel;
use App\Libraries\EvolutionAPI;
use App\Helpers\QrCodeGenerator;

class ProcessaEnvioMensagens extends BaseCommand
{
    protected $group = 'App';
    protected $name = 'command:processa-envio-mensagens';
    protected $description = 'Envia as mensagens dos agendamentos das refeições';

    public function run(array $params)
    {
        $enviarMensagensModel = new EnviarMensagensModel();
        $alunoModel = new AlunoModel();
        $turmaModel = new TurmaModel();
        $controleRefeicao = new ControleRefeicoesModel();
        $alunoTelefoneModel = new AlunoTelefoneModel();
        $qrCodeGenerator = new QrCodeGenerator();
        $wpp = new EvolutionAPI();

        $mensagens = $enviarMensagensModel
                    ->where('status', 0)
                    ->orderBy('data_cadastro', 'ASC')
                    ->limit(3)
                    ->findAll();

         if (empty($mensagens)) {
            return; //Se não tiver nenhuma
        }

        CLI::write('Iniciando o processamento do envio da mensagem');

        foreach ($mensagens as $mensagem) {
            $sucessoEnvio = false;

            try {
                $categoria = $mensagem['categoria'];
                $destinatario = $mensagem['destinatario'];
                $mensagemTexto = $mensagem['mensagem'];
                $caminhoAnexo = null;

                if ($categoria == 0) {
                    //solicitações
                    
                    $wpp->sendMessage($destinatario, $mensagemTexto);
                    $sucessoEnvio = true;
                    
                } elseif ($categoria == 1) {
                    //qrCodes
                    
                    $alunoTelefone = $alunoTelefoneModel
                                ->where('telefone', $destinatario)
                                ->first(); //depois sera o confirmado

                    $alunoId = $alunoTelefone['aluno_id'];
                    $aluno = $alunoModel->find($alunoId);

                    $refeicao = $controleRefeicao
                                ->where('aluno_id', $alunoId)
                                ->orderBy('id', 'DESC')
                                ->first();

                    $nomeTurmaCurso = $turmaModel->getNomeTurmaComCurso($aluno['turma_id']);

                    $conteudoQrCode = implode('|', [
                        $alunoId,
                        $aluno['nome'],
                        $nomeTurmaCurso,
                        $refeicao['data_refeicao'],
                    ]);

                    try {

                        $qrCodeDataUri = $qrCodeGenerator->generate($conteudoQrCode);
                        $base64Image = preg_replace('#^data:image/\w+;base64,#i', '', $qrCodeDataUri);

                        $wpp->sendMedia($destinatario, $mensagemTexto, $base64Image);

                        $sucessoEnvio = true;

                    } catch (\Throwable $e) {
                        continue;
                    }
                    
                }
                
                if ($sucessoEnvio) {
                    $enviarMensagensModel->update($mensagem['id'], [
                        'status'     => 1, 
                        'data_envio' => date('Y-m-d H:i:s'),
                    ]);
                    CLI::write("Sucesso");
                }
                
                

            } catch (\Exception $e) {
                
                $enviarMensagensModel->update($mensagem['id'], [
                    'status' => 0, // retorna p/ não enviada
                ]);

                CLI::write("Erro ao processar mensagem");
            }

            sleep(20);
        }

    }


}