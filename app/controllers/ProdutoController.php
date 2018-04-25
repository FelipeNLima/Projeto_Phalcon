<?php

class ProdutoController extends \Phalcon\Mvc\Controller
{
    public function inserirAction()
    {
        $this->view->pick('produto/inserir');
    }
}
?>