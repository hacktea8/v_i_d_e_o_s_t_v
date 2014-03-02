<?php
defined('BASEPATH') || exit('Forbidden');

if ( ! function_exists('article_url')){
  function article_url($aid = 0,$site_url = ''){
    $return = sprintf('%s/index/topic/%d.html',$site_url,$aid);
    return $return;
  }
}

if ( ! function_exists('list_url')){
  function list_url($cid = 0,$order = 0,$page = 1, $site_url = ''){
    $return = sprintf('%s/index/lists/%d/%d/%d.html', $site_url, $cid, $order, $page);
    return $return;
  }
}

if ( ! function_exists('index_url')){
  function index_url($site_url = ''){
    $return = sprintf('%s/index.html', $site_url);
    return $return;
  }
}

/*
if ( ! function_exists('')){
  function (){
    
    return $return;
  }
}
*/
?>
