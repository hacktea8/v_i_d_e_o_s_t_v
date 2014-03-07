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

  function getNoneRenewList($limit = 100){
     $sql = sprintf("");
     $lists = $this->db->result_array($sql);
     return $lists;
  }

  function updateTableData($table,$data,$where){
    $sql = $this->db->update_string($this->db->getTable($table), $data, $where);
    return $this->db->query($sql);
  }

  function addVideoByData($data_head,$data_body){
    $data_play = array('vid'=>$vid,'sid'=>$data_head['site'],'ourl'=>$data_head['ourl']);
    unset($data_head['site']);
    unset($data_head['ourl']);
    $check = $this->checkVideoByTitle($title);
    $vid = $check;
    if( !$check){
      $sql = $this->db->insert_string($this->db->getTable('video_head'),$data_head);
      $this->db->query($sql);
      $vid = $this->db->insert_id();
      if( !$vid){
        return false;
      }
      $data_play['vid'] = $data_body['id'] = $vid;
      $sql = $this->db->insert_string($this->db->getTable('video_body'),$data_body);
      $this->db->query($sql);
    }
    $data_play['vid'] = $vid;
    //增加播放源
    $sql = $this->db->insert_string($this->db->getTable('play_type'),$data_play);
    $this->db->query($sql);
    
    return $vid;
  }

  function checkVideoByTitleSid($title,$sid){
    $sql = sprintf("SELECT `id` FROM %s as vh LEFT JOIN %s as pt ON (vh.id = pt.vid) WHERE vh.`title`='%s' AND pt.`sid`=%d LIMIT 1", $this->db->getTable('video_head'), $this->db->getTable('play_type'), mysql_real_escape_string($title),$sid);
    $row = $this->db->row_array($sql);
    return isset($row['id']) ? $row['id'] : 0;
  }

  function checkVideoByTitle($title){
    $sql = sprintf("SELECT `id` FROM %s WHERE `title`='%s' LIMIT 1",$this->db->getTable('video_head'),mysql_real_escape_string($title));
    $row = $this->db->row_array($sql);
    return isset($row['id']) ? $row['id'] : 0;
  }

}

?>
