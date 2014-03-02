<?php

require_once(dirname(__FILE__) . '/CloudSearchIndex.php');

/**
 * 云搜索客户端SDK。
 *
 * 用于管理索引和获取指定索引的操作接口。
 * 管理索引：
 * 1. 列出所有索引
 * 2. 创建索引
 * 3. 删除索引
 * 4. 更改索引名称
 *
 * @package CloudSearchAPI
 * @version 0.1.0
 * @filesource 
 */
class CloudSearchApi {
    /**
     * @var string 定义API版本。
     */

    const API_VERSION = 'v1';

    /**
     * API接入点（Endpoint）URL。
     * 
     * @access private
     */
    private $_apiURL = NULL;

    /**
     * 用户唯一编号（client_id）。
     * 
     * 此编号为创建用户时自动创建，请访问以下链接来查看您的用户编号：
     *  
     * @link http://css.aliyun.com/manager/config/
     *  
     * @access private
     */
    private $_clientId = NULL;

    /**
     * 客户的密钥。
     * 
     * 此密钥为创建用户时自动创建，您可以访问以下链接来查看或重置您的密钥：
     * 
     * @link http://css.aliyun.com/manager/config/
     * 
     * @access private
     */
    private $_clientSecret = NULL;

    /**
     * 请求方法定义 GET
     * 
     * @access const
     */

    const METHOD_GET = "GET";
    /**
     * 请求方法定义 POST
     * 
     * @access const
     */
    const METHOD_POST = "POST";

    /**
     * 构造函数。
     * 
     * NOTE: 用户唯一编号和用户密钥在创建用户时自动创建，请访问一下链接来获取您的用户编号
     * 和用户密钥，用户密钥可以在网站中重置，如果您在网站中重置了密钥，请务必确认传递给此
     * 参数的密钥为最新的密钥。
     * 
     * @link http://css.aliyun.com/manager/config/
     * 
     * @param string $apiURL API 接入点URL，非空字符串。
     * @param string $clientId 客户唯一ID，注册用户时获得。
     * @param string $clientSecret 客户的密钥，用于验证客户的操作合法性。
     * 
     * @throws Exception 参数不合法
     */
    function __construct($apiURL, $clientId, $clientSecret) {
        date_default_timezone_set("Asia/Shanghai");

        $tmpURL = trim($apiURL);
        if ($this->isEmpty($tmpURL)) {
            throw new Exception('$apiURL is empty.');
        }

        if (NULL == $clientId) {
            throw new Exception('$clientId is empty.');
        }

        $tmpSecret = trim($clientSecret);
        if ($this->isEmpty($tmpSecret)) {
            throw new Exception('$clientSecret is empty.');
        }

        $this->_apiURL = rtrim(rtrim($tmpURL, "/"), "/".self::API_VERSION."/api");
        $this->_clientId = $clientId;
        $this->_clientSecret = $tmpSecret;
    }

    /**
     * 获取指定索引的CloudSearchIndex对象。
     * 
     * 该对象可以向索引中添加、删除文档和查询索引，请访问以下链接来访问该对象的方法和属性：
     * 
     * @link CloudSearchIndex.html#__construct
     * 
     * @param string $indexName 索引名称, 为非空字符串，必须是已经创建成功的索引。
     * 
     * @return CloudSearchIndex 返回CloudSearchIndex对象。
     *
     * @throws Exception 如果参数不合法，则抛出此异常。
     */
    public function getIndex($indexName) {
        $tmpIndexName = trim($indexName);
        if ($this->isEmpty($tmpIndexName)) {
            throw new Exception('$indexName is empty.');
        }
        return new CloudSearchIndex($this, $tmpIndexName);
    }

    /**
     * 列出用户的所有索引。
     *
     * @return array 返回所有索引列表。
     *
     */
    public function listIndexes($page=0,$page_size=10) {
        $params = array(
            'page' => $page,
            'page_size'  => $page_size,
        );
        return $this->apiCall($this->indexRootURL(),$params);
    }

