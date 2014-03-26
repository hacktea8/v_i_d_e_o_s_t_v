<?php

//
$strreplace=array(
array('from'=>'\"','to'=>'"')
,array('from'=>'\r\n','to'=>'')
,array('from'=>'\n','to'=>'')
);
//
$pregreplace=array(
array('from'=>'#<br>引用.+</td>#Us','to'=>'</td>')
,array('from'=>'#<script [^>]+>.+</script>#','to'=>'')
);

$domain = 'http://www.youku.com';
//电视剧
$tv_list_url = '%s/v_olist/c_97_g__a__sg__mt__lg__q__s_6_r__u_0_pt_1_av_0_ag_0_sg__pr__h__d_1_p_%d.html';
//电影
$movie_list_url = '%s/v_olist/c_96_g__a__sg__mt__lg__q__s_6_r__u_0_pt_1_av_0_ag_0_sg__pr__h__d_1_p_%d.html';
//综艺
$variety_list_url = '%s/v_olist/c_85_g__a__sg__mt__lg__q__s_6_r__u_0_pt_1_av_0_ag_0_sg__pr__h__d_1_p_%d.html';
//动漫
$anime_list_url = '%/v_olist/c_100_g__a__sg__mt__lg__q__s_6_r__u_0_pt_1_av_0_ag_0_sg__pr__h__d_1_p_%d.html';
$sid = 1;
$up_data['referer'] = $domain;
$up_data['url'] = 'http://img.hacktea8.com/imgapi/uploadurl?seq=';
?>
