<?php

//ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;)');

$POST = array(
'payment_status'=>'Completed'
,'custom'=>'137_|_59iav'
,'receiver_email'=>'59iav8@gmail.com'
,'mc_gross'=>'180'
,'txn_id'=>'hacktea811111111'
,'payer_email'=>'123@qq.com'
,'memo'=>'wwww'
);
 $context['http'] = array(
      'method' => 'POST',
      'header' => 
      "Content-type: application/x-www-form-urlencoded ",
      'timeout' => 120,
      'content' => http_build_query($POST, '', '&'),
     );
     $ct = stream_context_create($context);
     $url = sprintf('http://www.hacktea8.com/51pay/paypal_notify_url.php');
     $return = file_get_contents($url, false, $ct);
var_dump($context);
var_dump($return);exit;

$url = sprintf('http://www.hacktea8.com/api/uinfo.php?action=getuinfo&uid=%d',1);
$info = file_get_contents($url);
var_dump($info);;
$info = json_decode($info);
var_dump($info);;

