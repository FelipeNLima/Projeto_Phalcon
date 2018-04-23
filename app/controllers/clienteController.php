<?php
class ClienteController extends \Phalcon\Mvc\Controller
{
    public function cadastrarAction()
    {
        $clienteInsert = new Cliente();

        $clienteInsert->id_cliente = 1;
        $r = $clienteInsert->get(1);
        
        $clienteInsert->atualizar();


        foreach($clienteInsert->buscar("adlfasadasa") as $item)
        {
            echo $item->nome;    
        }
    }
}
?>