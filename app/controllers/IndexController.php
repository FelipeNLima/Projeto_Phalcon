<?php
class IndexController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
            // INSERT CLIENTE
            $clienteInsert = new Cliente();
            $clienteInsert->nome = 'WESLEY';
            $clienteInsert->cpf = '44492437819';
            $clienteInsert->telefone = '123362532';
            $clienteInsert->celular = '129990000';
            $clienteInsert->email = 'wesley_costa@outlook.com';
            $clienteInsert->insert();

            // $clienteInsert->nome = $this->request->getPost("nome");
            // $clienteInsert->telefone = $this->request->getPost("telefone");
            // $clienteInsert->cpf = $this->request->getPost("cpf");

            // // INSERT CLIENTE ENDEREÇO
            // $clienteInsert = new Cliente();
            // $clienteInsert->nome = $this->request->getPost("nome");
            // $clienteInsert->telefone = $this->request->getPost("telefone");
            // $clienteInsert->cpf = $this->request->getPost("cpf");
            // $clienteAdicionado = $clienteInsert->insert();

            // $EnderecoInsert = new Endereco();
            // $EnderecoInsert->codigo_cliente = $clienteAdicionado->codigo_cliente;
            // $EnderecoInsert->logradouro = $this->request->getPost("logradouro");
            // $EnderecoInsert->numero = $this->request->getPost("numero");
            // $EnderecoInsert->cep = $this->request->getPost("cep");
            // $EnderecoInsert->estado = $this->request->getPost("estado");
            // $EnderecoInsert->cidade = $this->request->getPost("cidade");
            // $EnderecoInsert->bairro = $this->request->getPost("bairro");
            // $EnderecoInsert->insert();

            // // UPDATE CLIENTE
            // $ClienteUpdate = new Cliente();
            // $ClienteUpdate->codigo_cliente = $this->request->getPost("codigo");
            // $ClienteUpdate->nome = $this->request->getPost("nome");
            // $ClienteUpdate->telefone = $this->request->getPost("telefone");
            // $ClienteUpdate->cpf = $this->request->getPost("cpf");
            // $ClienteUpdate->alterar();

            // // DELETE ENDEREÇO
            // $EnderecoDeletar = new Endereco();
            // $EnderecoDeletar->codigo_endereco = $this->request->getPost("codigo");
            // $EnderecoDeletar->deletar();

            // // DELETE CLIENTE
            // $ClienteDeletar = new Cliente();
            // $ClienteDeletar->codigo_cliente = $this->request->getPost("codigo");
            // $ClienteDeletar->deletar();

            // // SELECT CLIENTE
            // $Cliente = new Cliente();
            // $Cliente->codigo_cliente = $this->request->getPost("codigo");
            // $cliente = $Cliente->get();

            // // SELECT CLIENTE ENDEREÇO
            // $Cliente = new Cliente();
            // $Cliente->codigo_cliente = $this->request->getPost("codigo");
            // $clientes = $Cliente->getJoin(array('endereco' => true));
        }
    }
?>