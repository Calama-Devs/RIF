<?php

namespace App\Controllers;

use App\Models\CursoModel;

class CursoController extends BaseController 
{
    /**
     * Renderiza a tela de cursos, listando todos os cursos cadastrados
     * 
     * @route GET /cursos
     * @return view
     */
    public function index()
    {
        $model = new CursoModel();
        $data['cursos'] = $model->orderBy('nome')->findAll();

        return view('sys/cursos', $data);
    }

    /**
     * Cadastra um novo curso no sistema.
     *
     * @route POST /cursos/criar
     */
    public function store()
    {
        $curso = new CursoModel();

        $post = $this->request->getPost();

        $input['nome'] = strip_tags($post['nome']);

        if($curso->insert($input)){
            session()->setFlashdata('sucesso', 'Curso cadastrado com sucesso!');
            return redirect()->to(base_url('/sys/curso'));
        } else {
            // $errors['erros'] = $curso->errors();
            return redirect()->to(base_url('/sys/curso'))->with('erros', $curso->errors())->withInput();
        }
    }

    /**
     * Atualiza os dados de um curso.
     * 
     * @route PUT /cursos/atualizar
     */
    public function update()
    {
        $post = $this->request->getPost();

        $input['id'] = (int) strip_tags($post['id']);
        $input['nome'] = strip_tags($post['nome']);

        $curso = new CursoModel();
        if($curso->save($input)) {
            session()->setFlashdata('sucesso', 'Curso atualizado com sucesso!');
            return redirect()->to(base_url('/sys/curso'));
        } else {
            return redirect()->to(base_url('/sys/curso'))->with('erros', $curso->errors())->withInput();
        }
    }

    /**
     * Deleta um curso.
     * 
     * @route DELETE /cursos/deletar
     */
    public function delete()
    {
        $post = $this->request->getPost();
        $id = (int) strip_tags($post['id']);

        $curso = new CursoModel();

        if($curso->delete($id)) {
            session()->setFlashdata('sucesso', 'Curso deletado com sucesso!');
            return redirect()->to(base_url('/sys/curso'));
        } else {
            session()->setFlashdata('erro', $curso->errors());
            return redirect()->to(base_url('/sys/curso'));
        }
    }
}
