<?php
require_once 'basemodel.php';
class tvModel extends baseModel{
  protected $_dataStruct = '';
  protected $_datatopicStruct = '';

  public function __construct(){
     parent::__construct();
  }

  public function getVideoListByCid($cid='',$order=0,$page=1,$limit=25){
     
  }
}
?>