    /**
     * 根据指定的索引名称和模板来创建一个索引。
     *
     * @param string $indexName 索引名称，必须是非空英文字符。
     * @param string $template 索引模板名称，目前支持社区、应用、小说和资讯四个模板，
     *     对应名称为："bbs", "download", "novel", "news"。
     *
     * @throws Exception 如果参数错误，则抛出此异常。
     */
    public function createIndex($indexName, $template,$packageId=1) {
        $tmpIndexName = trim($indexName);
        $this->checkIndexName($tmpIndexName);
        $tmpTemplate = trim($template);
        if ($this->isEmpty($tmpTemplate)) {
            throw new Exception('$template is null.');
        }

        $params = array('action' => 'create',
            'template' => $tmpTemplate,
            'package_id'=>$packageId,
            );
        return $this->apiCall($this->indexURL($tmpIndexName), $params, self::METHOD_POST);
    }

    /**
     * 根据索引名称删除指定索引。
     *
     * 
     * @param string $indexName 需要删除的索引名称。
     *
     * @throws Exception 如果参数错误，则抛出此异常。
     */
    public function deleteIndex($indexName) {
        $tmpIndexName = trim($indexName);
        if ($this->isEmpty($tmpIndexName)) {
            throw new Exception('$indexName is null.');
        }

        $params = array('action' => 'delete');
        return $this->apiCall($this->indexURL($tmpIndexName), $params, self::METHOD_POST);
    }

    /**
     * 更新索引名称。
     *
     * @param string $indexName 需要更新的索引名称。
     * @param string $newIndexName 新的索引名称。
     *
     * @throws Exception 如果参数错误，则抛出此异常。
     */
    public function renameIndex($indexName, $newIndexName) {
        $tmpIndexName = trim($indexName);
        if ($this->isEmpty($tmpIndexName)) {
            throw new Exception('$indexName is null.');
        }
        $tmpNewIndexName = trim($newIndexName);
        if ($this->isEmpty($tmpNewIndexName)) {
            throw new Exception('$newIndexName is null.');
        }

        if (!strcasecmp($tmpIndexName, $tmpNewIndexName)) {
            throw new Exception('$indexName is equal to $newIndexName.');
        }

        $params = array('action' => 'update',
            'new_index_name' => $tmpNewIndexName);
        return $this->apiCall($this->indexURL($tmpIndexName), $params, self::METHOD_POST);
    }

