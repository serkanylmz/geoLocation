<?php

class LoginController extends Zend_Controller_Action
{
    protected $config;
    public $db;
    public function init()
    {
        
    }

    public function indexAction()
    {
     $this->view->formAction = array('action' => 'check');
    }
    
    public function checkAction()
    {
        $login = new Application_Model_Login();
   
        $username = $this->_request->getParam("txtUsername");
        $password = $this->_request->getParam("txtPassword");
        

        $result = $login->loginControl($username, $password);
        print_r($result);
       
    }
    

}