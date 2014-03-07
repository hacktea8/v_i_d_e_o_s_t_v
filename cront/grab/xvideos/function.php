<?php

function get91pornVideofile($vid, $mp4){
   global $dwCurl;
   if( !$vid){
      return '';
   } 
   $v = $vid * ($vid + 7);
   $url = sprintf('http://91.bestchic.com/getfile_jw.php?VID=%s&v=%d&mp4=%d',$vid,$v,$mp4);
   $dwCurl->config['url'] = $url;
   $html = $dwCurl->getHtml();
   preg_match('#file=([^&]+)&#', $html, $match);
   return $match[1];
}

function checkVideoTags($tags = ''){
   if(!$tags){
      return 'sex';
   }
   $arr = explode(',',$tags);
   $tmp = array();
   foreach($arr as $v){
      $v = trim($v);
      if(strlen($v) < 10){
         $tmp[] = $v;
      }
   }
   $tags = implode(',',$tmp);
   return $tags ? $tags : 'sex';
}

function getVideoCate($tags = ''){
  if(!$tags){
    return 58;
  }
  global $noVideo,$japanCate,$jinqinCate,$toupaiCate;
  $tagArr = explode(',',$tags);
  foreach($tagArr as $v){
     $v = trim($v);
     $pre = substr($v,0,3);
     if(in_array($pre,$noVideo)){
        return false;
     }
     if(in_array($v,$japanCate)){
        return 51;
     }
     if(in_array($v,$jinqinCate)){
        return 63;
     }
     if(in_array($v,$toupaiCate)){
        return 50;
     }
  }
  return 58;
}

function downFlvfile($url = '',$name = ''){
  if( !$url){
     return false;
  }
  global $downFlv,$dwCurl;
  $path = parse_url($url);
//避免 参数
  $name = $name ? $name : basename($path['path']) ;

  $dwCurl->config['saveFile'] = $downFlv.$name;
//文件存在返回
  if(file_exists($dwCurl->config['saveFile']) && filesize($dwCurl->config['saveFile']) > 10000000){
     return $dwCurl->config['saveFile'];
  }
  $dwCurl->config['url'] = $url;
  if($dwCurl->download()){
     @chmod($dwCurl->config['saveFile'],0775);
     return $dwCurl->config['saveFile'];
  }

  @unlink($saveFile);
  return false;
}

function getExt($file = ''){
   if(!$file){
     return false;
   }
   $ext = substr($file,-5);
   if('.' == substr($ext,0,1)){
      return $ext;
   }
   if('.' == substr($ext,1,1)){
      return substr($ext,1);
   }
   return false;
}

function uploadVideo($url = '',$sid =''){
  if( !$url || !$sid){
     return false;
  }
//echo $url;"\n";
  global $dzCurl;
  $dzCurl->config['url'] = sprintf('http://new.upload.video.ck101.com/upload.php?sid=%s',$sid);
  $dzCurl->postVal = array(
  'Filedata' => '@'.$url
  );
  $html = $dzCurl->getHtml();
  $html = json_decode($html,1);
  if(isset($html['vid'])){
     return $html['vid'];
  }
var_dump($html);
  return false;
}

