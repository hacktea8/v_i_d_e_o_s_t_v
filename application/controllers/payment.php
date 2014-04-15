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
   $auth = false;
   if('POST' === $_SERVER['REQUEST_METHOD'] ){
     $_POST['cmd'] = '_notify-validate';
     //返回信息校验
     $context['http'] = array(  
      'method' => 'post',
      'timeout' => 120,
      'content' => http_build_query($_POST, '', '&'),  
     );
     $ct = stream_context_create($context);
     $url = sprintf('https://www.paypal.com/cgi-bin/webscr');
     $return = file_get_contents($url, false, $ct);
     $auth = $return === 'VERIFIED' ? 1 : 0;
   }
   if($auth && 'Completed' === $_POST['payment_status']){
     //付款完成
     $uinfo = $_POST['custom'];
     $uinfo = explode('_|_',$uinfo);
     //$paymoney = $_POST['mc_gross'];
     $receiver_email_group = array('59iav8@gmail.com');
     $receiver_email = $_POST['receiver_email'];
     if(!in_array($receiver_email, $receiver_email_group)){
       return false;
     }
     $update_data = $this->copy_array($_POST,array('txn_id','receiver_email'));
     //保收款人邮件地址（receiver_email)
     $return = $this->paymodel->update_business_status($update_data);
     if(6 == $return['status']){
       //发送升级VIP的动作
       $flag = add_user_vip_group($update_data);
       if(1 == $flag){
         $update_data = array('order_no'=>0,'status'=>1);
         $this->paymodel->update_business_status($update_data);
       }
     }
   }
  }
  private function copy_array($data,$field){
     $return = array();
     foreach($field as $k => $v){
       if(isset($data[$k])){
         $return[$k] = $v;
       }
     }
     return $return;
  }
  private function add_user_vip_group($post_data){
    $key = '';
    
  }
}
