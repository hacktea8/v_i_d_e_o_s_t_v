<?php
require_once 'basemodel.php';
class emuleModel extends baseModel{
  protected $_dataStruct = 'a.`id`, a.`cid`, a.`uid`, a.`name`, a.`collectcount`, a.`ptime`, a.`utime`, a.`thum`, a.`cover`, a.`hits`';
  protected $_datatopicStruct = 'a.`id`, a.`cid`, a.`uid`, a.`name`, ac.`relatdata`, a.`collectcount`, ac.`keyword`, ac.`downurl`, ac.`vipdwurl`, a.`ptime`, a.`utime`, ac.`intro`, a.`thum`, a.`cover`, a.`hits`';

  public function __construct(){
     parent::__construct();
  }

  public function getArticleListByCid($cid='',$order=0,$page=1,$limit=25){
     switch($order){
       case 1:
       $order=' ORDER BY a.hits ASC '; break;
       case 2:
       $order=' ORDER BY a.hits DESC '; break;
       default:
       $order=' ORDER BY a.ptime DESC ';
     }
     $page = intval($page) - 1;
     $page = $page ? $page : 0;
     $page *= $limit;
     if($cid){
       $cids = $this->getAllCateidsByCid($cid);
       $cids = implode(',',$cids);
       $where = ' a.`cid` in ('.$cids.')  ';
     }
     $sql = sprintf('SELECT %s,c.`name` as cname,c.atotal FROM %s as a LEFT JOIN %s as c ON (a.cid=c.id) WHERE %s AND a.`flag`=1 AND c.flag=1 %s LIMIT %d,%d',$this->_dataStruct,$this->db->dbprefix('emule_article'),$this->db->dbprefix('emule_cate'),$where,$order,$page,$limit);
//echo $sql;exit;
     $data = array();
     $data['emulelist'] = $this->db->query($sql)->result_array();
     foreach($data['emulelist'] as &$val){
       $val['ptime'] = date('Y-m-d', $val['ptime']);
       $val['utime'] = date('Y/m/d', $val['utime']);
     }
     $data['postion'] = $this->getsubparentCate($cid);
     $data['subcatelist'] = $this->getAllSubcateByCid($cid);
     $data['atotal']   = $this->getCateAtotal($cid);
     return $data;
  }

  public function getAllSubcateByCid($cid,$limit = 0){
    $sql = sprintf('SELECT `id`, `pid`, `name`, `atotal` FROM %s WHERE `id`=%d AND `flag`=1 LIMIT 1',$this->db->dbprefix('emule_cate'),$cid);
    $subinfo = $this->db->query($sql)->row_array();
    if( $subinfo['pid']){
      $cid = $subinfo['pid'];
    }
    $limit = intval($limit);
    $limit = $limit ? ' ORDER BY atotal DESC LIMIT '.$limit : '';
    $sql = sprintf('SELECT `id`, `pid`, `name`, `atotal` FROM %s WHERE `pid`=%d AND `flag`=1 %s',$this->db->dbprefix('emule_cate'),$cid,$limit);
    return $this->db->query($sql)->result_array();
  }

  public function getCateListByPid($pid = 0, $limit = 0){
    if( !$pid){
      return false;
    }
    $limit = intval($limit);
    $limit = $limit ? ' ORDER BY atotal DESC LIMIT '.$limit : '';
    $sql = sprintf('SELECT `id`, `pid`, `name`, `atotal` FROM %s WHERE `pid`=%d AND `flag`=1 %s',$this->db->dbprefix('emule_cate'),$pid,$limit);
    return $this->db->query($sql)->result_array();
  }

  public function getsubparentCate($cid = 0){
     if( !$cid){
        return false;
     }
     $sql = sprintf('SELECT `id`, `pid`, `name` FROM %s WHERE `id`=%d AND `flag`=1 LIMIT 1',$this->db->dbprefix('emule_cate'),$cid);
     $subinfo = $this->db->query($sql)->row_array();
     if($subinfo['pid']){
       $parinfo = $this->getsubparentCate($subinfo['pid']);
     }else{
       return array($subinfo);
     }
     return $res = array(array('id'=>$parinfo[0]['id'],'name'=>$parinfo[0]['name']),array('id'=>$subinfo['id'],'name'=>$subinfo['name']));
  }

  public function getEmuleTopicByAid($aid,$uid=0,$isadmin=false){
     $where = '';
     if($uid && !$isadmin)
       $where = sprintf(' AND `uid`=%d LIMIT 1',$uid);

     $sql = sprintf('SELECT %s FROM %s as a LEFT JOIN %s as ac ON (a.id=ac.id) WHERE a.id =%d  %s',$this->_datatopicStruct,$this->db->dbprefix('emule_article'),$this->db->dbprefix('emule_article_content'),$aid,$where);
     $data = array();
     $data['info'] = $this->db->query($sql)->row_array();
     $data['postion'] = $this->getsubparentCate($data['info']['cid']);
     return $data;
  }

