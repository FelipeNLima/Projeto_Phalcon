<?php
use Phalcon\Mvc\Model;

class Endereco extends Model
{
    public $codigo_endereco;
    public $codigo_cliente;
    public $logradouro;
    public $numero;
     public $cep;
     public $estado;
     public $cidade;
     public $bairro;

     public function initialize()
     {
         $this->setSource("enderecos");
     }

     public function getSource()
     {
         return 'enderecos';
     }

     public function get()
     {
         $condicao ="";
         $where = array();
         if ($this->codigo_cliente){
             $condicao = "codigo_cliente = :codigo_cliente:";
             $where['codigo_cliente'] = $this->codigo_cliente;
         }
         if ($this->codigo_endereco){
             $condicao = "codigo_endereco = :codigo_endereco:";
             $where['codigo_endereco'] = $this->codigo_endereco;
         }

         $enderecos = Endereco::find(array( $condicao, "bind" => $where  ));

         return $enderecos;
     }

     public function insert()
     {
         return $this->save();
     }

     public function deletar()
     {
         $this->delete();
     }
 }