<?php
require_once 'avbasemodel.php';
class avModel extends avbaseModel{
  protected $_dataStruct = '*';
  protected $_datatopicStruct = '*';
  protected $_dramListStruct = '`id`, `vid`, `playnum`, `title`,`atime`';

  public function __construct(){
     parent::__construct();
  }
  
}
?>