    /**
     * 检测指定索引是否存在。
     *
     * @param string $indexName 指定的索引名称。
     * @return boolean 如果索引存在则返回true，否则返回false。
     *
     * @throws Exception 如果参数错误，测抛出此异常。
     */
    public function exists($indexName) {
        $tmpIndexName = trim($indexName);
        if ($this->isEmpty($tmpIndexName)) {
            throw new Exception('$indexName is null.');
        }
        $params = array('action'=>'status');
        try {
            $result = $this->apiCall($this->indexURL($tmpIndexName), $params);
            return true;
        } catch (Exception $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }
     /**
     * 检测指定索引是否存在,如果存在返回status状态。
     *
     * @param string $indexName 指定的索引名称。
     * @return string 返回结果
     * @throws Exception 如果参数错误，测抛出异常。
     */
    public function status($indexName) { 
        $params = array('action'=>'status');
        $result = $this->apiCall($this->indexURL($indexName), $params);
        return $result;
    }
    /**
     * 获取访问索引的根URL。
     * 
     * @return string 返回URL.
     * 
     */
    public function indexRootURL() {
        return $this->_apiURL . '/' . self::API_VERSION . '/api/index';
    }

    /**
     * 获取指定索引的根URL。
     *
     * @param string $indexName 索引名称
     * 
     * @return string 返回根URL。
     * 
     */
    public function indexURL($indexName) {
        return $this->_apiURL . '/' . self::API_VERSION . '/api/index/' . $indexName;
    }

    /**
     * 获取指定索引的doc访问URL。
     *
     * @param string $indexName 索引名称。
     * 
     * @return string 返回访问doc的URL。
     * 
     */
    public function docURL($indexName) {
        return $this->_apiURL . '/' . self::API_VERSION . '/api/index/doc/' . $indexName;
    }
    
     /**
     * 获取指定索引的top query访问URL。
     *
     * @param string $indexName 索引名称。
     * 
     * @return string 返回访问doc的URL。
     * 
     */
    public function topURL($indexName) {
        return $this->_apiURL . '/' . self::API_VERSION . '/api/top/query/' . $indexName;
    }

    public function topQuery($indexName,$params = array('num'=>8,'days'=>30)){
        $url = $this->topURL($indexName);
        return $this->apiCall($url, $params);
    }
    
    /**
     * 获取指定索引的状态访问URL。
     *
     * @param string $indexName 索引名称
     * 
     * @return string 返回获取索引状态的URL。
     * 
     */
    public function statusURL($indexName) {
        return $this->_apiURL . '/' . self::API_VERSION . '/api/index/status/' . $indexName;
    }

    /**
     * 获取指定索引的错误访问URL。
     *
     * @param string $indexName 索引名称。
     * 
     * @return string 返回获取错误信息的URL。
     * 
     */
    public function errorURL($indexName) {
        return $this->_apiURL . '/' . self::API_VERSION . '/api/index/error/' . $indexName;
    }

    /**
     * 获取指定索引的搜索URL。
     *
     * @param string $indexName 索引名称。
     * 
     * @return string 返回指定索引检索的URL。
     */
    public function searchURL($indexName) {
        return $this->_apiURL . '/' . self::API_VERSION . '/api/search/' . $indexName;
    }

    /**
     * 获取API的根URL。
     *
     * @param string $indexName 索引名称
     * 
     * @return string 返回api的根URL。
     */
    public function rootURL() {
        return $this->_apiURL . '/' . self::API_VERSION . '/api';
    }

    /**
     * 获取API URL。
     *
     * @return string 返回API URL。
     * 
     */
    public function apiURL() {
        return $this->_apiURL;
    }

    /**
     * 检测字符串是否为空。
     *
     * @param string $str 字符串。
     * @return boolean 空字符串返回true，否则返回false。
     */
    private function isEmpty($str) {
        if (NULL == $str || '' == $str) {
            return true;
        }
        return false;
    }

    /**
     * 检查索引名称是否合法。
     *
     * @param string $indexName 索引名称。
     * @throws Exception 如果非法索引名称，则抛出此异常。
     */
    private function checkIndexName($indexName) {
        if ($this->isEmpty($indexName)) {
            throw new Exception('$indexName is null.');
        }
        if (strstr($indexName, '/')) {
            throw new Exception('$indexName include "/".');
        }
    }

    /**
     * 根据参数创建签名信息。
     * 
     * @param array 参数数组。
     * @return string 签名字符串。
     *
     * @access private
     */
    private function _makeSign($params) {
        $q = "";
        if (NULL != $params) {
            ksort($params);
            $q = http_build_query($params);
        }
        return md5($q . $this->_clientSecret);
    }

    /**
     * 创建Nonce信息。
     *
     * @return string 返回Nonce信息。
     * 
     * @access private
     */
    private function _makeNonce() {
        $time = time();
        $nonce = md5($this->_clientId . $this->_clientSecret . $time) . "." . $time;
        return $nonce;
    }

    /**
     * 将参数数组转换成http query字符串
     * 
     * @param array $params 参数数组
     * @return string query 字符串
     *
     */
    public function buildParams($params) {
        $args = http_build_query($params);
        // remove the php special encoding of parameters
        // see http://www.php.net/manual/en/function.http-build-query.php#78603
        return preg_replace('/%5B(?:[0-9]|[1-9][0-9]+)%5D=/', '=', $args);
    }

    /**
     * 调用Web API。
     *
     * @param string $method HTTP请求类型，self::METHOD_GET 或 self::METHOD_POST。
     * @param string $url WEB API的请求URL。
     * @param array $params 参数数组。
     * @param array $httpOptions http option参数数组。
     * @param bool $curl false  默认采用socket方式请求，请根据您的空间或服务器类型进行选择 。
     * @return array 返回decode后的HTTP response。
     */
    public function apiCall($url, $params = array(), $method = self::METHOD_POST, $httpOptions = array(), $curl = true, $raw_response = false) {
        $params['nonce'] = $this->_makeNonce();
        $params['client_id'] = $this->_clientId;
        $params['sign'] = $this->_makeSign($params);
        if ($curl)
            $data = $this->request_by_curl($method, $url, $params, $httpOptions);
        else
            $data = $this->request_by_socket($method, $url, $params, $httpOptions);

        if ($raw_response)
        {
            return $data;
        }

        $rawResponse = $data['rawResponse'];
        $httpCode = $data['httpCode'];

        if (floor($httpCode / 100) == 2) {
            $statusCode = 0;
            $response = json_decode($rawResponse, true);
            if (NULL == $response) {
                throw new Exception("errors:".$rawResponse);
            }
            if (array_key_exists('errors', $response)) {
                if (array_key_exists('code', $response['errors'][0])) {
                    $statusCode = (int) $response['errors'][0]['code'];
                    $this->responseToException($statusCode, $response);
                } else {
                    throw new Exception('Missing status code in response');
                }
            } else { // ok
                return $response;
            }
        } else {
            throw new Exception($rawResponse, $httpCode);
        }
    }

    /**
     * Curl版本   
     * 使用方法：   
     * $post_string = "app=request&version=beta";   
     * request_by_curl('http://facebook.cn/restServer.php',$post_string);   
     */
    private function request_by_curl($method, $url, $params = array(), $httpOptions = array()) {
        $args = $this->buildParams($params);
        if ($method == self::METHOD_GET) {
            $url .= '?' . $args;
            $args = '';
        }
        $session = curl_init($url);
        curl_setopt_array($session, array(
            // Specify HTTP method
            CURLOPT_CUSTOMREQUEST => $method,
            // The body of the POST
            CURLOPT_POSTFIELDS => $args,
            // Not to return headers
            CURLOPT_HEADER => false,
            // Return the response
            CURLOPT_RETURNTRANSFER => true,
            //Fixes the HTTP/1.1 417 Expectation Failed
            CURLOPT_HTTPHEADER => array('Expect:')
        ));

        foreach ($httpOptions as $opt => $value) {
            curl_setopt($session, $opt, $value);
        }
        $rawResponse = curl_exec($session);
        $httpCode = curl_getinfo($session, CURLINFO_HTTP_CODE);
        curl_close($session);
        return array('httpCode' => $httpCode, 'rawResponse' => $rawResponse);
    }

    /**
     * Socket版本 
     * 使用方法： 
     * $post_string = "app=socket&version=beta"; 
     * request_by_socket('facebook.cn','/restServer.php',$post_string); 
     */
    private function request_by_socket($method, $url, $params = array(), $httpOptions = array()) {
        $u = parse_url($url);
        $remote_server = $u["host"];
        $remote_path = $u["path"];
        $method = strtoupper($method);
        //$remote_server, $remote_path, $post_string, $port = 80, $timeout = 30
        $parse = self::parseHost($url);
        $data          = http_build_query($params);
        $content = self::buildRequestContent($parse, $method, $data);
        $socket = fsockopen($remote_server, $port=80, $errno, $errstr, $timeout=30);
        if (!$socket) {
            throw new Exception("connect socket fail");
        }
        
        fwrite($socket, $content);
        

        $responseText = '';
 
        //read from socket
        while ($data = fread($socket, 1024)) 
        {
			$responseText .= $data;
		}

        //close socket
		fclose($socket);
	    $ret = self::parseResponse($responseText);	

		
        return array('httpCode' => (int)$ret["info"]["http_code"], 'rawResponse' => $ret["result"]);
    }

    private static function parseHost($host) {
        //parse host url
        $parse = parse_url($host);

        if (!$parse) {
            throw new Exception("host is empty");
        }

        if (!isset($parse['port']) || !$parse['port']) {
            $parse['port'] = '80';
        }

        $parse['host'] = str_replace(array('http://', 'https://'), array('', 'ssl://'), $parse['scheme'] . "://") . $parse['host'];
        $parse["path"] = isset($parse["path"]) ? $parse["path"] : '/';
        $query = isset($parse['query']) ? $parse['query'] : '';

        $path = str_replace(array('\\', '//'), '/', $parse['path']);
        $parse['path'] = $query ? $path . "?" . $query : $path;

        return $parse;
    }

    private static function buildRequestContent(&$parse, $method, $data) {
        $contentLengthStr = '';
        $postContent = '';

        if ($method == self::METHOD_GET) {
            substr($data, 0, 1) == '&' && $data = substr($data, 1);
            $query = isset($parse['query']) ? $parse['query'] : '';
            $parse['path'] .= ($query ? '&' : '?') . $data; 
        } else if ($method == self::METHOD_POST) {
            $contentLengthStr = "Content-length: " . strlen($data) . "\r\n";
            $postContent = $data;
        }

        $write = $method . " " . $parse['path'] . " HTTP/1.0\r\n";
        $write .= "Host: " . $parse['host'] . "\r\n";
        //$write .= "Content-Type:text/html;charset=UTF8'";
        $write .= "Content-type: application/x-www-form-urlencoded\r\n";
        $write .= $contentLengthStr;
        //$write .= "Connection: Keep-Alive\r\n";
        $write .= "Connection: close\r\n\r\n";
        $write .= $postContent;

        return $write;
    }
     private static function parseResponse($responseText)
    {
        $http_header_str  = substr($responseText, 0, strpos($responseText, "\r\n\r\n"));
        $http_headers = self::parseHttpSocketHeader($http_header_str);
		$responseText = trim(stristr($responseText, "\r\n\r\n"), "\r\n");
        $ret = array();
        $ret["result"] = $responseText;
        $ret["info"]["http_code"]   = isset($http_headers["Http_Code"]) ? $http_headers["Http_Code"] : 0;
        $ret["info"]["headers"]  = $http_headers;
        $ret["result"] = $responseText;

        return $ret;
    }
    
    private static function parseHttpSocketHeader($str)
    {
        $slice = explode("\r\n", $str);
        $headers = array();

        foreach ($slice as $v)
        {
            if (false !== strpos($v, "HTTP"))
            {
                $headers["Http_Code"] = self::parseHttpCodeFromSocketHeader($v);
                $headers["Status"] = $v;
            }
            else
            {
                $header_slice = explode(":", $v);
                $headers[$header_slice[0]] = isset($header_slice[1]) ? $header_slice[1] : '';
            }
        }

        return $headers;
    }

    private static function parseHttpCodeFromSocketHeader($str)
    {
        $slice = explode(" ", $str);
        return $slice[1];
    }
    /**
     * 将response返回的错误信息转换成Exception。
     *
     * @param int $errorCode 错误编码。
     * @param array $response API返回的代码。
     */
    public function responseToException($errorCode, $response) {
        $errorMsg = 'unknown error';
        if (array_key_exists('message', $response['errors'][0])) {
            $errorMsg = $response['errors'][0]['message'];
        }
        throw new Exception(json_encode($response), $errorCode);
    }
    /**
     * 多索引合并查询
     * @param type $query    'q=简单'   或者  'cq=title:标题'
     * @param type $indexArr   array("bbs_my","novel")  多个索引
     * @param type $page    1
     * @param type $pageSize   10  
     * @param type $sort   array("-create_timestamp")  只对前面一个索引生效
     * @param type $filter  "cat_id=5 AND hit_num>8000"   哪个模版有，则对哪个模版生效
     * @param type $fetchFields    'title'  'body' 想要单独返回的字段
     * @param string $raw_query 当cq=时候需要通过该参数传递关键词以便于topquery统计搜索频率，q=的时候不需要。
     * @return array  
     */
     public function search($query,$indexArr=array(),$page = NULL, $pageSize = NULL, $sort = NULL,
        $filter = NULL, $fetchFields = NULL,$raw_query=NULL) {
         $args = array();
        if (NULL != $page) {

            $args['page'] = $page;
        }

        if (NULL != $pageSize) {

            $args['page_size'] = $pageSize;
        }

        if (NULL != $sort) {
            $args['sort'] = implode(';', $sort);
        }

        if (NULL != $filter){
            $args['filter'] = $filter;
        }

        if (NULL != $fetchFields) {
            $args['fetch_fields'] = $fetchFields;
        }
        if (NULL != $raw_query){
            $args['raw_query'] = $raw_query;
        }
        
        if (!substr_compare($query, 'q=', 0, 2)) {
            $args['q'] = substr($query, 2);
        } else if (!substr_compare($query, 'cq=', 0, 3)) {
            $args['cq'] = substr($query, 3);
        }
        $indexList = implode(',',$indexArr);
        return $this->apiCall($this->searchURL($indexList), $args);
    }

}
