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
    $orderMap = array('');
    $order = isset($orderMap[$order]) ? $orderMap[$order] : $orderMap[0];
    $sql = sprintf("SELECT %s FROM `video_head` %d ORDER BY %s LIMIT %d,%d",$this->_dataStruct,$where,$cid,$order,$start,$limit);
    $list = $this->db->result_array($sql);
    foreach($list as &$v){
     $v['cover'] = $this->getCoverUrl($v['cover']);
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
