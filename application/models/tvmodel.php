<?php
require_once 'basemodel.php';
class tvModel extends baseModel{
  protected $_dataStruct = '*';
  protected $_datatopicStruct = '';

  public function __construct(){
     parent::__construct();
  }

  public function getVideoListByCid($cid='',$order=0,$page=1,$limit=25){
    $where = $cid ? sprintf(' WHERE `cid`=%d ',$cid):'';
    $orderMap = array('`hits` DESC');
    $order = isset($orderMap[$order]) ? $orderMap[$order] : $orderMap[0];
    $sql = sprintf("SELECT %s FROM `video_head` %s ORDER BY %s LIMIT %d,%d",$this->_dataStruct,$where,$order,$start,$limit);
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
     $v['pic'] = $this->getCoverUrl($v['cover']);
     $v['atime'] = date('Y-m-d',$v['atime']);
     $v['rtime'] = date('Y-m-d',$v['rtime']);
    }
    return $list;
  }
  public function getActorList($vid,$limit = 5){
    $sql = sprintf("SELECT a.* FROM `actor` as a LEFT JOIN `video_actor` as va ON(a.id=va.id) WHERE va.vid=%d LIMIT %d",$vid,$limit);
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
     $v['url'] = $this->getUrl($type = 'actor', $v['title']);
    }
    return $list;
  }
  public function getTypeList($vid,$limit = 5){
    $sql = sprintf("SELECT c.* FROM `cate` as c LEFT JOIN `video_cate` as vc ON(c.cid=vc.cid) WHERE vc.vid=%d LIMIT %d",$vid,$limit);
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
     $v['url'] = $this->getUrl($type = 'cate', $v['cid']);
    }
    return $list;
  }
  public function getDirectorInfo($did){
    $sql = sprintf("SELECT * FROM `actor` WHERE did=%d LIMIT 1",$did);
    $info = $this->db->query($sql)->row_array();
    $info['url'] = $this->getUrl($type = 'actor', $v['title']);
    return $info;
  }
  public function getVideoInfoByVid($vid,$sid,$page=1,$limit=20){
    $sql = sprintf("SELECT vh.*,vb.'info' FROM `video_head` as vh LEFT JOIN `video_body` as vb ON(vh.vid=vb.vid) WHERE vh.vid=%d LIMIT 1",$vid);
    $info = $this->db->query($sql)->row_array();
    $info['vlist'] = $this->getVideoDramList($vid,$sid,$page,$limit);
    $info['actor'] = $this->getActorList($info['vid'],$limit = 2);
    $info['type'] = $this->getTypeList($info['vid'],$limit = 3);
    $info['director'] = $this->getDirectorInfo($info['did']);
    return $info;
  }
  public function getVideoPlaytypeList($vid){
    if( !$vid){
       return 0;
    }
    $sql = sprintf("SELECT * FROM `play_type` WHERE `vid`=%d ",$vid);
    $list = $this->db->query($sql)->result_array();
    return $list;
  }
  public function getVideoPlayChannel($vid){
    if( !$vid){
       return 0;
    }
    $sql = sprintf("SELECT vh.*,vb.`intro` FROM `video_head` as vh LEFT JOIN `video_body` as vb ON(vh.vid=vb.vid) WHERE vh.`vid` =%d LIMIT 1");
    $info = $this->db->query($sql)->row_array();
    $info['plist'] = $this->getVideoPlaytypeList($vid);
    return $info;
  }
  public function getVideoDramList($vid,$sid,$page=1,$limit=20){
    $page = intval($page) <1?1:$page;
    $start = ($page - 1)*$limit;
    $sql = sprintf("SELECT * FROM `%s` WHERE sid=%d AND vid=%d LIMIT %d,%d",$start,$limit);
    $list = $this->db->query($sql)->result_array();
    return $list;
  }
  public function getVideoRecommendList($cid='',$order=0,$page=1,$limit=25){
    $list = $this->getVideoListByCid($cid,$order,$page,$limit);
    foreach($list as &$v){
     $v['cover'] = $this->getCoverUrl($v['cover']);
    }
    return $list;
  }
}
?>
