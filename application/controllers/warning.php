<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'avbase.php';
class Warning extends Avbase {
  public function __construct(){
    parent::__construct();
//    $this->load->model('indexmodel');
//var_dump($this->viewData);exit;
  }
  public function index(){
   $this->viewData['referer'] = $this->_r;
   $this->load->view('waring_check',$this->viewData);
  }
  public function check(){
   setcookie('isadult','1',time()+24*3600,'/');
   exit('1');
  }
}
