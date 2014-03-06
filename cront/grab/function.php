<?php

include_once($APPPATH.'../db.class.php');
include_once($APPPATH.'../model.php');

$model=new Model();

/*
获取配对的标签的内容
*/
function getTagpair(&$str,&$string,$head,$end,$same){
  $str='';
  $start=stripos($string, $head);
  if($start===false){
    return false;
  }
//第一个包含head标签位置的剩下字符串
  $string=substr($string,$start);
//第一次结尾的end标签的位置
  $start=stripos($string, $end)+strlen($end);
  if($start===false){
    return false;
  }
  $str=substr($string,0,$start);
  $others=substr($string, $start+1);
//开始标签出现的次数
  $count_head=substr_count($str,$same);
//结束标签出息的次数
  $count_tail=substr_count($str, $end);
//echo $others,exit;
  while($count_head!=$count_tail &&$count_tail){
    //$start=stripos($others, $same);
    $length=stripos($others, $end)+strlen($end);
    $str.=substr($others, 0,$length);
    $others=substr($others, $length);
    $count_head=substr_count($str,$same);
    $count_tail=substr_count($str, $end);	
  }
}

function getYoukuDetail($url){
  $html = getHtml($url);
  $info = array();
  preg_match('#<li class="thumb"><img src=\'([^\']+)\' alt=\'[^\']+\'></li>#Uis', $html, $match);
  $info['thum'] = trim($match[1]);
  preg_match('#<label>别名:</label>\s+(.+)\s+</li>#Uis', $html, $match);
  $info['alias'] = trimwhitechar($match[1]);
  preg_match('#<span class="type"><a href="[^"]+" charset="[^"]+" target="_blank">(.+)</a>:</span>#Uis', $html, $match);
  $info['cate'] = trim($match[1]);
  preg_match('#<label>类型:</label>\s+(.+)\s+</span>\s+</li>#Uis', $html, $match);
  $info['type'] = trim($match[1]);
  $info['type'] = parseTags($info['type']);
  preg_match('#<label>主演:</label>\s+(.+)\s+</span>\s+</li>#Uis', $html, $match);
  $info['actor'] = trim($match[1]);
  $info['actor'] = parseTags($info['actor']);
  preg_match('#<div class="basenotice">\s+更新至\d+\s+/共(\d+)集\s+<span class="break">|</span>#Uis', $html, $match);
  $info['setnum'] = trim($match[1]);
  preg_match('#<div class="detail">\s+<span class="short" id="show_info_short" style="display: inline;">\s+(.+)\s+</span>\s+</div>#Uis', $html, $match);
  $info['intro'] = getTvInfo($match[1]);
  preg_match('#<ul .+<li class="username">\s+<a target="_blank" title="[^"]+" charset="[^"]+" href="[^"]+">([^<]+)</a>\s+</li>\s+<li class="portray" title="导演">导演</li>#Uis', $html, $match);
  $info['director'] = trim($match[1]);
  
  return $info;
}

function trimwhitechar($str){
  $pool = array("\t");
  foreach($pool as $val){
    $str = str_replace($val,'',$str);
  }
  return trim($str);
}

function getTvInfo($info){
  $info = preg_replace('#<span>.+</span>#Uis','',$info);
  $info = str_replace(' style="display:none"','',$info);
  $info = str_replace('<a class="more" onclick="y.toggle.point(this)">查看详情>></a>','',$info);
  $info = preg_replace('#\s+#','',$info);
  return trim($info);
}

function getPlayDramInfo($url){
  $html = getHtml($url);
  $info = array();
  preg_match('#<div id="episode_wrap"><div id="episode"><div class="coll_10">(.+)</div>\s+</div></div>#Uis', $html, $match);
  $info['lists'] = trim($match[1]);
  preg_match_all('#<li><a href="http://v\.youku\.com/v_show/id_(.+)\.html" title="[^"]+" charset="[^"]+" target="_blank"></a></li>#Uis', $html, $match);
  $info['lists'] = $match[1];
  
  return $info;
}

function parseTags($str,$replace = array(array('from'=>'#<.+>#Uis','to'=>'')),$seporator = '/'){
  $return = array();
  foreach($replace as $val){
    $str = preg_replace($val['from'],$val['to'],$str);
  }
  $str = explode($seporator,$str);
  foreach($str as $val){
    if(stripos($val,'优酷') !== false){
      continue;
    }
    $return[] = trim($val);
  }
  return $return;
}

