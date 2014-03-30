<?php
class avmodel{
 public $db;
 
 public function __construct(){
  $this->db = new DB_MYSQL();
 }
 public function checkVideoByTitle($title){
  $title = trim($title);
  if( !$title){
    return 0;
  }
  $fields='`vid`';
  $where = array('`title`='=>$title);
  $sql = $this->db->select_string('`av_video_head`',$fields,$where,$order='',$limit='1');
  $row = $this->db->row_array($sql);
  return isset($row['vid'])?$row['vid']:0;
 }
}
?>
