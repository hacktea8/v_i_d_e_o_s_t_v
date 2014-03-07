<?php

define('ROOTPATH',dirname(__FILE__));

require_once ROOTPATH.'/config.php';
require_once ROOTPATH.'/phpCurl.php';
require_once ROOTPATH.'/model.php';
require_once ROOTPATH.'/function.php';


$dwCurl = new curlModel();
$dwCurl->config['proxy'] = '192.168.1.254:9990';
$dwCurl->config['cookie'] = 'cookiejav101';

$dwCurl->config['url'] = 'http://apentest.jav101.com/proxy.php';
$html = $dwCurl->getHtml();
var_dump($html);

/*
$dwCurl->config['url'] = 'http://1.fs136-26.av.ckcdn.com/dl/7ad288846574a15dd33c69ed69a3501d/528c1608/HODV20844.mp4';
$dwCurl->config['referer'] = 'http://apen.jav101.com/maindex/play/HODV20844';
$dwCurl->config['saveFile'] = 'tmp.mp4';
$dwCurl->download();
*/