function getlastgrabinfo($mode=1,$config=array()){
  global $lastgrab,$cateid,$pageno;
  if($mode){
     if(!file_exists($lastgrab)){
        return false;
     }
     include($lastgrab);
     return true;
  }
  $text="<?php\r\n";
  $text.="\$cateid=$config[cateid];\r\n";
  $text.="\$pageno=$config[pageno];\r\n";
  
  file_put_contents($lastgrab,$text);
  return true;
}

function loginSecBbs(){
   global $dzcurl,$dzdomain,$read_user;
   $uinfo = $read_user;
   $dzcurl->config['cookie'] = 'discuz'.$uinfo['uid'];
   $dzcurl->config['userAgent'] = $uinfo['userAgent'];

   $dzcurl->config['url'] = $dzdomain.'/member.php?mod=register';
   $html = $dzcurl->getHtml();
   if(false !== stripos($html,"<p>歡迎您回來，")){
     preg_match_all('#src="([^"]+)" reload="1"#Uis', $html, $match);
//var_dump($match);exit;
     foreach($match[1] as $url){
       $dzcurl->config['url'] = $url;
       $dzcurl->getHtml();
     }
     echo "登录成功!\n";
     return true;
   }
   preg_match('#<input type="hidden" name="formhash" value="([^"]+)" />#Uis', $html, $match);
   if( !isset($match[1])){
      die("\n== Get Login Formhash Error!===\n");
   }
   $formhash = $match[1];
   $dzcurl->config['url'] = $dzdomain.'/member.php?mod=logging&action=login&loginsubmit=yes&handlekey=login&loginhash=LvZit&inajax=1';
  $dzcurl->postVal=array(
  'username' => $uinfo['uname'],
  'cookietime'=>2592000,
  'answer' =>$uinfo['answer'],
  'formhash' => $formhash,
  'questionid' => $uinfo['questionid'],
  'password'=>$uinfo['upwd']
  );
  $html = $dzcurl->getHtml();
//var_dump($html);exit;
// username
  if(false !== stripos($html,", {'username':'")){
     preg_match_all('#src="([^"]+)" reload="1"#Uis', $html, $match);
//var_dump($match);exit;
     foreach($match[1] as $url){
       $dzcurl->config['url'] = $url;
       $dzcurl->getHtml();
     }
     echo "登录成功!\n";
     return true;
  }
  echo "登录失败!\n";
  return false;
}

/**
*mod=2 dixcuz 2.5,mod=3 dixcuz 3.0
*/
function post_thread($postdata,$mod = 2){
   if(2 == $mod){
      return postdz25data($postdata);
   }else if(3 == $mod){
      return postdz30data($postdata);
   }
   return false;
}

function postdz30data(&$data){
   global $dzcurl,$dzdomain;
   $dzcurl->config['url'] = $dzdomain.'/forum.php?mod=post&action=newthread&fid='.$data['fid'];
  $res = $dzcurl->getHtml();
  if(false == stripos($res,'<span class="pipe">|</span><a href="home.php?mod=spacecp">設置</a>')){
     loginbbs();
     $dzcurl->config['url'] = $dzdomain.'/forum.php?mod=post&action=newthread&fid='.$data['fid'];
     $res = $dzcurl->getHtml();
  }
  $pattern = '#<input type="hidden" name="formhash" id="formhash" value="(.+)" />#Uis';
  preg_match($pattern,$res,$match);
  $formhash = $match[1];
  $dzcurl->config['url'] = $dzdomain.'/forum.php?mod=post&action=newthread&fid='.$data['fid'].'&extra=&topicsubmit=yes';
  $dzcurl->postVal=array(
  'allownoticeauthor'=>1,
  'creditlimit'=>'',
  'formhash'=>$formhash,
  'message'=>$data['message'],
  'posttime'=>time(),
  'price'=>'',
  'readperm'=>0,
  'replycredit_extcredits'=>0,
  'replycredit_membertimes'=>1,
  'replycredit_random'=>100,
  'replycredit_times'=>1,
  'replylimit'=>'',
  'rewardfloor'=>'',
  'rushreplyfrom'=>'',
  'rushreplyto'=>'',
  'save'=>'',
  'stopfloor'=>'',
  'typeid' => 0,
  'subject'=>$data['title'],
  'tags'=>$data['tags'],
  'usesig'=>1,
  'wysiwyg'=>1
  );
  $dzcurl->config['header'] = 1;
  $res = $dzcurl->getHtml();
  $dzcurl->config['header'] = 0;
//var_dump($res);exit;
  preg_match('#mod=viewthread&tid=(\d+)#i',$res,$match);
  $tid = isset($match[1]) ? $match[1] : 0;
  if(!$tid){
    file_put_contents('post_error.html',$res);
  }
  return $tid;
}

