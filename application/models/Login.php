<?php

class Application_Model_Login {

    /**
     * @param $username
     * @param $password
     * @return int
     */

    public function loginControl($username,$password){

        $session = new Zend_Session_Namespace();
        $auth = Zend_Auth::getInstance();

        $auth_adapter = new Zend_Auth_Adapter_DbTable();$auth_adapter = new Zend_Auth_Adapter_DbTable();
        $auth_adapter->setTableName('users')
                      ->setIdentityColumn('username')
                      ->setCredentialColumn('password');

        $auth_adapter->setIdentity($username);
        $auth_adapter->setCredential($password);

        $valid_user = $auth->authenticate($auth_adapter);

        if($valid_user->isValid()){

              $value = 1;
              $session->username = $username;
              $session->password = $password;
              $session->id = $auth_adapter->getResultRowObject()->id;

        } else {

             $value = 0;

        }

        return $value;
    }
}
