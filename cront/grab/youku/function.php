<?php



function getYoukuDetail($url){
  $html = getHtml($url);
  $info = array();
  preg_match('#<body[^>]*>(.+)</body>#Uis', $html, $match);
  $html = $match[1];
  $html = strip_rubbish($html);
  preg_match('#<li class="thumb"><img src=\'([^\']+)\' alt=\'[^\']+\'></li>#Uis', $html, $match);
  $info['thum'] = trim($match[1]);
  preg_match('#<label>别名:</label>(.+)</li>#Uis', $html, $match);
  $info['alias'] = trimwhitechar($match[1]);
  preg_match('#<span class="type"><a href="[^"]+" charset="[^"]+" target="_blank">(.+)</a>:</span>#Uis', $html, $match);
  $info['cate'] = trim($match[1]);
  preg_match('#<label>类型:</label>(.+)</span>.+<label>主演:</label>#Uis', $html, $match);
  $info['type'] = trim($match[1]);
  $info['type'] = parseTags($info['type']);
  preg_match('#<label>主演:</label>(.+)</span>\s*</li>#Uis', $html, $match);
  $info['actor'] = trim($match[1]);
  $info['actor'] = parseTags($info['actor']);
  preg_match('#<div class="basenotice">[^<]*共(\d+)集#Uis', $html, $match);
  $info['setnum'] = trim($match[1]);
  $info['setnum'] = $info['setnum'] ? $info['setnum'] : 0;
  preg_match('#<div class="detail">\s*<span class="short" id="show_info_short" style="display: inline;">(.+)</span>\s*</div>#Uis', $html, $match);
  $info['intro'] = getTvInfo($match[1]);
  preg_match('#<li class="username">\s+<a target="_blank" title="[^"]+" charset="[^"]+" href="[^"]+">([^<]+)</a>\s+</li>\s+<li class="portray" title="导演">导演</li>#Uis', $html, $match);
  $info['director'] = trim($match[1]);
  preg_match('#<li class="row2">\s*<span class="area">\s*<label>地区:</label>(.+)</span>#Uis',$html, $match);
  $info['area'] = parseTags($match[1]);
  
  return $info;
}

function getYoukuMovieDetail($url){
  $html = getHtml($url);
  $info = array();
  preg_match('#<body[^>]*>(.+)</body>#Uis', $html, $match);
  $html = $match[1];
  $html = strip_rubbish($html);
  preg_match('#<li class="thumb"><img src=\'([^\']+)\' alt=\'[^\']+\'></li>#Uis', $html, $match);
  $info['thum'] = trim($match[1]);
  preg_match('#<label>别名:</label>([^<]+)</li>#Uis', $html, $match);
  $info['alias'] = trimwhitechar($match[1]);
  preg_match('#<span class="type"><a href="[^"]+" charset="[^"]+" target="_blank">(.+)</a>:</span>#Uis', $html, $match);
  $info['cate'] = trim($match[1]);
  preg_match('#<label>类型:</label>\s+(.+)\s+</span>.+<label>主演:</label>#Uis', $html, $match);
  $info['type'] = trim($match[1]);
  $info['type'] = parseTags($info['type']);
  preg_match('#<ul class="baseinfo">(.+)</ul>#Uis',$html,$match);
  $baseinfo = $match[1];
  preg_match('#<span class="actor"><label>主演:</label>(.+)</span></li>#Uis', $baseinfo, $match);
  $info['actor'] = trim($match[1]);
  $info['actor'] = parseTags($info['actor']);
  $info['setnum'] = 1;
  preg_match('#<div class="detail" id="Detail">(.+)</div>#Uis', $html, $match);
  $info['intro'] = getTvInfo($match[1]);
  preg_match('#<li class="row2"><span class="director"><label>导演:</label>\s+<a href="[^"]+"charset="[^"]+" target="_blank">([^<]+)</a>\s+</span>#Uis', $baseinfo, $match);
  $info['director'] = trim($match[1]);
  preg_match('#<li class="row2">\s*<span class="area">\s*<label>地区:</label>(.+)</span>#Uis',$baseinfo, $match);
  $info['area'] = parseTags($match[1]);
  return $info;
}

function strip_rubbish($str){
  $str_replace = array(
  //array('from'=>'','to'=>'')
  );
  $preg_replace = array(
  array('from'=>'#<script[^>]*>.*</script>#Uis','to'=>'')
  ,array('from'=>'#\s\s+#Uis','to'=>'')
  );
  foreach($str_replace as $v){
    $str = str_replace($v['from'],$v['to'],$str);
  }
  foreach($preg_replace as $v){
    $str = preg_replace($v['from'],$v['to'],$str);
  }
  return $str;
}

function trimwhitechar($str){
  $pool = array("\t");
  foreach($pool as $val){
    $str = str_replace($val,'',$str);
  }
  return trim($str);
}

function getTvInfo($info){
  $info = preg_replace('#<span>[^<]+</span>#Uis','',$info);
  $info = preg_replace('#<span class="short" style="display:block;">[^<]+</span>#Uis','',$info);
  $info = str_replace(' style="display:none"','',$info);
  $info = str_replace('<a class="more" onclick="y.toggle.point(this)">查看详情>></a>','',$info);
  $info = preg_replace('#\s\s+#Uis','',$info);
  $info = strip_tags($info);
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



?>
