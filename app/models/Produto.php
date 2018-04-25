<?php 

    use Phalcon\Mvc\Model;

    class Produto extends Model
    {
        public $id_produto;
        public $descricao;
        public $valor_custo;
        public $valor_venda;
        public $ativo;
    }
?>