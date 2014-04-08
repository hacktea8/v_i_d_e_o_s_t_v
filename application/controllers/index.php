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
//        file_put_contents($view, $output);
        @unlink($lock);
//        @chmod($view, 0777);
//        echo $output;
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
  public function content($vid){
    $vid = intval($vid);
    $info = $this->tvmodel->getVideoInfoByVid($vid,$mod = 'content');
    $this->assign(array('info'=>$info
    ,'hotlist'=>$hot_rank
    ));
    $ip = $this->input->ip_address();
    $key = sprintf('videohitslog:%s:%d',$ip,$vid);
//var_dump($this->redis->exists($key));exit;
    if(!$this->redis->exists($key)){
       $this->redis->set($key, 1, $this->expirettl['6h']);
    }
    $this->view('index_content');
  }
  public function channel($cid,$order=0,$page=1, $type = ''){
    $cid = intval($cid);
    $order = intval($order);
    $page = intval($page);
    $type = in_array($type, array('','_tv','_movie')) ? $type : '';
    $key = 'month_rank'.$cid;
    $month_rank = $this->mem->get($key);
    if( !$month_rank){
      $month_rank = $this->tvmodel->getVideoListByCid($cid,$order,1,15);
      $this->mem->set($key,$month_rank,$this->expirettl['1d']);
    }
    $key = 'recommend_cid'.$cid;
    $recommend_rank = $this->mem->get($key);
    if( !$recommend_rank){
      $recommend_rank = $this->tvmodel->getVideoListByCid($cid,$order,1,15);
      $this->mem->set($key,$recommend_rank,$this->expirettl['1d']);
    }
    $arealist = $this->tvmodel->getVideoAreaList();
    $channelList = $this->tvmodel->getVideoListByCid($cid,$order,$page,15);
    $this->assign(array('_a'=>'channel'.$type,'arealist'=>$arealist,'channelList'=>$channelList
    ,'month_rank'=>$month_rank,'recommend_rank'=>$recommend_rank
    ));
    $this->view('index_channel'.$type);
  }
  public function detail($vid,$sid){
    $vid = intval($vid);
    $sid = intval($sid);
    $info = $this->tvmodel->getVideoInfoByVid($vid,$sid);
    $this->assign(array('info'=>$info
    ,'hotlist'=>$hot_rank,'_a'=>'content'
    ));
    $this->view('index_detail');
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
    $this->logout();
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
