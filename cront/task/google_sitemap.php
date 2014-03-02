#!/usr/local/php/bin/php -q
<?php

$root=dirname(__FILE__).'/';
define('BASEPATH', $root.'../../');
//echo $root;exit;
require_once($root.'../grab/db.class.php');
require_once(BASEPATH.'application/helpers/rewrite_helper.php');

class model{
  public $db;
  public function __construct(){
    $this->db = new DB_MYSQL();
  }
  public function getList($page = 1,$limit = 100,$aid = 0){
    $start = ($page - 1) * $limit;
    $sql = sprintf('SELECT `id`,`utime` FROM `pw_emule_article` WHERE `flag`=1 AND `id`>%d  LIMIT %d,%d',$aid,$start,$limit);
     return $this->db->result_array($sql);
  }
  public function addIndex($data = array()){
    $sql = $this->db->insert_string($this->db->getTable('emule_sitemap'),$data);
    $this->db->query($sql); 
    return $this->db->insert_id();
  }
  public function getIndexList($type){
    $sql = sprintf('SELECT   `index` FROM `pw_emule_sitemap` WHERE `type`=%d ORDER BY `id` DESC',$type);
    return $this->db->result_array($sql);
  }
  public function getMaxIndex($type){
    $sql = sprintf('SELECT   `index` FROM `pw_emule_sitemap` WHERE `type`=%d ORDER BY `id` DESC  LIMIT 1',$type);
    $row = $this->db->row_array($sql);
    return isset($row['index'])?$row['index']:0;
  }
  public function getMaxAid($type,$limit){
    $sql = sprintf('SELECT   `aid` FROM `pw_emule_sitemap` WHERE `type`=%d ORDER BY `id` DESC  LIMIT 2',$type);
    $list = $this->db->result_array($sql);
    if(count($list) < 2){
       
       $row = is_array($list)?array_pop($list):array();
       return isset($row['aid'])?$row['aid']:0;
     }
     $row1 = $list[0];
     $row2 = $list[1];
    return ($row1['aid'] - $row2['aid']) < $limit?$row2['aid']:$row1['aid'];
  }
  public function getListNum($aid){
    $sql = sprintf('SELECT count(*) as total FROM `pw_emule_article` WHERE `id`>%d ',$aid);
    $row = $this->db->row_array($sql);
    return isset($row['total'])?$row['total']:0;
  }
}

$type = 1;
$base_url = 'http://emu.hacktea8.com/';
$count = 1;
$countLimit = 30000;
$model = new model();
$aid = $model->getMaxAid($type,$countLimit);
$new_index = $model->getListNum($aid) >= $countLimit? 1: 0;
$index = $model->getMaxIndex($type) + $new_index;
//var_dump($index.'|'.$aid);exit;
  $sitemap = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$tmp = '';
/**/
for($p = 1;;$p++){
 $list = $model->getList($p,150,$aid);
 $list = $list ? $list: array();
 foreach($list as $val){
   $tmp .= '<url><loc>'.$base_url.article_url($val['id']).'</loc><lastmod>'.date('Y-m-d',$val['utime']).'</lastmod><changefreq>weekly</changefreq><priority>1</priority></url>';
   $count++;
  }
   if($count > $countLimit || (empty($list) && $tmp)){
      $tmp = $sitemap.$tmp.'</urlset>';
      $index_file = BASEPATH.'google_sitemap'.$index.'.xml';
      file_put_contents($index_file,$tmp);
      if($new_index || $index >1){
        $model->addIndex(array('type'=>$type,'index'=>$index,'aid'=>$val['id'],'update'=>$val['utime']));
        $new_index = 0;
      }
      $index++;
      $count = 0;
      $tmp = '';
     
sleep(5);
   }
   if(empty($list)){
     break;
   }
}
/**/

$sitemap_index = '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

$indexList = $model->getIndexList($type);
foreach($indexList as $val){
  $sitemap_index .= '<sitemap><loc>'.$base_url.'google_sitemap'.$val['index'].'.xml</loc><lastmod>'.date('Y-m-d').'</lastmod></sitemap>';
}

$sitemap_index .= '</sitemapindex>';
file_put_contents(BASEPATH.'google_sitemap.xml',$sitemap_index);
echo "\n=== work success! ==\n";
?>
