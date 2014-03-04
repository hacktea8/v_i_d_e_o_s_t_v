<?php

//
$strreplace=array(
,array('from'=>'\"','to'=>'"')
,array('from'=>'\r\n','to'=>'')
,array('from'=>'\n','to'=>'')
);
//
$pregreplace=array(
array('from'=>'#<br>引用.+</td>#Us','to'=>'</td>')
,array('from'=>'#<script [^>]+>.+</script>#','to'=>'')
);


?>
