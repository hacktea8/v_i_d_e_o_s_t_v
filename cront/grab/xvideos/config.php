<?php
//代理IP
//$proxy = '192.168.1.254';
$videoData = array();
//FLV下载目录
$downFlv = ROOTPATH.'/data/downFlv/';
//Video抓取量
$grabVideoLimit = 20;
//Current grab video num
$currGrabVideo = 0;
//根域名
$domain = 'http://www.xvideos.com';
// 91porn
$pndomain = 'http://91porn.com';
$pnlistUrl = '/video.php?category=rf&page=%d';

//列表页Url
$listUrl = '/new/%d/';
//详情页Url
$dzDomain = 'http://ck101.com';
$vckDomain = 'http://v.ck101.com';
$noVideo = array('les','gay');
$japanCate = array('publicsexjapan','japanese','japan');
$toupaiCate = array('Candid');
$jinqinCate = array('dad','daddy','daddyraunch','father','mom','mommy','mommy-got-boobs','mommygotboobs','moms','grandma','grandpa','grande');

$_cate = array(
array('list' => '/tags/anime/%d/d:today','tags' => 'adultanime','pcid' => 40,'cid' => 41,'pattern' => array('listurl' => '#<div class="thumb">\s*<a href="([^"]+)"><img src="[^"]+" id="pic_(\d+)" /></a>\s*</div>#Uis')),
array('list' => '/tags/japanese/%d/d:today','tags' => 'adultsex','pcid' => 48 ,'cid' => 51,'pattern' => array('listurl' => '#<div class="thumb">\s*<a href="([^"]+)"><img src="[^"]+" id="pic_(\d+)" /></a>\s*</div>#Uis'))
);

$userInfo =array(
#array('uid'=>3455859,'uname'=>'绿茵','upwd'=>'iloveck101','userAgent'=>'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)'),
#array('uid'=>3455860,'uname'=>'华静与开悟','upwd'=>'iloveck101','userAgent'=>'Mozilla/5.0 (Windows; U; Windows NT 5.2) Gecko/2008070208 Firefox/3.0.1'),
array('uid'=>3455861,'uname'=>'Vanchael','upwd'=>'iloveck101','userAgent'=>'Mozilla/5.0 (Windows; U; Windows NT 5.1) Gecko/20070803 Firefox/1.5.0.12'),
#array('uid'=>3455863,'uname'=>'路边的Saguaro','upwd'=>'iloveck101','userAgent'=>'Mozilla/5.0 (Macintosh; PPC Mac OS X; U; en) Opera 8.0'),
#array('uid'=>3455864,'uname'=>'不限话题','upwd'=>'iloveck101','userAgent'=>'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Version/3.1 Safari/525.13'),
#array('uid'=>3455865,'uname'=>'Kanan咖蓝','upwd'=>'iloveck101','userAgent'=>'Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.2.149.27 Safari/525.13'),
array('uid'=>3455866,'uname'=>'Lsouth','upwd'=>'iloveck101','userAgent'=>'Opera/8.0 (Macintosh; PPC Mac OS X; U; en)'),
#array('uid'=>3455867,'uname'=>'镜子里的Lou小姐','upwd'=>'iloveck101','userAgent'=>'Mozilla/5.0 (Windows; U; Windows NT 5.2) Gecko/2008070208 Firefox/3.0.1'),
array('uid'=>3509397,'uname'=>'yishujia2000','upwd'=>'iloveck101','userAgent'=>'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)'),
array('uid'=>3509398,'uname'=>'友達國際','upwd'=>'iloveck101','userAgent'=>'Opera/9.27 (Windows NT 5.2; U; zh-cn)')
);
$bbsUser = &$userInfo;
$tmpBbsUser = array();
$curruserinfo = array();
$currUserPos = -1;

$listPattern = array(
'url' => '#<div class="thumb">\s*<a href="([^"]+)"><img src="[^"]+" id="pic_(\d+)" /></a>\s*</div>#Uis'
);

$pnpregPattern = array(
'list' => '#<a  href="([^"]+)" title="([^"]+)">\s+<span class="title">[^<]+</span>\s+</a>#Uis'
);

$detailPattern = array(
'flvUrl' => '#&amp;flv_url=(.+)url_bigthumb=#Uis',
'title' => '#<h2>(.+)<span class="duration">.+</span></h2>#Uis',
'tags' => '#<li><em>Tagged: </em></li>(.*)<li>more <a href="/tags/"><strong>tags</strong></a>\.</li>#Uis'
);

$dbConfig = array(
'host' => '10.52.21.3',
//'host' => '192.168.1.98',
'user' => 'xvideos',
'pwd' => 'xvideos',
'dbname' => 'av',
//'dbname' => 'xvideos',
'charset' => 'utf8'
);

