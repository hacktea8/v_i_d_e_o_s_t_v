<?php


class Model{
  protected $db;
  
  function __construct(){
    $this->db=new DB_MYSQL();
  }

  function getCateBycid($cid){
    if(!$cid){
      return false;
    }
    $sql=sprintf('SELECT * FROM %s WHERE `flag`=1 AND `id`=%d LIMIT 1',$this->db->getTable('emule_cate'),$cid);
    $res=$this->db->row_array($sql);
     return $res;
  }

  function getsubcatelist(){
    $sql=sprintf('SELECT `id`, `pid`, `name`,`url` FROM %s WHERE `flag`=1 AND `pid`>0',$this->db->getTable('emule_cate'));
    $res=$this->db->result_array($sql);
     return $res;
  }

    

  function addVideoByData($data_head,$data_body){
    $sql = $this->db->insert_string($this->db->getTable('video_head'),$data_head);
    $this->db->query($sql);
    $vid = $this->db->insert_id();
    if( !$vid){
       return false;
    }
    $data_body['id'] = $vid;
    $sql = $this->db->insert_string($this->db->getTable('video_body'),$data_body);
    $this->db->query($sql);
    return $vid;
  }

  function checkVideoByTitle($title){
    $sql = sprintf("SELECT `id` FROM %s WHERE `title`='%s' LIMIT 1",$this->db->getTable('video_head'),mysql_real_escape_string($title));
    $row = $this->db->row_array($sql);
    return isset($row['id']) ? $row['id'] : 0;
  }

}

?>
