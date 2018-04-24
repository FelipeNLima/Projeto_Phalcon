<?php
class ProdutoController extends \Phalcon\Mvc\Controller
{
    public function cadastrarAction()
    {
        $clienteInsert = new Cliente();

        $clienteInsert->id_cliente = 2;
        $clienteInsert->nome = "Joao";
        $clienteInsert->remover();

        foreach($clienteInsert->buscar("") as $item)
        {
            echo $item->nome;    
            echo "<br>";
        }
    }

    public function novoAction()
    {
        $this->view->pick('produto');
    }
}
?>