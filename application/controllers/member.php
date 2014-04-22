<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('display_errors',1);
error_reporting(E_ALL);
require_once 'avbase.php';
class Member extends Avbase {


  public function __construct(){
    parent::__construct();
    //$this->load->model('emulemodel');
  }
  
  public function login(){
    $return = $this->_getCateListById($id, $pid);
    die(json_encode($return));
  }
  public function logining(){
    $postdata = $this->input->post('postdata');
    if(empty($postdata)){
      redirect('/maindex');
    }
    $action = $postdata['action'];
    if($action == 'login'){
      // login

    }else{
      // register
      activation_email($data);
    }
    redirect($url);
  }
  public function register(){
    $this->view($this->_c.'_'.$this->_a);
  }
}
