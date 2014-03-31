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
  public function getVideoInfoByVid($vid,$sid,$page=1,$limit=20){
    $sql = sprintf("SELECT vh.*,vb.'info' FROM `video_head` as vh LEFT JOIN `video_body` as vb ON(vh.vid=vb.vid) WHERE vh.vid=%d LIMIT 1",$vid);
    $info = $this->db->query($sql)->row_array();
    $info['vlist'] = $this->getVideoDramList($vid,$sid,$page,$limit);
    
    return $info;
  }
  public function getVideoDramList($vid,$sid,$page=1,$limit=20){
    $sql = sprintf("");
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
