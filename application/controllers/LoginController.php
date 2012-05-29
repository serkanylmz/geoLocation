<?php

class LoginController extends Zend_Controller_Action
{
    protected $config;
    public function init()
    {
 
    }

    public function indexAction()
    {
        
     $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/application.ini',APPLICATION_ENV); 
//     echo $config->resources->db->params->dbname; 
    
    }
    

}