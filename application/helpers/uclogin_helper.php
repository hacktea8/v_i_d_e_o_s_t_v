<?php
defined('P_W') || define('P_W', '1');

require_once BASEPATH.'../config_ucenter.php';
require_once BASEPATH.'../uc_client/client.php';

if( !function_exists('check_is_spider')){
 function check_is_spider(){
  $return = 0;
  $spider_agent = array('Baiduspider','Googlebot','Sosospider','360Spider','MSNBot','YoudaoBot','Sogou inst spider','Sogou spider2','Sogou blog','Sogou News Spider','Sogou Orion spider','JikeSpider');
  if($_SERVER['REMOTE_ADDR'] === '127.0.0.1'){
   return 1;
  }
  foreach($spider_agent as $agent){
   if(false !== stripos($_SERVER['HTTP_USER_AGENT'])){
    $return = 1;
    break;
   }
  }
  return $return;
 }
}

if( !function_exists('add_user_vip_group')){
  function add_user_vip_group($post_data){
    $key = '';
    $param = strtrip($post_data,$key);
    $context['http'] = array(
      'method' => 'get',
      'timeout' => 120,
    );
    $ct = stream_context_create($context);
    $url = sprintf('http://www.hacktea8.com/51pay/payvip.php?%s',$param);
    $html = file_get_contents($url,false,$ct);
    return $html;
  }
}

if ( ! function_exists('strcode'))
{
 function strcode($string, $encode = true, $apikey = '') {
    $uc_key = getKeyBydomain();
    $apikey = $apikey ? $apikey: $uc_key;
    !$encode && $string = base64_decode($string);
    $code = '';
    $key  = substr(md5($_SERVER['HTTP_USER_AGENT'] . $apikey),8,18);
    $keylen = strlen($key);
    $strlen = strlen($string);
    for ($i = 0; $i < $strlen; $i++) {
      $k    = $i % $keylen;
      $code  .= $string[$i] ^ $key[$k];
    }
    return ($encode ? base64_encode($code) : $code);
  } 
}

if ( ! function_exists('getcode'))
{
  function getcode($len = 6){
    $str = 'qwertyuioplkjhgfdsazxcvbnm1234567890,.?;:!@#$%^&*()-=+';
    $length = strlen($str) - 1;
    $tmp = '';
    for($i=0;$i<$len;$i++){
      $tmp .= $str[mt_rand(0,$length)];
    }
    return $tmp;
  }
}

if ( ! function_exists('send_email'))
{
  function send_email($data){
    ;
    ;
  }
}

if ( ! function_exists('activation_email'))
{
  function activation_email($data){
    ;
    ;
  }
}

if ( ! function_exists('get_client_ip'))
{
  function get_client_ip(){
    $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
  }
}

if ( ! function_exists('getSynuserUid'))
{
  function getSynuserUid($cookie_key = 'hk8_auth'){
    if(isset($_COOKIE[$cookie_key])){
      $code = $_COOKIE[$cookie_key];
      $uinfo = uc_authcode($code, $operation = 'DECODE');
      $info = array();
      list($info['uname'],$info['uid']) = explode("\t", $uinfo);
      return $info;
    }
    return false;
  }
}

if ( ! function_exists('getSynuserInfo'))
{
  function getSynuserInfo($uid){
    if( !$uid){
       return false;
    }
    list($status['uid'],$status['groupid'],$status['groupexpiry'],$status['groups']) = uc_user_info($uid);
    $status['groups'] = explode(',',$status['groups']);
    return $status;
  }
}

if ( ! function_exists('strtrip'))
{
  function strtrip($request,$uckey){
    ksort($request);
    reset($request);
    $arg = '';
    foreach ($request as $key => $value) {
      if ($value) {
        $value = stripslashes($value);
        $arg .= "$key=$value&";
      }
    }
    $sig = md5($arg.$uckey);
    $return = $arg."sig=$sig";

    return $return;
  }
}

?>
