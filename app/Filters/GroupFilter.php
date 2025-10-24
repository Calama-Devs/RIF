<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class GroupFilter implements FilterInterface
{
    /**
     * Roda antes da página carregar, verificando a permissão do grupo.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = service('auth');

        // Se o usuário não estiver logado, redireciona para a tela de login.
        if (! $auth->loggedIn()) {
            return redirect()->to(config('Auth')->loginRoute);
        }

        $user = $auth->user();

        // 🛑 REFORÇO DE SEGURANÇA: Previne o erro "Call to a member function inGroup() on null"
        // Este é um teste de fallback para problemas de timing/cache.
        if ($user === null) {
             return redirect()->to(config('Auth')->loginRoute)->with('error', 'Sessão inválida. Por favor, faça login novamente.');
        }

        // Verifica se os argumentos de grupo foram fornecidos.
        if (empty($arguments) || empty($arguments[0])) {
            return redirect()->to('/')->with('error', 'Erro de Configuração. Grupos não definidos.');
        }

        // Pega a lista de grupos permitidos da rota (ex: "admin,developer").
        $allowedGroups = explode(',', $arguments[0]);

        // Verifica se o usuário pertence a algum dos grupos permitidos.
        foreach ($allowedGroups as $group) {
            // Checa o grupo usando a função nativa do Shield (inGroup).
            if ($user->inGroup(trim($group))) {
                return; // Acesso permitido. Para o filtro.
            }
        }

        // Se a verificação falhar em todos os grupos, o acesso é negado.
        return redirect()->to('/')->with('error', 'Acesso Negado. Você não tem permissão.');
    }

    /**
     * Roda depois da página carregar (não faz nada).
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}