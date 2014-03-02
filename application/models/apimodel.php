<?php
class apiModel extends CI_Model{
  public $db;
  
  public function __construct(){
     parent::__construct();
     $this->db  = $this->load->database('default', TRUE);
     
  }
  
  public function getFeedById($cid){
     if(!$cid){
       return array();
     }
     $sql = sprintf("");
  }

  public function getdata(){
     return $this->db->query('select * from test limit 20')->result_array();
  }

}
?>
