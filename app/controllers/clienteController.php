<?php
class ClienteController extends \Phalcon\Mvc\Controller
{
    public function cadastrarAction()
    {
        $clienteInsert = new Cliente();

        $clienteInsert->id_cliente = 1;
        $r = $clienteInsert->get(1);
        
        // if ($clienteInsert->remover() === false) {
        //     echo "Umh, We can't store clienteInserts right now: \n";
        
        //     $messages = $clienteInsert->getMessages();
        
        //     foreach ($messages as $message) {
        //         echo $message, "\n";
        //     }
        // } else {
        //     echo 'Great, a new clienteInsert was saved successfully!';
        // }

        foreach($clienteInsert->buscar("asdasd") as $item)
        {
            echo $item->nome;    
        }
    }
}
?>