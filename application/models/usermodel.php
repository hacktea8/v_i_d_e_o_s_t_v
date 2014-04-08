<?php

require_once 'basemodel.php';

class userModel extends baseModel{

  public function __construct(){
    parent::__construct();

  }
  public function getUserInfo($uinfo){
    if( !isset($uinfo['uid']) || !$uinfo['uid']){
      return false;
    }
    $sql = sprintf("SELECT * FROM `%s` WHERE `uid`=%d LIMIT 1", $this->db->dbprefix('user'), $uinfo['uid']);
    $row = $this->db->query($sql)->row_array();
    $uinfo['isvip'] = 0;
    $vipone = array(25);
    $viptwo = array(33);
    if(in_array($uinfo['groupid'],$vipone)){
      $uinfo['isvip'] = 1;
    }elseif(in_array($uinfo['groupid'],$viptwo)){
      $uinfo['isvip'] = 2;
    }
    $ip = get_client_ip();
    $row['groupid'] = $uinfo['groupid'];
    if(isset($row['uid'])){
      $update = array();
    if($row['loginip'] != $ip){
      $row['loginip'] = $update['loginip'] = $ip;
    }
    if($row['logintime'] != date('Ymd')){
      $row['logintime'] = $update['logintime'] = date('Ymd');
    }
    if($row['isvip'] != $uinfo['isvip']){
      $row['isvip'] = $update['isvip'] = $uinfo['isvip'];
    }
    if($row['uname'] != $uinfo['uname']){
      $row['uname'] = $update['uname'] = $uinfo['uname'];
    }
    if(count($update)){
      $where = sprintf(" `uid` =%d LIMIT 1", $uinfo['uid']);
      $sql = $this->db->update_string($this->db->dbprefix('user'),$update,$where);
      $this->db->query($sql);
    }
    return $row;
  }else{
    $point = $this->addUserFreePoint($ip);
    $sql = sprintf("INSERT INTO %s(`uid`, `uname`, `isvip`, `loginip`, `logintime`, `collectcount`, `point`) VALUES (%d,'%s',%d,'%s',%d,0,%d)", $this->db->dbprefix('user'), $uinfo['uid'],mysql_real_escape_string($uinfo['uname']),$uinfo['isvip'],mysql_real_escape_string($ip),date('Ymd'),$point);
    $this->db->query($sql);
  }
  return $uinfo;
 }
 public function addUserFreePoint($ip){
   $uip = mysql_real_escape_string($ip);
   $sql = sprintf("SELECT `id` FROM `iptables` WHERE `ip`='%s' LIMIT 1",$uip);
   $row = $this->db->query($sql)->row_array();
   $ipid = isset($row['id'])?$row['id']:0;
   if(!$ipid){
     $data = array('ip'=>$ip);
     $this->db->insert('`iptables`',$data);
     $ipid = $this->db->insert_id();
   }
   $sql = sprintf("SELECT fl.`id` FROM `freepointlog` as fl INNER JOIN `iptables` as it ON(fl.ipid=it.id) WHERE it.`ip`='%s' LIMIT 1",$uip);
   $row = $this->db->query($sql)->row_array();
   if($row){
     return 0;
   }
   $data = array('ipid'=>$ipid,'atime'=>time());
   $this->db->insert('`freepointlog`',$data);
   return 10;
 }
}
