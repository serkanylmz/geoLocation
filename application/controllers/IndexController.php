<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
     
    }

    public function indexAction()
    {
         
        
         $login = new Application_Model_Login();
         
        $this->view->formAction = array('action' => 'close');
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->_redirect("login");
           
        }
       
         $ses = new Zend_Session_Namespace();
   
         
         $id = $login->getID(   $ses->username,    $ses->password);
         
         $ses->id = $id;
        
    }
    
     public function closeAction()
    {
         Zend_Session::destroy();
         $this->_redirect("login");
        
    }
     
    
    public function  corgetAction()
    {
        $lat = $this->_getParam("lat");
        $lng = $this->_getParam("lng");
        $ses = new Zend_Session_Namespace();
        $data = array(
          
            'user_id' => $ses->id,
            'lat'=>$lat,
            'lng'=>$lng
            
        );
        
        
        $db = Zend_Db_Table::getDefaultAdapter();
        $db->insert('coords',$data);
        
        
         exit(json_encode(array("result"=>true)));
    }


}
