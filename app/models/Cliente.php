<?php
use Phalcon\Mvc\Model;

class Cliente extends Model
{
    public $id_cliente;
    public $nome;
    public $cpf;
    public $telefone;
    public $celular;
    public $email;
    public $ativo;

    public function initialize()
    {
        $this->setSource("cliente");
    }

    public function getSource()
    {
        return 'cliente';
    }

    public function get()
    {
        $condicao = "id_cliente = :id_cliente:";
        $where    = array('id_cliente' => $this->id_cliente);
        $cliente  = Cliente::findFirst(array($condicao, "bind" => $where));

        return $cliente;
    }

    public function inserir()
    {
        return $this->save();
    }

    public function atualizar()
    {
        $cliente = Cliente::findFirst($this->id_cliente);
      
        if($this->nome)
            $cliente->nome     = $this->nome;
        if($this->cpf)
            $cliente->cpf      = $this->cpf;
        if($this->telefone)
            $cliente->telefone = $this->telefone;
        if($this->celular)
            $cliente->celular  = $this->celular;
        if($this->email)
            $cliente->email    = $this->email;
            
        $cliente->ativo = $this->ativo ? 1 : 0;
        $cliente->save();
    }

    public function buscar($nome)
    {
        return Cliente::find(  
                    [
                        'conditions' => "nome LIKE '%$nome%' AND ativo = 1",
                        'order'      => 'nome DESC',
                        'limit'      => 50
                    ] 
                );
    }

    public function remover()
    {
        $this->ativo = false;
        $this->atualizar();
    }
 }