function postNewVideo($data = array()){
  global $dzCurl,$vckDomain,$bbsUser,$tmpBbsUser,$currUserInfo;//$curruserpos;

/*  $curruserpos = mt_rand(0,count($bbsUser) - 1);
  $uinfo = $bbsUser[$curruserpos];
*/
  if(empty($bbsUser)){
     $bbsUser = $tmpBbsUser;
     $tmpBbsUser = array();
  }
  $currUserInfo = array_pop($bbsUser);
  $uinfo = &$currUserInfo;
  array_push($tmpBbsUser,$currUserInfo);
  $dzCurl->config['cookie'] = 'discuz'.$uinfo['uid'];
  for($i = 0;$i < 3 ;$i++){
     $dzCurl->config['url'] = $vckDomain.'/admin/upload/';
     $html = $dzCurl->getHtml();
     preg_match('#\?sid=([^\']+)\',#Uis',$html,$match);
     if(isset($match[1])){
        break;
     }
     loginbbs();
     sleep(10);
  }
  if( !isset($match[1])){
//     file_put_contents('sidempty.html',$html);
     echo "Get sid Failed!\n";return false;
  }
  $sid = $match[1];
  $vid = uploadVideo($data['flvUrl'],$sid );
  if(!$vid){
     echo "Uid:",substr($dzCurl->config['cookie'],6),"上传Video File Failed! \n";return false;
  }
  preg_match('#<input name="serverid" type="hidden" class="input" id="serverid" value="([^"]+)">#Uis',$html,$match);
  if( !isset($match[1])){
     echo "Get serverid Failed!\n";return false;
  }
  $serverid = $match[1];
  $dzCurl->config['url'] = $vckDomain.'/admin/updateVideoStatus';
  $dzCurl->postVal = array(
  'vid' => $vid,
  'serverid' => $serverid,
  'createtime' => time(),
  'title' => $data['title'],
  'description' => $data['intro'],
  'tags' => $data['tags'],
  'pcid' => $data['pcid'],
  'cid' => $data['cid'],
  'radio' => 'radio',
  'checkbox2' => 'on'
  );
  $html = $dzCurl->getHtml();
  if(false != stripos($html,'影片已上傳成功')){
     echo "Uid:",substr($dzCurl->config['cookie'],6)," Vid:$vid Video Upload Success!\n";return $vid;
  }
  if($vid){
     die(" Vid:$vid Video 上傳成功!影片添加失敗!\n");
  }
  echo "Uid:",substr($dzCurl->config['cookie'],6)," Vid:$vid Video 上传失败!\n";exit;
}

function loginbbs($goto = 'http://v.ck101.com'){
   global $dzCurl,$dzDomain,$bbsUser,$currUserInfo;//$curruserpos;
   
   if(empty($currUserInfo)){
      $currUserInfo = mt_rand(0,count($bbsUser) - 1);
   }
   $uinfo = &$currUserInfo;
   $dzCurl->config['cookie'] = 'discuz'.$uinfo['uid'];
   $dzCurl->config['userAgent'] = $uinfo['userAgent'];
   $dzCurl->config['url'] = $dzDomain.'/member.php?mod=logging&action=login&goto='.$goto;
   $html = $dzCurl->getHtml();
   preg_match('#<input type="hidden" name="formhash" value="([^"]+)" />#Uis',$html,$match);
   if(false != stripos($html,'歡迎您回來')){
      preg_match_all('#<script type="text/javascript" src="([^"]+)" reload="1"></script>#Uis',$html,$match,PREG_PATTERN_ORDER);
//   一站式登录
      foreach($match[1] as $v){
         $dzCurl->config['url'] = $v;
         $dzCurl->getHtml();
      }
      echo "Uid: ",substr($dzCurl->config['cookie'],6)," 登录成功\n";return true;
   } 
   if( !isset($match[1])){
      die('Login failed!');
   }
   $formhash = $match[1];
   $dzCurl->config['referer'] = $dzCurl->config['url'];
   $dzCurl->config['url'] = $dzDomain.'/member.php?mod=logging&action=login&loginsubmit=yes&loginhash=Lw3C5&inajax=1';
  $dzCurl->postVal = array(
  'username' => $uinfo['uname'],
  'fastloginfield' => 'username',
  'cookietime' => 2592000,
  'quickforward' => 'yes',
  'handlekey' => 'ls',
  'formhash' => $formhash,
  'referer' => $goto,
  'goto' => $goto,
  'password'=>$uinfo['upwd']
  );
  $res = $dzCurl->getHtml();
  if(false != stripos($res,'歡迎您回來')){
     preg_match_all('#<script type="text/javascript" src="([^"]+)" reload="1"></script>#Uis',$res,$match,PREG_PATTERN_ORDER);
//   一站式登录
     foreach($match[1] as $v){
        $dzCurl->config['url'] = $v;
        $dzCurl->getHtml();
     }
     echo "登录成功!\n";return true;
  }
  echo "登录失败!\n";
  return false;
}

