<?php

require_once ROOTPATH.'/db.class.php';
class Model{
  protected $db = '';
  public $table = '`xvideos`';
  public function __construct(){
     global $dbConfig;
     $this->db = new Dbstuff();
     $this->db->connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pwd'], $dbConfig['dbname'], $dbConfig['charset']);
  }

  public function checkVideoVid($vid = 0, $sitetype = 0){
     if(!$vid){
        return false;
     }
     $sql = sprintf('SELECT `id`, `vid` FROM %s WHERE `vid`=%d AND `sitetype`=%d LIMIT 1',$this->table,$vid, $sitetype);
     $row = $this->db->fetch_first($sql);
     if(isset($row['id'])){
        return $row['id'];
     }
     return false;
  }
  public function addVideoVid($vid = 0, $sitetype = 0){
     if(!$vid){
        return false;
     }
     $sql = sprintf('INSERT INTO %s( `sitetype`,`vid`) VALUES (%d, %d)',$this->table, $sitetype, $vid);
     $this->db->query($sql);
  }
  public function checkVideoViewkey($viewkey, $sitetype = 1){
     if(!$viewkey){
        return false;
     }
     $sql = sprintf('SELECT `id`, `viewkey` FROM %s WHERE `viewkey`=\'%s\' AND `sitetype`=%d LIMIT 1',$this->table,mysql_real_escape_string($viewkey), $sitetype);
     $row = $this->db->fetch_first($sql);
     if(isset($row['id'])){
        return $row['id'];
     }
     return false;
  }
  public function addVideoViewkey($viewkey, $sitetype = 1){
     if(!$viewkey){
        return false;
     }
     $sql = sprintf('INSERT INTO %s( `sitetype`,`viewkey`) VALUES (%d, \'%s\')',$this->table, $sitetype, mysql_real_escape_string($viewkey));
     $this->db->query($sql);
  }
}
