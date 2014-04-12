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
 public function addCate($title){
  if(!$title){
   return 0;
  }
  $fields='`cid`';
  $where = array('`title`='=>$title);
  $sql = $this->db->select_string('`av_cate`',$fields,$where,$order='',$limit='1');
  $row = $this->db->row_array($sql);
  if(isset($row['cid'])){
   return $row['cid'];
  }
  $data = array('title'=>$title);
  $sql = $this->db->insert_string('`av_cate`',$data);
  $this->db->query($sql);
  $cid = $this->db->insert_id();
  return $cid;
 }
 public function addVideoByData($data){
  if(!$data['title']){
   return 0;
  }
  $cid = $this->addCate($data['cate']);
  
  $data_head = $this->copy_array($data,array('keyword','atime','avkey','title','mosaic','flag','thum'));
  $data_head['cid'] = $cid;
  $sql = $this->db->insert_string('`av_video_head`',$data_head);
  $this->db->query($sql);
  $vid = $this->db->insert_id();
  $data_body = $this->copy_array($data,array('intro','playmode','ourl'));
  $data_body['vid'] = $vid;
  $sql = $this->db->insert_string('`av_video_body`',$data_body);
  $this->db->query($sql);
  $table = sprintf('`av_video_drama%d`',$vid%6);
  foreach($data['vlist'] as $v){
    $data_dram = array('vid'=>$vid, 'playnum'=>$v['playnum'], 'title'=>$v['title'], 'playurl'=>$v['playurl'],'atime'=>time());
    $sql = $this->db->insert_string($table,$data_dram);
    $this->db->query($sql);
  }
  return $vid;
 }
 public function copy_array($arr,$field){
  $return = array();
  foreach($field as $v){
   if(isset($arr[$v])){
    $return[$v] = $arr[$v];
   }
  }
  return $return;
 }
}
?>
