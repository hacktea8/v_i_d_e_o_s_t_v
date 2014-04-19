<?php
require_once 'avbasemodel.php';
class admavModel extends avbaseModel{

  public function __construct(){
    parent::__construct();
  }
  public function addVideoDramByData($data_dram){
    $table = sprintf("`av_video_drama%d`",$data_dram['vid']%6);
    $sql = sprintf("SELECT `id` FROM %s WHERE `playnum`=%d AND `vid`=%d LIMIT 1",$table,$data_dram['playnum'],$data_dram['vid']);
    $row = $this->db->query($sql)->row_array();
    if($row){
      return $row['id'];
    }
    $data_dram['atime'] = time();
    $this->db->insert($table,$data_dram);
    $id = $this->db->insert_id();
    return $id;
  }
  public function setVideoCateInfoByData($data){
    $cid = isset($data['cid'])?$data['cid']:0;
    unset($data['cid']);
    if($cid){
      $this->db->update('`av_cate`',$data,array('cid'=>$cid));
    }else{
      $this->db->insert('`av_cate`',$data);
      $cid = $this->db->insert_id();
    }
     return $cid;
  }
  public function getVideoCateInfoByid($cid){
    $sql = sprintf('SELECT * FROM `av_cate` WHERE `cid`=%d LIMIT 1',$cid);
    $row = $this->db->query($sql)->row_array();
    return $row;
  }
  public function setVideoInfoByData($data_head,$data_body){
    $vid = isset($data_head['vid'])?$data_head['vid']:0;
    unset($data_head['vid']);
    if($vid){
      $sql = $this->db->update('`av_video_head`',$data_head,array('vid'=>$vid));
      $sql = $this->db->update('`av_video_body`',$data_body,array('vid'=>$vid));
    }else{
      $data_head['atime'] = 20880409;
      $sql = $this->db->insert('`av_video_head`',$data_head);
      $vid = $this->db->insert_id();
      $data_body['vid'] = $vid;
      $sql = $this->db->insert('`av_video_body`',$data_body);
    }
    //更新tag
    $this->delVideoTagByVid($vid);
    $tagStr = $data_body['keyword'];
    $this->addVideoTagByVidTag($vid,$tagStr);
    return $vid;
  }
  public function addTag($tag){
    if(!$tag){
      return 0;
    }
    $tag = mysql_real_escape_string($tag);
    $sql = sprintf("SELECT `tid` FROM `av_tags` WHERE `title`='%s' LIMIT 1",$tag);
    $row = $this->db->query($sql)->row_array();
    if($row){
      return $row['tid'];
    }
    $data = array('title'=>$tag);
    $sql = $this->db->insert('`av_tags`',$data);
    $tid = $this->db->insert_id();
    return $tid;
  }
  public function addVideoTagByVidTag($vid,$tagStr){
    $tagArr = explode(',',$tagStr);
    foreach($tagArr as $tag){
      $tag = trim($tag);
      $tid = $this->addTag($tag);
      $data = array('vid'=>$vid,'tid'=>$tid);
      $sql = $this->db->insert('`av_video_tag`',$data);
      $this->setTagVideoCount($tid);
    }
    return true;
  }
  public function setTagVideoCount($tid){
    if(!$tid){
      return 0;
    }
    $sql = sprintf("UPDATE `av_tags` SET `total`=(SELECT COUNT(*) FROM `av_video_tag` as vt INNER JOIN `av_video_head` as vh ON(vt.vid=vh.vid) WHERE vh.flag=1 AND vh.atime<=%d) WHERE `tid`=%d LIMIT 1",date('Ymd'),$tid);
    $this->db->query($sql);
    return true;
  }
  public function delVideoTagByVid($vid){
    $sql = $this->db->delete('av_video_tag', array('vid' => $vid));
    return true;
  }
}
?>
