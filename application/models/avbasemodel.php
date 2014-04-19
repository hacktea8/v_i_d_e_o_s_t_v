<?php
class avbaseModel extends CI_Model{
  public $db;
  protected $_dataStruct = '*';
  protected $_dataListStruct = '*';
  protected $_dramListStruct = '*';
  
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
    if($info['atime'] <= date('Ymd')){
      $info['atime'] = date('Y-m-d',strtotime($info['atime']));
    }
    $info['pic'] = $this->getCoverUrl($info['cover']);
    $info['url'] = $this->getUrl('detail',$info['vid']);
    $info['cateurl'] = $this->getUrl('lists',$info['vid']);
    $info['playurl'] = $this->getUrl('play',$info['vid']);
    $info['vlist'] = $this->getVideoDramaList($info['vid']);
    return $info;
  }
  public function getVideoDramaList($vid){
    $table = sprintf("`av_video_drama%d`",$vid%6);
    $sql = sprintf("SELECT %s FROM %s WHERE `vid`=%d",$this->_dramListStruct,$table,$vid);
    $list = $this->db->query($sql)->result_array();
    $return = array();
    foreach($list as $v){
      $v['atime'] = date('Y-m-d',$v['atime']);
      $v['url'] = $this->getUrl('play',$vid,$v['playnum']);
      $return[$v['playnum']] = $v;
    }
    return $return;
  }
  public function getVideoListByCid($cid='',$order=0,$page=1,$limit=25,$where = array('`flag`=1'),$isadmin = 0){
    $start = ($page-1)*$limit;
    $orderMap = array('`atime` DESC');
    $order = isset($orderMap[$order])?$orderMap[$order]:array_pop($orderMap);
    if($cid >0){
      $where[] = sprintf("`cid`=%d",$cid);
    }
    if(!$isadmin)
      $where[] = sprintf("`atime`<=%d",date('Ymd'));
    $where = implode(' AND ',$where);
    $where = $where ? ' WHERE '.$where : '';
    $sql = sprintf("SELECT %s FROM `av_video_head` %s ORDER BY %s LIMIT %d,%d",$this->_dataListStruct,$where,$order,$start,$limit);
    $list = $this->db->query($sql)->result_array();
    foreach($list as &$v){
      $v['pic'] = $this->getCoverUrl($v['cover']);
      $v['url'] = $this->getUrl('detail',$v['vid']);
      $v['playurl'] = $this->getUrl('play',$v['vid']);
      $v['atime'] = date('Y-m-d',strtotime($v['atime']));
    }
    return $list;
  }
  
  public function getMenuListById(){
    $sql = 'SELECT * FROM `av_cate`';
    $list = $this->db->query($sql)->result_array();
    $return = array();
    foreach($list as $v){
      $v['url'] = $this->getUrl('lists',$v['cid']);
      $return[$v['cid']] = $v;
    }
    return $return;
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
     if('detail' == $type){
       $url = sprintf('/maindex/%s/%d.shtml',$type,$p1);
     }elseif('play' == $type){
       $p2 = $p2 ? $p2 : 1;
       $url = sprintf('/maindex/%s/%d/%d.shtml',$type,$p1,$p2);
     }elseif('lists' == $type){
       $p2 = $p2 ? sprintf('/%d',$p2):'';
       $p3 = $p3 ? sprintf('/%d',$p3):'';
       $url = sprintf('/maindex/%s/%d/%s%s.shtml',$type,$p1,$p2,$p3);
     }
     return $url;
  }
  public function getCoverUrl($cover){
     return sprintf('http://img.hacktea8.com/showpic.php?key=%s',$cover);
  }

}
?>
