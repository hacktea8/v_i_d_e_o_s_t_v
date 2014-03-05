<?php
class curlModel{
  public $config = array();
  public $postVal = array();
  public $header = array();
  protected $ch = '';
  public $cookie_file = '';

  public function __construct(){
    $this->config = array(
    'cookie' => 'cookie',
    'userAgent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:24.0) Gecko/20100101 Firefox/24.0',
    'ajax' => '',
    'Content-Type' => 'image/jpeg',
//lighttpd server
    'Header' => array('Expect' => ''),
    'header' => 0
    );

  }
  public function getHtml(){
    $this->ch = curl_init();
    $url = $this->config['url'];
    unset($this->config['url']);
    curl_setopt($this->ch, CURLOPT_URL, $url);
    curl_setopt($this->ch,CURLOPT_HEADER,intval($this->config['header']));
    if($this->config['ajax']){
      foreach($this->header as $k => $val){
         $this->config['Header'][$k] = $val;
      }
#      $this->config['Header'] = $this->getHeader();
    }
    curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->config['Header']);
    curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($this->ch, CURLOPT_MAXREDIRS, 1);
//    curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
    if(isset($this->config['referer'])){
       curl_setopt ($this->ch,CURLOPT_REFERER,$this->config['referer']);
    }
   //如果你想把一个头包含在输出中，设置这个选项为一个非零值。
    curl_setopt($this->ch,CURLOPT_RETURNTRANSFER,1); ///设置不输出在浏览器上
    curl_setopt($this->ch,CURLOPT_POST,count($this->postVal));
    /////如果你想PHP去做一个正规的HTTP POST，设置这个选  项为一个非零值。这个POST是普通的 application/x-www-from-urlencoded 类型，多数被HTML表单使用。
    if(count($this->postVal) > 0){
       curl_setopt($this->ch,CURLOPT_POSTFIELDS,$this->postVal);
    }
    ////传递一个作为HTTP "POST"操作的所有数据的字符串。
    $this->cookie_file = ROOTPATH.'/cookie/'.$this->config['cookie'];
    if(!file_exists($this->cookie_file)){
      touch($this->cookie_file);
      @chmod($this->cookie_file,0777);
    }
    if(isset($this->config['proxy']) && $this->config['proxy']){
       curl_setopt($this->ch, CURLOPT_HTTPPROXYTUNNEL, 1);
       curl_setopt($this->ch, CURLOPT_PROXY ,$this->config['proxy']);
       curl_setopt($this->ch, CURLOPT_PROXYTYPE, 7);
    }
    if(isset($this->config['userAgent']) && $this->config['userAgent']){
       curl_setopt($this->ch, CURLOPT_USERAGENT, $this->config['userAgent']);
    }
    if($this->config['isbinar']){
       curl_setopt($this->ch, CURLOPT_BINARYTRANSFER, true);
    }
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:8.8.8.8', 'CLIENT-IP:8.8.8.8'));  //构造IP
    curl_setopt($this->ch, CURLOPT_COOKIEFILE, $this->cookie_file);
    curl_setopt($this->ch, CURLOPT_COOKIEJAR, $this->cookie_file);
    /////把返回来的cookie信息保存在$cookie_jar文件中
    $this->html = curl_exec($this->ch);///执行
    $this->postVal = array();
    $this->config['url'] = $url;
    $this->config['referer'] = $url;
    if(!$this->html){
       echo curl_error($this->ch),"\n";
    }
    if(isset($this->config['debug']) && $this->config['debug']){
      $info = curl_getinfo($this->ch);
      var_dump($info);
    }
    curl_close($this->ch);
    return $this->html;
  }
public function download(){
    $this->ch = curl_init();
    $this->config['saveFile'] = isset($this->config['saveFile']) ? $this->config['saveFile'] :basename($this->config['url']) ;
    $h_file = fopen($this->config['saveFile'], 'wb');
    curl_setopt($this->ch, CURLOPT_HEADER, 0);
    curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($this->ch, CURLOPT_TIMEOUT, 10000);
    curl_setopt($this->ch, CURLOPT_URL, $this->config['url']);
    curl_setopt($this->ch, CURLOPT_FILE, $h_file);
    if(isset($this->config['referer'])){
       curl_setopt ($this->ch,CURLOPT_REFERER,$this->config['referer']);
    }
    if(isset($this->config['proxy']) && $this->config['proxy']){
       curl_setopt($this->ch, CURLOPT_HTTPPROXYTUNNEL, 1);
       curl_setopt($this->ch, CURLOPT_PROXY ,$this->config['proxy']);
       curl_setopt($this->ch, CURLOPT_PROXYTYPE, 7);
    }
    if(isset($this->config['userAgent']) && $this->config['userAgent']){
       curl_setopt($this->ch, CURLOPT_USERAGENT, $this->config['userAgent']);
    }
    //curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false); // 阻止对证书的合法性的检查
    //curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存>在
    if(isset($this->config['offset'])){
       curl_setopt($h_curl, CURLOPT_RESUME_FROM, $this->config['offset']);
    }
    //curl_setopt($h_curl, CURLOPT_RETURNTRANSFER, true);
    $curl_success = curl_exec($this->ch);
    fclose($h_file);
    curl_close($this->ch);
    return $curl_success;
  }
  public function getHeader(){
    $header = array(
"Connection: keep-alive",
"Origin: http://www.tumblr.com",
"X-Requested-With: XMLHttpRequest",
"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36",
"Content-Type: multipart/form-data;",
"Referer: http://www.tumblr.com/new/text",
"Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.6"
    );
    return $header;
  }
  public function __destruct(){
  }

}

?>
