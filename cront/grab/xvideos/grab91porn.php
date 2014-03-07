<?php
/**
抓取 http://91porn.com/video.php?category=rf  影片
*/
define('ROOTPATH',dirname(__FILE__));

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/phpCurl.php';
require_once ROOTPATH.'/model.php';
require_once ROOTPATH.'/function.php';

$tvckCurl = new curlModel();
//$tvckCurl->config['proxy'] = $proxy.':9990';
$tvckCurl->config['cookie'] = 'discuz3455867';
$dzCurl = &$tvckCurl;

$pornCurl = new curlModel();
//$pornCurl->config['proxy'] = $proxy.':9990';
$pornCurl->config['cookie'] = 'cookie91porn';

$dwCurl = new curlModel();
//$dwCurl->config['proxy'] = $proxy.':9990';
$dwCurl->config['cookie'] = 'cookie91bestchic';

$model = new Model();

$videoData = array('tags'=>'卡提諾影音,偷拍,影片,成人短片,自拍,成人,adult,線上看,免費', 'pcid'=>48, 'cid'=>58);

for($page = 1;$page <= 1;$page ++){
  $url = sprintf($pndomain.$pnlistUrl,$page);
  $pornCurl->config['url'] = $url;
  $html = $pornCurl->getHtml();
  preg_match_all($pnpregPattern['list'],$html,$matchlist,PREG_PATTERN_ORDER);
//var_dump($matchlist);exit;
  if( !isset($matchlist[1])){
     echo "Page:$page List is Empty!\n";break;
  }
  foreach($matchlist[1] as $key => $url){
    preg_match('#viewkey=([^&]+)&#', $url, $match);
    if( !isset($match[1])){
       echo "\n===$url===\nViewkey is NULL\n";break;
    }
    $viewkey = $match[1];
    $status = $model->checkVideoViewkey($viewkey);
    if($status){
        echo "Viewkey:$viewkey already exists!\n";continue;
    }
    echo "Viewkey:$viewkey grab ···!\n";
    $videoData['title'] = trim($matchlist[2][$key]);
    $videoData['intro'] = $videoData['title'];
    $pornCurl->config['url'] = $url;
    $html = $pornCurl->getHtml();
    $html = file_get_contents('91porn.html');
    preg_match("#&video_id=([^&]+)&mp4=(\d+)\' quality=#", $html, $match); 
//    file_put_contents('91porn.html', $html);
//    var_dump($match);exit;
    $vid = $match[1];
    $mp4 = $match[2];
    $flvUrl = get91pornVideofile($vid, $mp4);
    if( !$flvUrl){
       echo "== $url Get Video File Url Failed! ==\n";
       exit();continue;
    }
    $path = parse_url($flvUrl);
    $ext = getExt($path['path']);
//       $videoData['flvUrl'] = $flvUrl;
    $videoData['flvUrl'] = downFlvfile($flvUrl,$viewkey.$ext);
    if(!$videoData['flvUrl']){
       echo $pornCurl->config['url']." Video FLV File Download Failed!\n";continue;
    }
//var_dump($videoData);exit;
    $status = postNewVideo($videoData);
    if($status){
       $model->addVideoViewkey($viewkey);
       @unlink($videoData['flvUrl']);
     }
//exit;
     sleep(5); 
  }// end foreach videolist
}// end foreach page


