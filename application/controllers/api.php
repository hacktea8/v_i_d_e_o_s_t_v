<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
   
	/**
	 * Index Page for this controller.
	 *
	 */
  public function __construct(){
    parent::__construct();
    $this->load->model('apimodel');
  }
  public function index(){
   // $this->load->model('testmodel');
    $data=$this->testModel->getdata();
    $this->load->view('welcome_message',array('data'=>$data));
  }
  public function feed($cid=0){
    $data = $this->apimodel->getFeedById($cid);
    $this->load->view('api_feed',array('data'=>$data));
  }
  public function opensearch(){
    $data = $this->apimodel->getFeedById($cid);
    $this->load->view('api_opensearch',array('data'=>$data));
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
