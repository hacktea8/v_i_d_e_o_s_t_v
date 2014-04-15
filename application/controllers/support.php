<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'avbase.php';
class Support extends Avbase{
  public function __construct(){
    parent::__construct();
//    $this->load->model('indexmodel');
//var_dump($this->viewData);exit;
  }
  public function index(){
    $this->assign(array());
    $this->view($this->_c.'_'.$this->_a);
  }
  public function faq(){
   $this->view($this->_c.'_'.$this->_a);
  }
  public function success(){
   $this->view('payment_success');
  }
  public function notify_url(){
  }
  public function loginout(){
  }
  public function login(){
  }
}
