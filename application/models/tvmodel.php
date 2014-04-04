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
     $v['url'] = $this->getUrl('content',$v['id']);
     $v['playurl'] = $this->getUrl('content',$v['id']);
     $v['atime'] = date('Y-m-d',$v['atime']);
     $v['rtime'] = date('Y-m-d',$v['rtime']);
    }
    return $list;
  }
  public function getActorList($vid,$limit = 5){
    $sql = sprintf("SELECT a.* FROM `actor` as a LEFT JOIN `video_actor` as va ON(a.id=va.aid) WHERE va.vid=%d LIMIT %d",$vid,$limit);
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
     $v['url'] = $this->getUrl($type = 'actor', $v['title']);
    }
    return $list;
  }
  public function getTypeList($vid,$limit = 5){
    $sql = sprintf("SELECT c.* FROM `cate` as c LEFT JOIN `video_cate` as vc ON(c.id=vc.cid) WHERE vc.vid=%d LIMIT %d",$vid,$limit);
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
     $v['url'] = $this->getUrl($type = 'cate', $v['cid']);
    }
    return $list;
  }
  public function getDirectorInfo($did){
    $sql = sprintf("SELECT * FROM `actor` WHERE id=%d LIMIT 1",$did);
    $info = $this->db->query($sql)->row_array();
    $info['url'] = $this->getUrl($type = 'actor', $v['title']);
    return $info;
  }
  public function getVideoContentByVid($vid){
    $info = $this->getVideoInfoByVid($vid);
    if(!$info){
      $info['vlist'] = $this->getVideoPlaytypeList($vid);
    }
    return $info;
  }
  public function getVideoDetailByVid($vid,$sid,$page=1,$limit=20){
    $info = $this->getVideoInfoByVid($vid);
    if(!$info){
      $info['vlist'] = $this->getVideoDramList($vid,$sid,$page,$limit);
    }
    return $info;
  }
  public function getVideoInfoByVid($vid){
    if(!$vid){
      return false;
    }
    $sql = sprintf("SELECT vh.*,vb.`intro` FROM `video_head` as vh LEFT JOIN `video_body` as vb ON(vh.id=vb.id) WHERE vh.id=%d LIMIT 1",$vid);
    $info = $this->db->query($sql)->row_array();
    $info['actor'] = $this->getActorList($info['vid'],$limit = 2);
    $info['type'] = $this->getTypeList($info['vid'],$limit = 3);
    $info['director'] = $this->getDirectorInfo($info['director']);
    $info['atime'] = date('Y-m-d H:i:s',$info['atime']);
    $info['rtime'] = date('Y-m-d H:i:s',$info['rtime']);
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
  public function getVideoAreaList(){
    $sql = sprintf("SELECT * FROM `area`");
    $return = array();
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
      $return[$v['id']] = $v;
    }
    return $return;
  }
  public function getVideoDramSid($vid){
    $table = sprintf('video_drama%d',$vid%10);
    $sql = sprintf("SELECT `sid` FROM `%s` WHERE `vid`=%d LIMIT 1",$table,$vid);
    $info = $this->db->query($sql)->row_array();
    return isset($info['sid']) ? $info['sid'] : 0;
  }
  public function getVideoDramList($vid,$sid,$page = 1,$limit = 20){
    if(!$vid){
      return false;
    }
    $page = intval($page) < 1 ? 1 : $page;
    $start = ($page - 1) * $limit;
    $table = sprintf('video_drama%d', $vid%10);
    $sql = sprintf("SELECT * FROM `%s` WHERE sid=%d AND id=%d LIMIT %d,%d",$table,$sid,$vid,$start,$limit);
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
