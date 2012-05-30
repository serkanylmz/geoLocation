<?php
class Application_Model_Login{
    
    public function __construct()
    {
        
        $config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/application.ini',APPLICATION_ENV);
   
        $this->db = Zend_Db::factory('Pdo_Mysql',$config);
        
    }

    public function loginControl($username,$password){

        $select = $this->db->query("Select * From info Where username = ? and password = ?",$username,$password);
        
        $result = $this->db->fetchAll($select);
        
        return $result;   
    }
    
}
