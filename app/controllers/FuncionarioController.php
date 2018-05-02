<?php

class FuncionarioController extends \Phalcon\Mvc\Controller
{
    #region INDEX
    public function indexAction()
    {
        $funcionario = new Funcionario();
        $pesquisa = '';

        if($this->request->isPost())
            $pesquisa = $this->request->getPost('pesquisa');
        
        $resultado = $funcionario->buscar($pesquisa);

        $this->view->setVar('resultado', $resultado);
        $this->view->setVar('pesquisa', $pesquisa);
        $this->view->pick('funcionario/inicial');
    }
    #endregion

    #region INSERIR
    public function inserirAction()
    {
        $this->view->pick('funcionario/inserir');
    }

    public function inserirDadosAction()
    {
        $funcionario = $this->postParaObjeto();
        $funcionario->inserir();      

        $this->irPraIndex();
    }
    #endregion

    #region EDITAR
    public function editarAction($id)
    {
        $funcionario = new Funcionario();
        $funcionario->id_funcionario = $id;
        $dados = $funcionario->get();

        $this->view->setVar('dados', $dados);
        $this->view->pick('funcionario/editar');
    }

    public function editarDadosAction($id)
    {
        $funcionario = $this->postParaObjeto($id);
        $funcionario->atualizar();

        $this->irPraIndex();
    }
    #endregion

    #region DESATIVAR
    public function desativarAction($id)
    {
        $funcionario = new Funcionario();
        $funcionario->id_funcionario = $id;
        $dados = $funcionario->get();
        
        print_r($dados);

        $this->view->setVar('dados', $dados);
        $this->view->pick('funcionario/remover');
    }

    public function desativarDadosAction($id)
    {
        $funcionario = new Funcionario();
        $funcionario->id_funcionario = $id;
        $dados = $funcionario->get();
        $dados->ativo = false;
        $dados->atualizar();
        $this->irPraIndex();
    }

    private function irPraIndex()
    {
        header("location:http://localhost/Projeto_Phalcon/Funcionario/");
    }

    #endregion

    #region AUX
    private function postParaObjeto($id = 0)
    {
        $obj = new Funcionario();

        if($id > 0) {
            $obj->id_funcionario = $id;
        }

        $obj->nome        = $this->request->getPost('nome');
        $obj->cpf         = $this->request->getPost('cpf');
        $obj->celular     = $this->request->getPost('celular');
        $obj->telefone    = $this->request->getPost('telefone');
        $obj->email       = $this->request->getPost('email');
        $obj->cargo       = $this->request->getPost('cargo');
        $obj->salario     = $this->request->getPost('salario');
        $obj->ativo       = true;

        return $obj;
    }
    #endregion
}