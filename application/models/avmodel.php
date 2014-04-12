<?php
require_once 'avbasemodel.php';
class avModel extends avbaseModel{
  protected $_dataStruct = '*';
  protected $_datatopicStruct = '*';
  protected $_dramListStruct = '*';

  public function __construct(){
     parent::__construct();
  }
  public function getVideoPlayInfoByid($vid,$playnum = 1){
    $table = sprintf("`av_video_drama%d`",$vid%6);
    $sql = sprintf("SELECT vh.`title`,vb.`playmode` FROM `av_video_head` as vh LEFT JOIN `av_video_body` as vb ON(vh.vid=vb.vid) WHERE vh.vid=%d LIMIT 1",$vid);
    $row = $this->db->query($sql)->row_array();
    $row['vlist'] = $this->getVideoDramaList($vid);
    $play = $row['vlist'][$playnum];
    $play = $play ? $play : array();
    $info = array_merge($row,$play);
    return $info;
  } 
}
?>
