<?php

require_once 'model.php';
require_once 'db.class.php';
$model = new Model();

$tables = array('actor','area','cate','channel','play_type',
'video_actor','video_body','video_cate','video_drama0','video_head'
);
foreach($tables as $table){
  $model->truncate($table);
}
echo "\n++++ truncate OK +++++++\n";
