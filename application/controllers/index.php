<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'usrbase.php';
class Index extends Usrbase {

	/**
	 * Index Page for this controller.
	 *
	 */
  public function __construct(){
    parent::__construct();
//    $this->load->model('indexmodel');
//var_dump($this->viewData);exit;
  }
  public function index()
  {
    $c = $this->input->get('c');
    if('topic' == $c){
      $aid = $this->input->get('aid');
      $this->topic($aid);return true;
    }
    if('list' == $c){
      $cid = $this->input->get('cid');
      $this->lists($cid);return true;
    }
    $view = BASEPATH.'../';
    if(!is_writeable($view)){
       die($view.' is not write!');
    }
    $view .= 'index.html';
    $lock = $view . '.lock';
    if( !file_exists($view) || (time() - filemtime($view)) > 24*3600 ){
      if(!file_exists($lock)){
        
        $this->assign(array('_a'=>'index','emuleIndex'=>$this->mem->get('emutest-emuleIndexinfo')));
        $this->view('index_index');
        $output = $this->output->get_output();
        file_put_contents($lock, '');
        file_put_contents($view, $output);
        @unlink($lock);
        @chmod($view, 0777);
        echo $output;
        return true;
      }
    }
    exit();
  }
  public function lists($cid,$order = 0,$page = 1){
    $page = intval($page);
    $cid = intval($cid);
    $order = intval($order);
    $page = $page > 0 ? $page: 1;
    if($page < 11){
       $data = array();
       $data['emulelist'] = $this->mem->get('emu-emulelist'.$cid.'-'.$page.$order);
       $data['atotal'] = $this->mem->get('emu-listatotal'.$cid);
       $data['subcatelist'] = $this->mem->get('emu-listsubcatelist'.$cid);
       $data['postion'] = $this->mem->get('emu-listpostion'.$cid);
       if( empty($data['emulelist'])){
//die($this->expirettl['12h'].'empty');
         $data = $this->emulemodel->getArticleListByCid($cid,$order,$page);
         $this->_rewrite_list_url($data['postion']);
         $this->_rewrite_list_url($data['subcatelist']);
         $this->_rewrite_article_url($data['emulelist']);
//echo '<pre>';var_dump($data);exit;
         $this->mem->set('emu-emulelist'.$cid.'-'.$page.$order,$data['emulelist'],$this->expirettl['7d']);
         $this->mem->set('emu-listatotal'.$cid,$data['atotal'],$this->expirettl['7d']);
         $this->mem->set('emu-listsubcatelist'.$cid,$data['subcatelist'],$this->expirettl['7d']);
         $this->mem->set('emu-listpostion'.$cid,$data['postion'],$this->expirettl['7d']);
       }
    }else{
       $data = $this->emulemodel->getArticleListByCid($cid,$order,$page);
    }
    $data['emulelist'] = is_array($data['emulelist']) ? $data['emulelist']: array();
    $cpid = isset($data['postion'][0]['id'])?$data['postion'][0]['id']:0;
    $this->load->library('pagination');
    $config['base_url'] = sprintf('/index/lists/%d/%d/',$cid,$order);
    $config['total_rows'] = $data['atotal'];
    $config['per_page'] = 25; 
    $config['first_link'] = '第一页'; 
    $config['next_link'] = '下一页';
    $config['prev_link'] = '上一页';
    $config['last_link'] = '最后一页';
    $config['cur_tag_open'] = '<span class="current">';
    $config['cur_tag_close'] = '</span>';
    $config['suffix'] = '.html';
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = 5;
    $config['cur_page'] = $page;
    
    $this->pagination->initialize($config); 
    $page_string = $this->pagination->create_links();
// seo setting
    $title = $kw = '';
    foreach($data['postion'] as $row){
       $title .= $title ? '_' : '';
       $title .= $row['name'];
       $kw .= $row['name'].',';
    }
    $keywords = $kw.$this->seo_keywords;
   
    $this->assign(array('seo_title'=>$title,'seo_keywords'=>$keywords,'cpid'=>$cpid,'infolist'=>$data['emulelist'],'postion'=>$data['postion']
    ,'page_string'=>$page_string,'subcatelist'=>$data['subcatelist'],'cid'=>$cid));
    $this->view('index_lists');
  }
  public function topic($aid){
    $aid = intval($aid);
    $data = $this->emulemodel->getEmuleTopicByAid($aid,$this->userInfo['uid'], $this->userInfo['isadmin']);
    $data['info']['ptime']=date('Y:m:d', $data['info']['ptime']);
    $data['info']['utime'] = date('Y/m/d', $data['info']['utime']);
    $this->_rewrite_list_url($data['postion']);
    $this->_rewrite_article_url($data['info']);
    $data['info'] = $data['info'][0];
    $data['info']['relatdata'] = is_array($data['info']['relatdata']) ? $data['info']['relatdata'] : array();
    $data['info']['fav'] = 0;
    $cid = $data['info']['cid'] ? $data['info']['cid'] : 0;
    $cpid = isset($data['postion'][0]['id'])?$data['postion'][0]['id']:0;
// seo setting
    $kw = '';
    foreach($data['postion'] as $row){
       $kw .= $row['name'].',';
    }
    $keywords = $data['info']['name'].','.$kw.$this->seo_keywords;
    $title = $data['info']['name'];
    $data['info']['intro'] = str_replace('www.ed2kers.com',$this->viewData['domain'],$data['info']['intro']);
    // not VIP Admin check verify
    $emu_aid = isset($_COOKIE['hk8_verify_topic_dw'])?strcode($_COOKIE['hk8_verify_topic_dw'],false):'';
    $emu_aid = explode("\t",$emu_aid);
    $emu_aid = $emu_aid[0];
    $verifycode = '';
    if( !($emu_aid == $data['info']['id'] || $this->userInfo['isvip'] || $this->userInfo['isadmin'])){
       $data['info']['downurl'] = '';
       $data['info']['vipdwurl'] = '';
       $this->load->library('verify');
       $verifycode = $this->verify->show();
    }
    
    $this->assign(array('verifycode'=>$verifycode,'seo_title'=>$title,'seo_keywords'=>$keywords,'cid'=>$cid,'cpid'=>$cpid,'info'=>$data['info'],'postion'=>$data['postion'],'aid'=>$aid)); 
    $ip = $this->input->ip_address();
    $key = sprintf('emuhitslog:%s:%d',$ip,$aid);
//var_dump($this->redis->exists($key));exit;
    if(!$this->redis->exists($key)){
       $this->redis->set($key, 1, $this->expirettl['6h']);
    }
    $this->view('index_topic');
  }
  public function tpl(){
    $this->load->view('index_tpl',$this->viewData);
  }
  public function search($q='',$type = 0,$order = 0,$page = 1){
    $q = $q ? $q:$this->input->get('q');
    $q = urldecode($q);
    $page = intval($page);
    $page = $page < 1 ? 1: $page;
    $list = array();
    if($q){
      $param = array('kw' => $q, 'page' => $page, 'page_size' => 20);
      if(1 == $type){
        $param[] = '';
      }elseif(2 == $type){
        $param[] = '';
      }
      $this->load->library('aliyunsearchapi');
      $this->aliyunsearchapi->getsearch($list, $type, $param);
      $hotKeywords = $this->aliyunsearchapi->topQuery($params = array('num'=>8,'days'=>30));
      //var_dump($hotKeywords);exit;
      if('OK' == $hotKeywords['status']){
         $hotKeywords = $hotKeywords['result']['items']['emu_hacktea8'];
      }
    }
    $hot_search = array();
    $recommen_topic = array();
    $recommen_topic[1] = array();
    $recommen_topic[2] = array();
    $hot_topic = array();
    $hot_topic['hit'] = array();
    $hot_topic['focus'] = array();
    $this->load->library('pagination');
    $config['base_url'] = sprintf('/index/search/%s/%d/%d/',urlencode($q),$type,$order);
    $config['total_rows'] = $list['result']['viewtotal'];
    $config['per_page'] = 25;
    $config['first_link'] = '第一页';
    $config['next_link'] = '下一页';
    $config['prev_link'] = '上一页';
    $config['last_link'] = '最后一页';
    $config['cur_tag_open'] = '<span class="current">';
    $config['cur_tag_close'] = '</span>';
    $config['suffix'] = '.html';
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = 5;
    $config['cur_page'] = $page;
    $this->pagination->initialize($config);
    $page_string = $this->pagination->create_links();
    $this->assign(array('searchlist'=>$list['result'],'kw'=>$q,'q'=>$q,'page_string'=>$page_string,'hot_search'=>$hot_search,'recommen_topic'=>$recommen_topic,'hot_topic'=>$hot_topic)); 
    $this->load->view('index_search',$this->viewData);
  }
  public function show404($goto = ''){
    $goto = '/';
    $this->assign(array('goto'=>$goto,'seo_title' =>'找不到您需要的页面..现在为您返回首页..'));
    $this->view('index_show404');
  }
  public function login(){
//var_dump($_SERVER);exit;
    $url = $this->viewData['login_url'].urlencode($_SERVER['HTTP_REFERER']);
//echo $url;exit;
    redirect($url);
  }
  public function loginout(){
    $this->session->unset_userdata('user_logindata');
    setcookie('hk8_auth','',time()-3600,'/');
    $url = $_SERVER['HTTP_REFERER'];
//echo $url;exit;
    redirect($url);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
