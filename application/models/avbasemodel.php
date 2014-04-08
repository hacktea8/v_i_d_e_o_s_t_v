<?php
class avbaseModel extends CI_Model{
  public $db;
  protected $_dataStruct = '*';
  protected $_dataListStruct = '*';
  
  public function __construct(){
    parent::__construct();
    $this->db  = $this->load->database('default', TRUE);
     
  }
  public function getVideoInfoByid($id = '',$isadmin = 0){
    $where = sprintf(" AND vh.`flag`=1 AND vh.`atime`<=%d",date('Ymd'));
    if($isadmin){
      $where = '';
    }
    $sql = sprintf("SELECT %s FROM `av_video_head` as vh LEFT JOIN `av_video_body` as vb ON(vh.vid=vb.vid) WHERE vh.vid=%d %s LIMIT 1",$this->_dataStruct,$id,$where);
    $info = $this->db->query($sql)->row_array();
    return $info;
  }
  public function getVideoListByCid($cid='',$order=0,$page=1,$limit=25,$where = array('`flag`=1')){
    $start = ($page-1)*$limit;
    $orderMap = array('`atime` DESC');
    $order = isset($orderMap[$order])?$orderMap[$order]:array_pop($orderMap);
    if($cid >0){
      $where[] = sprintf("`cid`=%d",$cid);
    }
    $where[] = sprintf("`atime`<=%d",date('Ymd'));
    $where = implode(' AND ',$where);
    $sql = sprintf("SELECT %s FROM `av_video_head` WHERE %s ORDER BY %s LIMIT %d,%d",$this->_dataListStruct,$where,$order,$start,$limit);
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
  //    $v['cover'] = $this->getCoverUrl($v['cover']);
      $v['atime'] = date('Y-m-d',strtotime($v['atime']));
    }
    return $list;
  }
  
  public function getMenuListById($idstr = ''){
     if( !$idstr){
       return false;
     }
     $sql = sprintf('SELECT * FROM `cate` WHERE `id` IN (%s)', $idstr);
     return $this->db->query($sql)->result_array();
  }
  public function getChannelListById($idstr = ''){
     if( !$idstr){
       return false;
     }
     $ids = explode(',',$idstr);
     $return = array();
     foreach($ids as $id){
       $sql = sprintf('SELECT * FROM `channel` WHERE `id`=%d', $id);
       $return[] = $this->db->query($sql)->row_array();
     }
     return $return;
  }
  public function getUrl($type = '',$p1='',$p2='',$p3='',$p4='',$p5=''){
     $url = '';
     if('content' == $type){
       $url = sprintf('/index/%s/%d.shtml',$type,$p1);
     }
     return $url;
  }
  public function getCoverUrl($cover){
     return sprintf('http://img.hacktea8.com/showpic.php?key=%s',$cover);
  }

}
?>
