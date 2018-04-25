<?php
class ClienteController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $cliente = new Cliente();
        $pesquisa = '';

        if(isset($this->request))
            $pesquisa = $this->request->getPost('pesquisa');
        
        $resultado = $cliente->buscar($pesquisa);

        $this->view->setVar('resultado', $resultado);
        $this->view->pick('cliente/inicial');
    }


    public function inserirAction()
    {
        $this->view->pick('cliente/inserir');
    }

    public function inserirDadosAction()
    {
        $cliente = $this->postParaObjeto();
        $cliente->inserir();
    }

    public function editarAction()
    {
        $this->view->pick('cliente/editar');
    }

    public function editarDadosAction()
    {
        $cliente = $this->postParaObjeto();
        $cliente->atualizar();
    }

    public function removerAction()
    {
        $this->view->pick('cliente/remover');
    }

    public function removerDadosAction()
    {

    }

    private function postParaObjeto()
    {
        $obj = new Cliente();

        $obj->nome        = $this->request->getPost('nome');
        $obj->cpf         = $this->request->getPost('cpf');
        $obj->celular     = $this->request->getPost('celular');
        $obj->telefone    = $this->request->getPost('telefone');
        $obj->email       = $this->request->getPost('email');

        return $obj;
    }
}