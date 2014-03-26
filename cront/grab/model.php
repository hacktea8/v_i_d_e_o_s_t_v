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

  function getNoneRenewList($sid,$rtime,$limit = 100){
     $sql = sprintf("SELECT `vid`, `sid`, `ourl` FROM `play_type` WHERE `sid`=%d AND  `rtime`<=%d AND `flag`=0 LIMIT %d",$sid,$rtime,$limit);
     $lists = $this->db->result_array($sql);
     return $lists;
  }

  function updateTableData($table,$data,$where){
    $sql = $this->db->update_string($this->db->getTable($table), $data, $where);
    return $this->db->query($sql);
  }

  function addActorDataAndBind($data,$vid){
    if( !$data['title']){
       return false;
    }
    $sql = sprintf("SELECT `id` FROM `actor` WHERE `title`='%s' LIMIT 1",$this->db->escape($data['title']));
    $row = $this->db->row_array($sql);
    if(isset($row['id'])){
      $aid = $row['id'];
      $sql = sprintf("SELECT `aid` FROM `video_actor` WHERE `aid`=%d AND `vid`=%d LIMIT 1",$aid,$vid);
      $row = $this->db->row_array($sql);
      if(isset($row['aid'])){
        return $row['aid'];
      }
      $data = array('vid'=>$vid,'aid'=>$aid);
      $sql = $this->db->insert_string($this->db->getTable('video_actor'),$data);
      $this->db->query($sql);
      return $aid;
    }
    $sql = $this->db->insert_string($this->db->getTable('actor'),$data);
    $this->db->query($sql);
    $aid = $this->db->insert_id();
    $data = array('vid'=>$vid,'aid'=>$aid);
    $sql = $this->db->insert_string($this->db->getTable('video_actor'),$data);
    $this->db->query($sql);
    return $aid;
  }

  function addTypeDataAndBind($data,$vid){
    if( !$data['title']){
       return false;
    }
    $sql = sprintf("SELECT `id` FROM `cate` WHERE `title`='%s' LIMIT 1",$this->db->escape($data['title']));
    $row = $this->db->row_array($sql);
    if(isset($row['id'])){
      $cid = $row['id'];
      $sql = sprintf("SELECT `cid` FROM `video_cate` WHERE `cid`=%d AND `vid`=%d LIMIT 1",$cid,$vid);
      $row = $this->db->row_array($sql);
      if(isset($row['cid'])){
        return $row['cid'];
      }
      $data = array('vid'=>$vid,'cid'=>$cid);
      $sql = $this->db->insert_string($this->db->getTable('video_cate'),$data);
      $this->db->query($sql);
      return $aid;
    }
    $sql = $this->db->insert_string($this->db->getTable('cate'),$data);
    $this->db->query($sql);
    $cid = $this->db->insert_id();
    $data = array('vid'=>$vid,'cid'=>$cid);
    $sql = $this->db->insert_string($this->db->getTable('video_cate'),$data);
    $this->db->query($sql);
    return $aid;
  }


  function addData($table,$data){
    if( !$data['title']){
       return 0;
    }
    $sql = sprintf("SELECT `id` FROM %s WHERE `title`='%s' LIMIT 1",$this->db->getTable($table),$this->db->escape($data['title']));
    $row = $this->db->row_array($sql);
    if(isset($row['id'])){
      return $row['id'];
    }
    $sql = $this->db->insert_string($this->db->getTable($table),$data);
    $this->db->query($sql);
    return $this->db->insert_id();
  }

  function addVideoByData($data_head,$data_body){
    $data_play = array('vid'=>$vid,'sid'=>$data_head['site'],'rtime'=>time(),'ourl'=>$data_head['ourl']);
    unset($data_head['site']);
    unset($data_head['ourl']);
    $check = $this->checkVideoByTitle($title);
    $vid = $check;
    if( !$check){
      //增加导演
      $actor_table = 'actor';
      $data_head['director'] = is_array($data_head['director'])?array_shift($data_head['director']):$data_head['director'];
      $did = $this->addData($actor_table,$data = array('title'=>$data_head['director']));
      $data_head['director'] = $did;
      //增加地区
      $data_head['area'] = is_array($data_head['area'])?array_shift($data_head['area']):$data_head['area'];
      $aid = $this->addData('area',$data = array('title'=>$data_head['area']));
      $data_head['area'] = $aid;
      //增加导航
      $cid = $this->addData('channel',$data = array('title'=>$data_head['cid']));
      $data_head['cid'] = $cid;
      $actor = $data_head['actor'];
      unset($data_head['actor']);
      $type = $data_head['type'];
      unset($data_head['type']);
      unset($data_head['cate']);
      $data_head['atime'] = time();
      $sql = $this->db->insert_string($this->db->getTable('video_head'),$data_head);
      $this->db->query($sql);
      $vid = $this->db->insert_id();
      if( !$vid){
        return false;
      }
      //增加演员
      foreach($actor as $val){
        $this->addActorDataAndBind(array('title'=>$val),$vid);
      }
      //增加类型
      foreach($type as $val){
        $this->addTypeDataAndBind(array('title'=>$val),$vid);
      }
      $data_play['vid'] = $data_body['id'] = $vid;
      $sql = $this->db->insert_string($this->db->getTable('video_body'),$data_body);
      $this->db->query($sql);
    }
    $data_play['vid'] = $vid;
    //增加播放源
    $check = $this->checkVideoPlayType($data_play);
    if( !$check){
      $sql = $this->db->insert_string($this->db->getTable('play_type'),$data_play);
      $this->db->query($sql);
    }
    return $vid;
  }

  function checkVideoPlayType($data_play){
    $sql = sprintf("SELECT `vid` FROM %s WHERE `vid`=%d AND `sid`=%d LIMIT 1", $this->db->getTable('play_type'), $data_play['vid'], $data_play['sid']);
    $row = $this->db->row_array($sql);
    return isset($row['vid']) ? $row['vid'] : 0;
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

  function truncate($table = ''){
    if( !$table){
      return false;
    }
    $sql = sprintf("truncate `%s`", $table);
    $this->db->query($sql);
    return true;
  }

  function updateDataByTable($table,$data_head, $where){
    $sql = $this->db->update_string($table, $data_head, $where);
    return $this->db->query($sql);
  }

  function getNoCoverList($limit = 100){
    $sql = sprintf("SELECT `id`,`thum` FROM %s WHERE `cover`=0 LIMIT %d", $this->db->getTable('video_head'), $limit);
    $lists = $this->db->result_array($sql);
    return $lists;
  }

}

?>
