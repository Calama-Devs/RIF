<?php

namespace App\Controllers;

use App\Models\TurmaModel;
use App\Models\AlunoModel;
use App\Models\AlunoTelefoneModel;
use App\Models\EnviarMensagensModel;
use App\Models\ControleRefeicoesModel;

class AgendamentoController extends BaseController
{
    public function index()
    {
        $controleModel = new ControleRefeicoesModel();
        $data = $controleModel->getViewData(new AlunoModel(), new TurmaModel());
        
        $data['content'] = view('sys/agendamento', $data);
        return view('dashboard', $data);
    }

    
    public function create()
    {
        $this->response->setContentType('application/json');

        try {
            $post = $this->request->getPost();

            // $matriculasString = is_array($post['matriculas']) && isset($post['matriculas'][0]) ? $post['matriculas'][0] : '';
            // $datasString      = is_array($post['datas']) && isset($post['datas'][0]) ? $post['datas'][0] : '';
            // $status           = strip_tags($post['status']);
            // $motivo           = strip_tags($post['motivo']);
            $matriculasString = $this->request->getPost('matriculas') ?? '';
            $datasString      = $this->request->getPost('datas') ?? '';
            $status           = strip_tags($this->request->getPost('status'));
            $motivo           = strip_tags($this->request->getPost('motivo'));

            if (empty($matriculasString) || empty($datasString)) {
                return $this->response->setJSON([
                    'success' => false, 
                    'message' => 'Selecione pelo menos um aluno e uma data.'
                ]);
            }

            $matriculas = explode(',', $matriculasString);
            $datas      = explode(',', $datasString);

            $controleModel = new ControleRefeicoesModel();
            $inserido = $controleModel->createAgendamentos($matriculas, $datas, $status, $motivo);

            if ($inserido) {
                $this->createSendMessages($matriculas, $datas);
                session()->setFlashdata('sucesso', 'Agendamento(s) criado(s) com sucesso!');
            }

            return $this->response->setJSON(['success' => (bool) $inserido]);

        } catch (\Exception $e) {
            log_message('error', '[AgendamentoController] Erro em create: ' . $e->getMessage());

            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Ocorreu um erro inesperado no servidor. Verifique os logs para mais detalhes.'
            ]);
        }
    }


    public function update()
    {
        $post = $this->request->getPost();

        $originalAlunoIds = explode(',', $post['original_aluno_ids']);
        $originalDatas    = explode(',', $post['original_datas']);
        $originalMotivo   = strip_tags($post['original_motivo']);

        $newMatriculasString = is_array($post['matriculas']) ? $post['matriculas'][0] : '';
        $newDatasString      = is_array($post['datas']) ? $post['datas'][0] : '';
        $newMatriculas       = !empty($newMatriculasString) ? explode(',', $newMatriculasString) : [];
        $newDatas            = !empty($newDatasString) ? explode(',', $newDatasString) : [];
        $newStatus           = strip_tags($post['status']);
        $newMotivo           = strip_tags($post['motivo']);

        if (empty($newMatriculas) || empty($newDatas)) {
            session()->setFlashdata('erros', ['Para editar, é preciso selecionar pelo menos um aluno e uma data.']);
            return redirect()->back();
        }

        $controleModel = new ControleRefeicoesModel();
        $sucesso = $controleModel->updateAgendamentos(
            $originalAlunoIds,
            $originalDatas,
            $originalMotivo,
            $newMatriculas,
            $newDatas,
            $newStatus,
            $newMotivo
        );

        if ($sucesso) {
            $alunosAdicionados = array_diff($newMatriculas, $originalAlunoIds);
            $alunosRemovidos   = array_diff($originalAlunoIds, $newMatriculas);

            if (!empty($alunosAdicionados)) {
                $this->createSendMessages($alunosAdicionados, $newDatas);
            }

            $enviarMensagensModel = new EnviarMensagensModel();
            $enviarMensagensModel->deleteByMatriculaDatas($alunosRemovidos, $originalDatas);

            session()->setFlashdata('sucesso', 'Agendamento atualizado com sucesso!');
        } else {
            session()->setFlashdata('erros', ['Ocorreu um erro ao salvar as alterações.']);
        }

        return redirect()->to(site_url('sys/agendamento/'));
    }


    public function delete()
    {
        $post = $this->request->getPost();
        $deleteInfo = json_decode($post['delete_info'], true);

        if (empty($deleteInfo)) {
            return redirect()->back()->with('erros', ['Dados para exclusão não fornecidos.']);
        }

        $alunoIds = $deleteInfo['aluno_ids'] ?? [];
        $datas    = $deleteInfo['datas'] ?? [];
        $motivo   = $deleteInfo['motivo'] ?? '';

        $controleModel = new ControleRefeicoesModel();
        $sucesso = $controleModel->deleteAgendamentos($alunoIds, $datas, $motivo);

        if ($sucesso) {
            $enviarMensagensModel = new EnviarMensagensModel();
            $enviarMensagensModel->deleteByMatriculaDatas($alunoIds, $datas);

            session()->setFlashdata('sucesso', 'Agendamento deletado com sucesso!');
        } else {
            session()->setFlashdata('erros', ['Ocorreu um erro interno ao deletar o agendamento.']);
        }

        return redirect()->back();
    }

    
    public function getAlunosByTurma($turma_id)
    {
        $alunoModel = new AlunoModel();
        $alunos = $alunoModel->getAtivosByTurma((int) $turma_id);

        return $this->response->setJSON($alunos);
    }


    public function createSendMessages(array $matriculas, array $datasSelecionadas)
    {
        $alunoModel = new AlunoModel(); 
        $alunoTelefoneModel = new AlunoTelefoneModel();
        $enviarMensagensModel = new EnviarMensagensModel();
        
        foreach ($matriculas as $matricula) {
            try {
                $aluno = $alunoModel->find($matricula);
                $telefoneAluno = $alunoTelefoneModel->getTelefoneAtivoByAlunoId($matricula);
            
                if ($aluno && $telefoneAluno) {
                    foreach ($datasSelecionadas as $dataRefeicao) {
                        
                        $nomeAluno = $aluno['nome'];
                        //$destinatario = $telefoneAluno['telefone'];
                        $destinatario = '69992809488'; 

                        $mensagem = "Prezado(o) {$nomeAluno}\n";
                        $mensagem .= "Confirme sua refeição para o dia {$dataRefeicao}\n";
                        $mensagem .= "*Digite 1* para sim, irei utilizar o beneficio no dia informado\n";
                        $mensagem .= "*Digite 2* para não, não irei utilizar o beneficio no dia informado";

                        $enviarMensagensModel->insert([
                            'destinatario' => $destinatario,
                            'mensagem'     => $mensagem,
                            'status'       => 0, // Pendente
                            'categoria'    => 0,
                        ]);
                    }
                }

            } catch (\Exception $e) {
                log_message('error', "[AgendamentoController] Falha ao criar mensagem para matrícula {$matricula}: " . $e->getMessage());
            }
        }
    }
}
