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
  public function getVideoRecommendList($cid='',$order=0,$page=1,$limit=25){
    $list = $this->getVideoListByCid($cid,$order,$page,$limit);
    foreach($list as &$v){
     $v['cover'] = $this->getCoverUrl($v['cover']);
    }
    return $list;
  }
}
?>
