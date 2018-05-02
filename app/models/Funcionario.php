<?php
use Phalcon\Mvc\Model;

class Funcionario extends Model
{
    public $id_funcionario;
    public $nome;
    public $cpf;
    public $telefone;
    public $celular;
    public $email;
    public $cargo;
    public $salario;
    public $ativo;

    public function initialize()
    {
        $this->setSource("funcionario");
    }

    public function getSource()
    {
        return 'funcionario';
    }

    public function get()
    {
        $condicao = "id_funcionario = :id_funcionario:";
        $where    = array('id_funcionario' => $this->id_funcionario);
        $funcionario  = funcionario::findFirst(array($condicao, "bind" => $where, 'order'=>'id_funcionario'));

        return $funcionario;
    }

    public function inserir()
    {
        return $this->save();
    }

    public function atualizar()
    {
        $funcionario = funcionario::findFirst($this->id_funcionario);
      
        if($this->nome)
            $funcionario->nome     = $this->nome;
        if($this->cpf)
            $funcionario->cpf      = $this->cpf;
        if($this->telefone)
            $funcionario->telefone = $this->telefone;
        if($this->celular)
            $funcionario->celular  = $this->celular;
        if($this->email)
            $funcionario->email    = $this->email;
        if($this->cargo)
            $funcionario->cargo    = $this->cargo;
        if($this->salario)
            $funcionario->salario  = $this->salario;
            
        $funcionario->ativo = $this->ativo ? 1 : 0;
        $funcionario->save();
    }

    public function buscar($nome)
    {
        return funcionario::find(  
                    [
                        'conditions' => "nome LIKE '%$nome%' AND ativo = 1",
                        'order'      => 'nome DESC',
                        'order'      => 'id_funcionario',
                        'limit'      =>  50
                    ] 
                );
    }

    public function remover()
    {
        $this->ativo = false;
        $this->atualizar();
    }
 }