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
    public $ativo = true;

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
        $cliente            = Cliente::findFirst($this->id_cliente);
        $cliente->nome      = $this->nome;
        $cliente->cpf       = $this->cpf;
        $cliente->telefone  = $this->telefone;
        $cliente->celular   = $this->celular;
        $cliente->email     = $this->email;
        $cliente->ativo     = $this->ativo;

        $cliente->update();
    }

    public function buscar($nome)
    {
        return Cliente::find(  
                    [
                        'conditions' => "nome LIKE '%$nome%'",
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