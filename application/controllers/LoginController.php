<?php

class LoginController extends Zend_Controller_Action
{

    public function init(){}

    public function indexAction(){

        Zend_Session::start();

        $this->view->formAction = array('action' => 'check');

        if($this->_request->getParam("error") == "!")
        {

            $this->_redirect("login");

        }
    
    }
    
    public function checkAction(){

        $username = $this->_request->getParam("txtUsername");
        $password = $this->_request->getParam("txtPassword");
        
        if($username != "" || $password != ""){

            $login = new Application_Model_Login();
            $result = $login->loginControl($username, $password);
        
            if($result == 1){

                $this->_redirect("index");

            } else {

                $this->_redirect('login?error=!');

            }
        
        } else {
            
            echo "Kutular boş"; 
        }
 
    }
}