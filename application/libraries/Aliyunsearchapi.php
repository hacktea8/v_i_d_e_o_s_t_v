<?php
$currentpath = dirname(__FILE__);
require_once($currentpath.'/CloudSearchApi.php');
require_once($currentpath.'/CloudSearchIndex.php');
require_once($currentpath.'/HelperError.php');
//define('APIROOT','http://css.aliyun.com');
define('APIROOT','http://opensearch.etao.com');
define('CLIENT_ID','6100084360938795');
define('CLIENT_SECRET','2abc67908c9c062d6da13ca10fa8ccef');
define('INDEXNAME','emu_hacktea8');

class Aliyunsearchapi{
  public $api;
  protected $msg;

  public function __construct(){
    if($this->api){
      return false;
    }
    $this->api=new CloudSearchApi(APIROOT, CLIENT_ID, CLIENT_SECRET);
  }

  public function createindex($indexName,$tpl){
    if (!$this->api->exists($indexName)){
      $this->api->createIndex($indexName, $tpl); //指定模版为news
    }
    if (!$this->api->exists($indexName)){
      $this->msg='create index failed!';
      return false;
    }
    return true;
  }
  public function deleteindex($indexName){
    $this->api->deleteIndex($indexName);
    return true;
  }
/*
                   "id":"1",
                   "title":"阿里云隆重推出开放搜索",
                   "body":"广大中小企业都有各种结构化的数据需要进行检索，
                   目前一般采用数据库本身提供的搜索功能或者利用open source的搜索软件搭建。",
                   "display_text":"open search",
                   "author":"阿里云",
                   "update_timestamp":"1345448016",
                   "type_id":"1",
                   "url":"http://www.aliyun.com",
                   "cat_id":[1, 2],
                   "grade":"10",
                   "source":"阿里云云搜索",
                   "comment_count":"1234",
                   "tag":{"搜索":10,"阿里云":2,"云搜索":5,"开放搜索":8},
                   "create_timestamp":"1345448016",
                   "focus_count":"8888",
                   "boost":"1",
                   "integer_1":"100",
                   "hit_num":"88888"
*/
  public function adddocument(&$itemsArr){
    $_itemsArr=array();
    foreach($itemsArr as $val){
      array_push($_itemsArr,array("cmd"=>"add","fields" =>$val));
    }
//var_dump($_itemsArr);exit;
    $index = $this->api->getIndex(INDEXNAME);
    $index->addDocuments($_itemsArr);
    return "添加成功，系统需要几分钟来处理数据，请耐心等待！";
  }
  public function topQuery($params = array('num'=>8,'days'=>30)){
    return $this->api->topQuery(INDEXNAME,$params);
  }
  public function deletedocument($indexName,$docId){
    $index = $this->api->getIndex($indexName);
    $index->deleteDocument($docId);
    return true;
  }
  public function getdocnum(){
    $index = $api->getIndex(INDEXNAME);
    return $index->getTotalDocCount();
  }
  public function geterrlog(){
    $index = $this->api->getIndex(INDEXNAME);
    return  $rs = $index->getErrorMessage(1, 20);
    $list = $rs["result"];

    return $rs["result"]["items"];
  }
  public function getlistindexs(){
    return $rs = $this->api->listIndexes();
  }
  public function getsearch(&$result, $type = '', $param = array()){
    $index = $this->api->getIndex(INDEXNAME);
    switch($type){
/*
$query,$indexArr=array(),$page = NULL, $pageSize = NULL, $sort = NULL,
        $filter = NULL, $fetchFields = NULL,$raw_query=NULL
*/
       case 1:$result=$index->search(
                     'cq='.$param['kw'],
                     $param['page'],
                     $param['page_size'],
                     $param['sort'],
                     $param['filter'],
                     $param['facet_key'],
                     $param['facet_fun'],
                     $param['fetch_fields']);
       break;
//多索引合并搜索
       case 2:$result=$this->api->search('q='.$param['kw'],$param['indexArr'],
              '2',10,null,"","");
       break;
       default:
       $kw = sprintf("cq=%s",$param['kw'], $param['kw']);
       $result=$index->search($kw,$param['page'],$param['page_size']);
       
    }
    return true;
  }
  public function printmsg(){
    return $this->msg;
  }
}

?>
