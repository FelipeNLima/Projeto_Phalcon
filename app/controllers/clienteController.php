<?php
class ClienteController extends \Phalcon\Mvc\Controller
{
    #region INDEX
    public function indexAction()
    {
        $cliente = new Cliente();
        $pesquisa = '';

        if($this->request->isPost())
            $pesquisa = $this->request->getPost('pesquisa');
        
        $resultado = $cliente->buscar($pesquisa);

        $this->view->setVar('resultado', $resultado);
        $this->view->setVar('pesquisa', $pesquisa);
        $this->view->pick('cliente/inicial');
    }
    #endregion

    #region INSERIR
    public function inserirAction()
    {
        $this->view->pick('cliente/inserir');
    }

    public function inserirDadosAction()
    {
        $cliente = $this->postParaObjeto();
        $cliente->inserir();      

        $this->irPraIndex();
    }
    #endregion

    #region EDITAR
    public function editarAction($id)
    {
        $cliente = new Cliente();
        $cliente->id_cliente = $id;
        $dados = $cliente->get();

        $this->view->setVar('dados', $dados);
        $this->view->pick('cliente/editar');
    }

    public function editarDadosAction($id)
    {
        $cliente = $this->postParaObjeto($id);
        $cliente->atualizar();

        $this->irPraIndex();
    }
    #endregion

    #region DESATIVAR
    public function desativarAction($id)
    {
        $cliente = new Cliente();
        $cliente->id_cliente = $id;
        $dados = $cliente->get();
        
        print_r($dados);

        $this->view->setVar('dados', $dados);
        $this->view->pick('cliente/remover');
    }

    public function desativarDadosAction($id)
    {
        $cliente = new Cliente();
        $cliente->id_cliente = $id;
        $dados = $cliente->get();
        $dados->ativo = false;
        $dados->atualizar();
        $this->irPraIndex();
    }

    private function irPraIndex()
    {
        header("location:http://localhost/Projeto_Phalcon/Cliente/");
    }

    #endregion

    #region AUX
    private function postParaObjeto($id = 0)
    {
        $obj = new Cliente();

        if($id > 0) {
            $obj->id_cliente = $id;
        }

        $obj->nome        = $this->request->getPost('nome');
        $obj->cpf         = $this->request->getPost('cpf');
        $obj->celular     = $this->request->getPost('celular');
        $obj->telefone    = $this->request->getPost('telefone');
        $obj->email       = $this->request->getPost('email');
        $obj->ativo       = true;

        return $obj;
    }
    #endregion
}