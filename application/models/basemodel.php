<?php
class baseModel extends CI_Model{
  public $db;
  
  public function __construct(){
     parent::__construct();
     $this->db  = $this->load->database('default', TRUE);
     
  }
  
  public function getMenuListById($idstr = ''){
     $sql = sprintf('SELECT * FROM `cate` WHERE `id` IN (%s)', $idstr);
     return $this->db->query($sql)->result_array();
  }

  public function getdata(){
     return $this->db->query('select * from test limit 20')->result_array();
  }

}
?>
