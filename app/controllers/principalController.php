<?php

class PrincipalController extends \Phalcon\Mvc\Controller
{
    
    public function telaPrincipalAction()
    {
        $this->view->pick('homePage');
    }

    public function telaProdutoAction()
    {
        $this->view->pick('produto');
    }

}

?>