<?php
class Application_Model_Login{
    
    public function loginControl($username,$password){
         Zend_Session::start();
         $ses = new Zend_Session_Namespace();
         $auth = Zend_Auth::getInstance();
         $auth_adapter = new Zend_Auth_Adapter_DbTable();
         $auth_adapter->setTableName('users')
                      ->setIdentityColumn('username')
                      ->setCredentialColumn('password');
         
         $auth_adapter->setIdentity($username);
         $auth_adapter->setCredential($password);
         
         
         
         
         $valid_user = $auth->authenticate($auth_adapter);
         
         
 
         if($valid_user->isValid())
         {
              $value = 1;
              $ses->username = $username;
              $ses->password = $password;
         }
         else
         {
             $value = 0;
         }
        return $value;
    }
    
    public function getID($username,$password)
    {
        $auth = Zend_Db_Table::getDefaultAdapter();
        $query = "Select * From users Where username = '".$username."' and password='".$password."'";
        $row = $auth->fetchAll($query);
        
        
        
        return $row[0]['id'];
    }
    
}
