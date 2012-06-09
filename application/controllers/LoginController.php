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
     header("Content-Type: text/html; charset=UTF-8");
     Zend_Session::start();
     $this->view->formAction = array('action' => 'check');
     if($this->_request->getParam("error") == "!")
     {
         
        $this->_redirect("login");
         
     }
    
    }
    
    public function checkAction()
    {
        
        
        $login = new Application_Model_Login();
   
        $username = $this->_request->getParam("txtUsername");
        $password = $this->_request->getParam("txtPassword");
        
        if($username != "" || $password != "")
        {
            
        
        $result = $login->loginControl($username, $password);
        
        if($result == 1)
        {
           
            $this->_redirect("index");
        }
        else
        {
            $this->_redirect('login?error=!');
        }
        
        }
        else{
            
            echo "Kutular boş"; 
        }
 
    }
    
    
    

}