  public function setEmuleTopicByAid($uid=0,$data,$isadmin=false){
     //过滤字段
     $header = array();
     $header['id'] = $data['header']['id'];
     $header['cid'] = $data['header']['cid'];
     $header['name'] = $data['header']['name'];
     $header['cover'] = $data['header']['cover'];
     $header['utime'] = time();
     $body = array();
     $body['keyword'] = $data['body']['keyword'];
     $body['downurl'] = $data['body']['downurl'];
     $body['vipdwurl'] = $data['body']['vipdwurl'];
     $body['intro'] = $data['body']['intro'];
     if(isset($header['id']) && $header['id']){
        $this->_datatopicStruct = ' `id` ';
        $check = $this->getEmuleTopicByAid($header['id'],$uid,$isadmin);
        if( !isset($check['id'])){
           return false;
        }
        $where = array('id'=>$header['id']);
        $sql = $this->db->update_string($this->db->dbprefix('emule_article'),$header,$where);
echo $sql;exit;
        $this->db->query($sql);
        $sql = $this->db->update_string($this->db->dbprefix('emule_article_content'),$body,$where);
        $this->db->query($sql);
        return $data['id'];
     }
     $header['uid'] = $uid;
     $sql = $this->db->insert_string($this->db->dbprefix('emule_article'),$header);
echo $sql;exit;
     $this->db->query($sql);
     $id = $this->db->insert_id();
     $body['id'] = $id;
     $sql = $this->db->insert_string($this->db->dbprefix('emule_article_content'),$info);
     $this->db->query($sql);
     return $id;
  }

  public function delEmuleTopicByAid($aid = 0,$uid=0,$isadmin=false){
     if( !$aid){
        return false;
     }
     $this->_datatopicStruct = ' `id` ';
     $check = $this->getEmuleTopicByAid($aid,$uid,$isadmin);
     if( !isset($check['id'])){
        return false;
     }
     $where = array('id'=>$aid);
     $sql = $this->db->delete($this->db->dbprefix('emule_article'),$where);
     $this->db->query($sql);
     $sql = $this->db->delete($this->db->dbprefix('emule_article_content'),$where);
     $this->db->query($sql);
     return $aid;
  }

  public function getCateAtotal($cid){
     if( !$cid){
        return false;
     }
     $sql = sprintf('SELECT `pid`, `atotal` FROM %s WHERE `id`=%d AND `flag`=1 LIMIT 1',$this->db->dbprefix('emule_cate'),$cid);
     $subinfo = $this->db->query($sql)->row_array();

     if( !$subinfo['pid']){
        $sql = sprintf('SELECT sum(`atotal`) as atotal FROM %s WHERE `pid`=%d AND `flag`=1',$this->db->dbprefix('emule_cate'),$cid);
        $subinfo = $this->db->query($sql)->row_array();
     }
     return $subinfo['atotal'];

  }

  public function getAllCateidsByCid($cid = 0){
     if( !$cid){
        return false;
     }
     $sql = sprintf('SELECT `id` FROM %s WHERE `pid`=%d AND `flag`=1',$this->db->dbprefix('emule_cate'),$cid);
     $cate = $this->db->query($sql)->result_array();
     $res = array();
     foreach($cate as $val){
       $res[] = $val['id'];
     }
     $res = count($res) ? $res : array($cid);
     return $res;
  }

  public function getHotTopic($order = 'hits',$limit=15){
     $order = $order ? ' `ptime` DESC ': ' `hits` DESC ';
     $sql   = sprintf('SELECT `id`, `name`, `thum`,`cover` FROM %s WHERE `flag`=1 ORDER BY %s LIMIT %d', $this->db->dbprefix('emule_article'), $order, $limit); 
     return $this->db->query($sql)->result_array();
  }

  public function getCateByCid($sub=0){
     if($sub){
       $sql = sprintf('SELECT `id`, `pid`, `name`, `atotal` FROM %s WHERE `flag` = 1',$this->db->dbprefix('emule_cate'));
       $list= $this->db->query($sql)->result_array();
       $res = array();
       foreach($list as $val){
         if($val['pid'] == 0){
           $res[$val['id']]['id'] = $val['id'];
           $res[$val['id']]['name'] = $val['name'];
           $res[$val['id']]['atotal'] = $val['atotal'];
         }else{
           $res[$val['pid']]['subcate'][] = $val;
         }
       }
       return $res;
     }

     $sql = sprintf('SELECT `id`, `pid`, `name`, `atotal` FROM %s WHERE `pid` = 0 AND `flag` = 1',$this->db->dbprefix('emule_cate'));
     return $this->db->query($sql)->result_array();
  }
  public function getdata(){
     return 9999999;
  }
}
?>
