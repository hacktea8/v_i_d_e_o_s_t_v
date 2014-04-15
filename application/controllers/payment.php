<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'webbase.php';
class Payment extends Webbase{
  public function __construct(){
    parent::__construct();
//    $this->load->model('indexmodel');
//var_dump($this->viewData);exit;
  }
  public function index(){
    $this->assign(array());
    $this->view('payment_index');
  }
  public function cancel(){
   $this->view('payment_cancel');
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
