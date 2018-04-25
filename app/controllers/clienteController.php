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
        $clienteInsert = new Cliente();

        $clienteInsert->nome        = $this->request->getPost('nome');
        $clienteInsert->cpf         = $this->request->getPost('cpf');
        $clienteInsert->celular     = $this->request->getPost('celular');
        $clienteInsert->telefone    = $this->request->getPost('telefone');
        $clienteInsert->email       = $this->request->getPost('email');
     
        $clienteInsert->inserir();
    }

    public function editarAction()
    {
        $this->view->pick('cliente/editar');
    }

    public function editarDadosAction()
    {

    }

    public function removerAction()
    {
        $this->view->pick('cliente/remover');
    }

    public function removerDadosAction()
    {

    }
}
?>