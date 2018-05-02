<?php

class ProdutoController extends \Phalcon\Mvc\Controller
{
    #region INDEX
    public function indexAction()
    {
        $produto = new Produto();
        $pesquisa = '';

        if($this->request->isPost())
            $pesquisa = $this->request->getPost('pesquisa');
        
        $resultado = $produto->buscar($pesquisa);

        $this->view->setVar('resultado', $resultado);
        $this->view->setVar('pesquisa', $pesquisa);
        $this->view->pick('produto/inicial');
    }
    #endregion

    #region INSERIR
    public function inserirAction()
    {
        $this->view->pick('produto/inserir');
    }

    public function inserirDadosAction()
    {
        $produto = $this->postParaObjeto();
        $produto->inserir();      
        $this->irPraIndex();
    }
    #endregion

    #region EDITAR
    public function editarAction($id)
    {
        $produto = new Produto();
        $produto->id_produto = $id;
        $dados = $produto->get();

        $this->view->setVar('dados', $dados);
        $this->view->pick('produto/editar');
    }

    public function editarDadosAction($id)
    {
        $produto = $this->postParaObjeto($id);
        $produto->atualizar();

        $this->irPraIndex();
    }
    #endregion

    #region DESATIVAR
    public function desativarAction($id)
    {
        $produto = new Produto();
        $produto->id_produto = $id;
        $dados = $produto->get();
        
        print_r($dados);

        $this->view->setVar('dados', $dados);
        $this->view->pick('produto/remover');
    }

    public function desativarDadosAction($id)
    {
        $produto = new Produto();
        $produto->id_produto = $id;
        $dados = $produto->get();
        $dados->ativo = false;
        $dados->atualizar();
        $this->irPraIndex();
    }

    private function irPraIndex()
    {
        header("location:http://localhost/Projeto_Phalcon/Produto/");
    }

    #endregion

    #region AUX
    private function postParaObjeto($id = 0)
    {
        $obj = new Produto();

        if($id > 0) {
            $obj->id_produto = $id;
        }

        $obj->descricao   = $this->request->getPost('descricao');
        $obj->valor_custo = $this->request->getPost('valor_custo');
        $obj->valor_venda = $this->request->getPost('valor_venda');
        $obj->ativo       = true;

        return $obj;
    }
    #endregion
}