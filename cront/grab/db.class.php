<?php
error_reporting(7);
// db class for mysql
// this class is used in all scripts
// do NOT fiddle unless you know what you are doing

class DB_MYSQL{
  var $database = "";
  var $server   = "";
  var $user     = "";
  var $password = "";

  var $db_pre   = "pw_";
  var $link_id  = 0;
  var $query_id = 0;
  var $record   = array();

  var $errdesc    = "";
  var $errno   = 0;
  var $reporterror = 1;

  var $usepconnect = 1;  //使用 pconnect
  var $num_rows = 0;

  public function  __construct($server = "localhost",$user = "emuweb",$password = "ilovehk8",$database = "emuweb"){
    $this->connect($server,$user,$password,$database);
    mysql_query("set names utf8");
  }

  function getTable($table){
    return $this->db_pre.$table;
  }
  function connect($server="",$user="",$password="",$database="") {
    global $usepconnect;
    // connect to db server

    $usepconnect = 1;
    if ( 0 == $this->link_id ) {
      if ($password=="") {
        if ($usepconnect==1) {
          $this->link_id=mysql_pconnect($server,$user);
        } else {
          $this->link_id=mysql_connect($server,$user);
        }
      } else {
        if ($usepconnect==1) {
          $this->link_id=mysql_pconnect($server,$user,$password);
        } else { $this->link_id=mysql_connect($server,$user,$password);
        }
      }
      if (!$this->link_id) {
        $this->halt("Link-ID == false, connect failed");
      }
      if ($database!="") {
        if(!mysql_select_db($database, $this->link_id)) {
          $this->halt("cannot use database ".$database);
        }
      }
    }
  }




  function geterrdesc() {
    $this->error=mysql_error();
    return $this->error;
  }

  function geterrno() {
    $this->errno=mysql_errno();
    return $this->errno;
  }

  function select_db($database="") {
    // select database
    if ($database!="") {
      $this->database=$database;
    }

    if(!mysql_select_db($this->database, $this->link_id)) {
      $this->halt("cannot use database ".$this->database);
    }

  }

function query($query_string, $type= '') {
    // do query

    if($type == "UNBUFFERED")
    {
      $this->query_id = mysql_unbuffered_query($query_string,$this->link_id);
    }
    else
    {
      $this->query_id = mysql_query($query_string,$this->link_id);
    }

    if (!$this->query_id) {
      $this->halt("Invalid SQL: ".$query_string);
    }
    return $this->query_id;
  }


  function fetch_array($query_id=-1,$query_string="") {
    // retrieve row
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    if ( isset($this->query_id) ) {
      $this->record = mysql_fetch_array($this->query_id,MYSQL_ASSOC);
    } else {
      if ( !empty($query_string) ) {
        $this->halt("Invalid query id (".$this->query_id.") on this query: $query_string");
      } else {
        $this->halt("Invalid query id ".$this->query_id." specified");
      }
    }

    return $this->record;
  }

   function free_result($query_id=-1) {
    // retrieve row
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return @mysql_free_result($this->query_id);
  }


  function row_array($query_string) {
    // does a query and returns first row
    $query_id = $this->query($query_string);
    if($query_id)
    {
      $returnarray=$this->fetch_array($query_id);
      $this->free_result($query_id);
    }
    return $returnarray;
  }

  function query_lock($query_string, $name, $timeout = 10)
  {
    $sql = "select get_lock('$name', $timeout)";
    $query_id = $this->query($sql);
    if (!$query_id)
      return $query_id;

    return $this->query_first($query_string);
  }


  function free_lock($name)
  {
    $sql = "select release_lock('$name')";
    $this->query($sql);
  }
 function result_array($query_string)
  {
    $query_id = $this->query($query_string);

    if(!$query_id)
      return NULL;

    $i = 0;
    while($row = $this->fetch_array($query_id))
    {
      $i++;
      $tmp[] = $row;
    }

    $this->num_rows = $i;
    $this->free_result($query_id);
    return $tmp;
  }


  function data_seek($pos,$query_id=-1) {
    // goes to row $pos
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return mysql_data_seek($this->query_id, $pos);
  }

