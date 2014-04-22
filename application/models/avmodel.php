<?php
require_once 'avbasemodel.php';
class avModel extends avbaseModel{
  protected $_dataStruct = '*';
  protected $_dataListStruct = '*';
  protected $_dramListStruct = '*';

  public function __construct(){
     parent::__construct();
  }
  public function setVideoCateTotal($cid){
    if(!$cid){
      return 0;
    }
    $sql = sprintf("UPDATE `av_cate` SET `total`=(SELECT COUNT(*) FROM `av_video_head` WHERE `cid`=%d AND `flag`=1 AND `atime`<=%d) WHERE `cid`=%d LIMIT 1",$cid,date('Ymd'),$cid);
    $this->db->query($sql);
    return 1;
  }
  public function getRankVideoList($cid,$limit = 15,$type = 'hot'){
    $typeMap = array('hot'=>' ORDER BY `hits` DESC','recom'=>' ORDER BY `hits` ASC');
    $order = '';
    if(isset($typeMap[$type])){
      $order = $typeMap[$type];
    }elseif('rand' === $type){
      
    }
    $where = array('`flag`=1','`atime`<='.date('Ymd'));
    if($cid){
      $where[] = '`cid`='.$cid;
    }
    $where = implode(' AND ',$where);
    $sql = sprintf("SELECT %s FROM `av_video_head` WHERE %s %s LIMIT %d",$this->_dataListStruct,$where,$order,$limit);
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
      $v['atime'] = date('Y/m/d',$v['atime']);
    }
    return $list;
  }
  public function get91pornurl($vid, $mp4){
    if( !$vid){
      return '';
    }
    $v = $vid * ($vid + 7);
   $url = sprintf('http://91.bestchic.com/getfile_jw.php?VID=%s&v=%d&mp4=%d',$vid,$v,$mp4);
   $html = file_get_contents($url);
   preg_match('#file=([^&]+)&#', $html, $match);
   return $match[1];
  }
  public function onlinevideo($limit = 10){
    $atime = date('Ymd');
    $sql = sprintf("UPDATE `av_video_head` SET `atime`=%d WHERE `flag`=1 AND `atime`=20880409 LIMIT %d",$atime,$limit);
    $this->db->query($sql);
  }
  public function getUserWatchLog($uid,$life = 12){
    $endtime = time() - $life*3600;
    $sql = sprintf("SELECT * FROM `av_freelog` WHERE `uid`=%d AND `endtime`>=%d",$uid,$endtime);
    $return = array();
    $list = $this->db->query($sql)->result_array();
    foreach($list as $v){
      $return[] = $v['vid'];
    }
    return $return;
  }
  public function addUserWatchLog($uid,$vid,$life = 12){
    if(!$uid || !$vid){
      return false;
    }
    $endtime = time() - $life*3600;
    $sql = sprintf("SELECT * FROM `av_freelog` WHERE `uid`=%d AND `vid`=%d AND `endtime`>=%d LIMIT 1",$uid,$vid,$endtime);
    $row = $this->db->query($sql)->row_array();
    if($row){
      return $row['vid'];
    }
    $data = array('uid'=>$uid,'vid'=>$vid,'endtime'=>time());
    $this->db->insert('`av_freelog`',$data);
    return $this->db->insert_id();
  }
  public function getVideoPlayInfoByid($vid,$playnum = 1){
    $table = sprintf("`av_video_drama%d`",$vid%6);
    $sql = sprintf("SELECT vh.`title`,vb.`playmode` FROM `av_video_head` as vh LEFT JOIN `av_video_body` as vb ON(vh.vid=vb.vid) WHERE vh.vid=%d LIMIT 1",$vid);
    $row = $this->db->query($sql)->row_array();
    $row['vlist'] = $this->getVideoDramaList($vid);
    $play = $row['vlist'][$playnum];
    $play = $play ? $play : array();
    $info = array_merge($row,$play);
    return $info;
  } 
}
?>
