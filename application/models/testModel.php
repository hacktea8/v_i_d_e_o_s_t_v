<?php
class testModel extends CI_Model{
  public $db;
  
  public function __construct(){
       $this->db  = $this->load->database('default', TRUE);
//     parent::__construct();
     
  }
  
  public function Insertdata($name){
     return $this->db->insert('test',array('name'=>$name));
  }

  public function getdata(){
     return $this->db->query('select * from test limit 20')->result_array();
  }

}
?>
