<?php
$sp='/var/www/html/emule/public/images/';

$arr=array('images/layout/top_add_1.png','base/images/icon_sprites.gif','images/layout/new-searchbar-broad.png');
foreach($arr as $val){
 $comman='wget http://v4.vcimg.com/'.$val.' -O '.$sp.basename($val);
 exec($comman);
}

?>