function postdz25data(&$data){
   global $dzcurl,$dzdomain;
   $dzcurl->config['url'] = $dzdomain.'/forum.php?mod=post&action=newthread&fid='.$data['fid'];
   $res = $dzcurl->getHtml();
   if(false == stripos($res,'<span class="pipe">|</span><a href="home.php?mod=spacecp">設置</a>')){
     loginbbs();
     $dzcurl->config['url'] = $dzdomain.'/forum.php?mod=post&action=newthread&fid='.$data['fid'];
     $res = $dzcurl->getHtml();
  }
   $pattern = '#<input type="hidden" name="formhash" id="formhash" value="(.+)" />#Uis';
   preg_match($pattern,$res,$match);
   $formhash = $match[1];
   $dzcurl->config['url'] = $dzdomain."/forum.php?mod=post&action=newthread&fid={$data['fid']}&extra=&topicsubmit=yes";
  $dzcurl->postVal = array(
  'addfeed' => 1,
  'allownoticeauthor' => 1,
  'checkbox' => 0,
  'contentage' => 'default',
  'formhash' => $formhash,
  'message' => $data['message'],
  'newalbum' => '',
  'posttime' => time(),
  'readperm' => '',
  'save' => '',
  'subject' => $data['title'],
  'tags' => $data['tags'],
  'typeid' => $data['typeid'],
  'uploadalbum' => '',
  'usesig' => 1,
  'wysiwyg' => 0
  );
  $dzcurl->config['header'] = 1;
  $res = $dzcurl->getHtml();
  $dzcurl->config['header'] = 0;
  preg_match('#<p class="alert_btnleft"><a href="thread-(\d+)-1-1.html[^"]*">如果#Uis',$res,$match);
  if( !isset($match[1])){
file_put_contents('post_error.html',$res);
     return false;
  }
  return $match[1];
}

function loginbbs($formhash = ''){
   global $dzcurl,$dzdomain,$bbs_user;
   $uinfo = $bbs_user[mt_rand(0,count($bbs_user) - 1)];
   $dzcurl->config['cookie'] = 'discuz'.$uinfo['uid'];
   $dzcurl->config['userAgent'] = $uinfo['userAgent'];

   $dzcurl->config['url'] = $dzdomain.'/member.php?mod=logging&action=login&loginsubmit=yes&infloat=yes&lssubmit=yes&inajax=1';
  $dzcurl->postVal=array(
  'username' => $uinfo['uname'],
  'fastloginfield'=>'username',
  'cookietime'=>2592000,
  'quickforward'=>'yes',
  'handlekey'=>'ls',
  'password'=>$uinfo['upwd']
  );
  $res = $dzcurl->getHtml();
//var_dump($res);exit;
// username
  if(false !== stripos($res,", {'username':'")){
     echo "登录成功!\n";
     return true;
  }
  echo "登录失败!\n";
  return false;
}

function uploadPic(&$data){
  $curl = curl_init();
  $url = $data['url'];
  unset($data['url']);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
  // curl_setopt($curl, CURLOPT_PROXY ,"http://189.89.170.182:8080");
  curl_setopt($curl, CURLOPT_POST, count($data));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
  if(curl_errno($curl)){
    echo 'error',curl_error($curl),"\r\n";
    return false;
  }
  curl_close($curl);
  $data['url'] = $url;
  return $tmpInfo;
}

function getHtml($url){
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.3 (Windows; U; Windows NT 5.3; zh-TW; rv:1.9.3.25) Gecko/20110419 Firefox/3.7.12');
  // curl_setopt($curl, CURLOPT_PROXY ,"http://189.89.170.182:8080");
  curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
  curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $tmpInfo = curl_exec($curl);
  if(curl_errno($curl)){
    echo 'error',curl_error($curl),"\r\n";
    return false;
  }
  curl_close($curl);
  return $tmpInfo;
}

?>
