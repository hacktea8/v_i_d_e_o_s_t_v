<?php
class baseModel extends CI_Model{
  public $db;
  
  public function __construct(){
     parent::__construct();
     $this->db  = $this->load->database('default', TRUE);
     
  }
  
  public function Insertdata($name){
     return $this->db->insert('test',array('name'=>$name));
  }

  public function getdata(){
     return $this->db->query('select * from test limit 20')->result_array();
  }

}
?>