  function num_rows($query_id=-1) {
    // returns number of rows in query
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return mysql_num_rows($this->query_id);
  }

  function num_fields($query_id=-1) {
    // returns number of fields in query
    if ($query_id!=-1) {
      $this->query_id=$query_id;
    }
    return mysql_num_fields($this->query_id);
  }


  function insert_id() {
    // returns last auto_increment field number assigned

    return mysql_insert_id();

  }

  function escape($string){
    return mysql_real_escape_string($string);
  }


  function update_string($table = null,$fields = null,$where = null){
      if(!$table || !$fields || !$where)
        return false;

      $fieldsStr = null;
      $i = 1;
      foreach($fields as $k => $v){
      $v = mysql_real_escape_string($v);
        if($i<count($fields))
          $fieldsStr  = $fieldsStr." $k = '$v' , ";
        else
          $fieldsStr  = $fieldsStr." $k = '$v' ";

        $i++;
      }

      $j = 1;
      foreach($where as $k => $v){
        if($j<count($where))
          $whereStr = $whereStr." $k = '$v' AND ";
        else
          $whereStr = $whereStr." $k = '$v' ";

        $j++;
      }

     $sql = "UPDATE $table SET $fieldsStr WHERE $whereStr";
     return $sql;

  }


  function insert_string($table = null,$fields = null){
    if(!$table || !$fields)
        return false;

      $fieldsStr = $resultStr = null;
      $i = 1;
      $num = count($fields);
     foreach($fields as $k => $v){
      $v = mysql_real_escape_string($v);
      if($i < $num){
        $fieldsStr = $fieldsStr." `$k` ,";
        $resultStr = $resultStr." '$v' ,";
      }else{
        $fieldsStr = $fieldsStr." `$k` ";
        $resultStr = $resultStr." '$v' ";
      }
      $i++;
    }

     $sql = "INSERT INTO $table  ($fieldsStr) VALUES ($resultStr)";
     return $sql;
   }


    function deletes($table = null,$where = null){
      if(!$table || !$where)
        return false;
      $i = 1;
      $num = count($where);
      foreach($where as $k => $v){
          if($i < $num)
            $whereStr = $whereStr." $k = '$v' AND ";
          else
            $whereStr = $whereStr." $k = '$v' ";

        $i++;
      }

      $sql = "DELETE FROM $table WHERE $whereStr";
      $query = $this->query($sql);
      if($query)
        return true;
      else
        return false;
    }


  function inserts($table = null,$fields = null){
     if(!$table || !$fields)
        return false;

      $fieldsStr = $resultStr = null;
      $i = 1;
      $num = count($fields);
     foreach($fields as $k => $v){
      $v = mysql_real_escape_string($v);
      if($i < $num){
        $fieldsStr = $fieldsStr." `$k` ,";
        $resultStr = $resultStr." '$v' ,";
      }else{
        $fieldsStr = $fieldsStr." `$k` ";
        $resultStr = $resultStr." '$v' ";
      }
      $i++;
    }

     $sql = "INSERT INTO $table  ($fieldsStr) VALUES ($resultStr)";
     $query = $this->query($sql);
      if($query)
        return true;
      else
        return false;
  }


 function halt($msg) {
    $this->errdesc=mysql_error();
    $this->errno=mysql_errno();
    // prints warning message when there is an error

    if ($this->reporterror==1) {
      $message="Database error : $msg\n";
      $message.="mysql error: $this->errdesc\n";
      $message.="mysql error number: $this->errno\n";
      $message.="Date: ".date("l dS of F Y h:i:s A")."\n";
      $message.="Referer: ".getenv("HTTP_REFERER")."\n";
      $message.="DB: ".$this->server."\n";

      echo "\n<!-- $message -->\n";
     //mail ( "jimmy@webs-tv.com", "db error", $message);
      echo "</td></tr></table>\n<p>There seems to have been a slight problem with the database.\n";
      echo "Please try again by pressing the refresh button in your browser.</p>";
      echo "<p>We apologise for any inconvenience.</p>";

//      die("");
    }
  }
}
?>

