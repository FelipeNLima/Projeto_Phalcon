<?php 

    use Phalcon\Mvc\Model;

    class Produto extends Model
    {
        public $id_produto;
        public $descricao;
        public $valor_custo;
        public $valor_venda;
        public $ativo;

        public function initialize()
        {
            $this->setSource("produto");
        }
    
        public function getSource()
        {
            return 'produto';
        }
    
        public function get()
        {
            $condicao = "id_produto = :id_produto:";
            $where    = array('id_produto' => $this->id_produto);
            $produto  = Produto::findFirst(array($condicao, "bind" => $where));
    
            return $produto;
        }
    
        public function inserir()
        {
            return $this->save();
        }
    
        public function atualizar()
        {
            $produto = Produto::findFirst($this->id_produto);
    
            if($this->descricao)
                $produto->descricao   = $this->descricao;
            if($this->valor_custo)
                $produto->valor_custo = $this->valor_custo;
            if($this->valor_venda)
                $produto->valor_venda = $this->valor_venda;
               
            $produto->ativo = $this->ativo ? 1 : 0;
            $produto->save();
        }
    
        public function buscar($descricao)
        {
            return Produto::find(  
                        [
                            'conditions' => "descricao LIKE '%$descricao%' AND ativo = 1",
                            'order'      => 'descricao DESC',
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
?>