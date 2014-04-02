<?php
class baseModel extends CI_Model{
  public $db;
  
  public function __construct(){
     parent::__construct();
     $this->db  = $this->load->database('default', TRUE);
     
  }
  
  public function getMenuListById($idstr = ''){
     if( !$idstr){
       return false;
     }
     $sql = sprintf('SELECT * FROM `cate` WHERE `id` IN (%s)', $idstr);
     return $this->db->query($sql)->result_array();
  }
  public function getUrl($type = '',$p1='',$p2='',$p3='',$p4='',$p5=''){
     return '';
  }
  public function getCoverUrl($cover){
     return sprintf('http://img.hacktea8.com/showpic.php?key=%s',$cover);
  }

}
?>
