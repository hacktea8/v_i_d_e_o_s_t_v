<?php

/**
 * 云搜索客户端API索引结构。
 *
 * 此类用于管理和检索索引数据的接口，包含以下功能：
 * 1. 获取指定索引状态信息;
 * 2. 针对指定的索引添加或删除文档;
 * 3. 获取指定索引状态;
 * 4. 根据关键词或某些特定的条件查询索引。
 * 
 * @package CloudSearchAPI
 * @version 0.1.0
 * @filesource 
 */
class CloudSearchIndex {
    /**
     * CloudSearchAPI 对象。
     * 
     * @access private
     */
    private $_api = NULL;

    /**
     * 索引名称，在该类被实例化的时候引入。
     * 
     * @access private
     */
    private $_indexName = NULL;

    /**
     * 访问或操作指定索引的URL。
     * 
     * @access private
     */
    private $_indexURL = NULL;

    /**
     * 查询、添加或删除指定索引中文档的URL。
     * 
     * @access private
     */
    private $_docURL = NULL;
     /**
     * 查询top query 的文档URL。
     * 
     * @access private
     */
    private $_topURL = NULL;

    /**
     * 获取指定索引元信息的URL。
     * 
     * @access private
     */
    private $_metaURL = NULL;

    /**
     * 获取指定索引错误信息的URL。
     * 
     * @access private
     */
    private $_errorURL = NULL;

    /**
     * 执行指定索引查询的URL。
     * 
     * @access private
     */
    private $_searchURL = NULL;

    /**
     * 指定索引的元信息。
     * 
     * @access private
     */
    private $_meta = NULL;

    /**
     * facet查询支持的参数列表。
     * 
     * @access public
     * @static
     */
    public static $FACET_PARAMS = array('facet_key', 'facet_range',
                                        'facet_fun', 'facet_filter',
                                        'facet_sampler_threshold',
                                        'facet_sampler_step', 'facet_max_group');
    
    /**
     * 构造函数，由CloudSearchApi对象调用，请点击以下链接来获取CloudSearchApi的
     * getIndex方法详情。
     * 
     * @link CloudSearchApi.html#getIndex
     *
     * @param CloudSearchApi $api 用于管理索引的API对象。
     * 
     * @param string $indexName 索引名称。
     */
    public function __construct(CloudSearchApi $api, $indexName) {
        $this->_api = $api;
        $this->_indexName = $indexName;
        $this->_indexURL = $api->indexURL($this->_indexName);
        $this->_docURL = $api->docURL($this->_indexName);
        $this->_topURL = $api->topURL($this->_indexName);
        $this->_metaURL = $api->statusURL($this->_indexName);
        $this->_errorURL = $api->errorURL($this->_indexName);
        $this->_searchURL = $api->searchURL($this->_indexName);
    }


    /**
     * 获取索引所属的详细信息
     *
     * @return string 返回该指定索引详细信息。
     *
     */
    public function getStatus() {
        $this->_refreshMeta();
        return $this->_meta;
    }


    /**
     * 获取索引所属的索引模板名称。
     *
     * @return string 返回该指定索引所使用的模板类型。
     *
     */
    public function getTemplate() {
        $this->_refreshMeta();
        return $this->_meta['result']['template'];
    }

    /**
     * 获取索引的最后更新时间戳。
     *
     * @return int|null 返回该索引的最后更新时间戳，精确到秒；如果没有获取到更新时间，则
     *     返回为空。
     *
     */
    public function getUpdateTime() {
        $this->_refreshMeta();
        return (int)$this->_meta['result']['doc_last_update_time'];
    }

    /**
     * 获取索引中包含的文档的总数量。
     *
     * @return int 返回文档总数量。
     *
     */
    public function getTotalDocCount() {
        $this->_refreshMeta();
        return (int)$this->_meta['result']['total_doc_num'];
    }

    /**
     * 获取索引上一天的UV值。
     *
     * @return int 返回索引的UV值，为前一天UV的数量。
     *
     */
    public function getUV() {
        $this->_refreshMeta();
        return (int)$this->_meta['result']['uv'];
    }


    /**
     * 获取索引上一天的PV值。
     *
     * @return int 返回索引的PV值，为前一天的PV的数量。
     *
     */
    public function getPV() {
        $this->_refreshMeta();
        return (int)$this->_meta['result']['pv'];
    }

    /**
     * 获取索引的最近错误列表。
     *
     * @param int $page 指定获取第几页的错误信息。
     * @param int $pageSize 指定每页显示的错误条数。
     * 
     * @return array 返回指定页数的错误信息列表。
     *
     * @throws Exception 如果参数不正确，则抛出此异常。
     */
    public function getErrorMessage($page, $pageSize) {
        $this->_checkPageClause($page);
        $this->_checkPageSizeClause($pageSize);

        $params = array('page' => $page,
                        'page_size' => $pageSize);
        return $this->_api->apiCall($this->_errorURL, $params);
    }

    /**
     * 通过文档ID获取文档的详细内容。
     * 
     * @param string $docId 指定文档的唯一编码。
     * 
     * @return array 返回文档内容的数据
     *
     * @throws Exception 如果参数不正确，则抛出此异常。
     */
    public function getDocument($docId) {
        if (NULL == $docId) {
            throw new Exception('$docId is NULL');
        }
        if (!is_string($docId)) {
            throw new Exception('$docId is not a string');
        }

        return $this->_api->apiCall($this->_docURL . '/' . $docId);
    }

    /**
     * 将一篇文档添加到指定索引中。
     * 
     * NOTE: 如果要添加的文档ID在索引中已经存在，则会覆盖掉此索引中的文档数据。
     * @todo 目前文档内容只支持utf-8编码，其他编码持将在后续版本实现
     *
     * 例子:
     * <code>
     * $api = new CloudSearchApi('http://api.css.aliyun.com', 1, 'xxx');
     * $index = $api->getIndex('myindex');
     * $fields = array('title' => 'the title content',
     *                 'body' => 'the body content');
     *
     * try {
     *     $index->addDocument(1, $fields);
     * } catch (Exception $e) {
     *     echo 'Invalid argument ' . $e->getMessage();
     * }
     * </code>
     * 
     * @param string $docId 文档唯一编码，此编码不能重复，如果重复则会替换掉系统中现有
     *     的数据信息。
     * @param array $fields 已Key-value形式表示的文档的字段内容；fields中的字段内容
     *     需要和当前索引模板指定的字段一致。
     *
     *
     * @example examples/adddocument.php 更多例子
     */
    public function addDocument($docId, $fields) {
        $docs[] = $this->makeDocument('add', $docId, $fields, NULL);
        $params = array('action' => 'push', 'items' => json_encode($docs));
        $this->_api->apiCall($this->_docURL, $params, CloudSearchApi::METHOD_POST);
    }

    /**
     * 将一批文档添加到索引中。
     *
     * @todo 目前文档内容只支持utf-8编码，其他编码持将在后续版本实现
     *
     * 例子:
     * <code>
     * $api = new CloudSearchApi('http://css.aliyun.com', '1', 'xxx');
     * $index = $api->getIndex('myindex');
     * $docs = array(
     *     0 => array(
     *         "cmd"=>"add",
     *         'fields' => array(
     *             'id' => 2,
     *             'title' => 'the title content of doc2',
     *             'body' => 'the body content of doc2'
     *         )
     *     ),
     *     1 => array(
     *         "cmd"=>"add",
     *         'fields' => array(
     *             'id' => 3,
     *             'title' => 'the title content of doc3',
     *             'body' => 'the body content of doc3'
     *         )
     *     ),
     * );
     *
     * try {
     *     $index->addDocuments($docs, 'utf-8');
     * } catch (Exception $e) {
     *     exit($e->getMessage());
     * }
     * </code>
     *
     * @param array $documents 多篇文档的文档内容。
     *
     *
     * @example examples/adddocumnet.php 更多例子
     */
    public function addDocuments($documents = array()) {
        foreach ($documents as $i => $docData) {
           
            if (!array_key_exists("fields", $docData)) {
                throw new Exception(
                  'document $docs misses "fields" section.'
                );
            }
          
                if (!array_key_exists("id", $docData["fields"])) {
                throw new Exception(
                  'document $fields misses "id" section.'
                );
           }

     }
        $params = array('action' => 'push', 'items' => json_encode($documents));
        $this->_api->apiCall($this->_docURL, $params, CloudSearchApi::METHOD_POST);
    }

    /**
     * 从索引中通过文档ID删除一篇文档。
     *
     *
     * 例子:
     * <code>
     * $api = new CloudSearchApi('http://api.css.aliyun.com', 1, 'xxx');
     * $index = $api->getIndex('myindex');
     * $docId = 1
     * $index->deleteDocument($docId);
     * </code>
     *
     * @param string $docId 文档唯一编码。
     * 
     * @throws Exception 如果参数不正确，则抛出此异常。
     * 
     * @example examples/deletedocumnet.php 更多例子
     */
    public function deleteDocument($docId) {
        $docs[] = $this->makeDocument('delete', $docId, NULL, NULL);
        $params = array('action' => 'push', 'items' => json_encode($docs));

        $this->_api->apiCall($this->_docURL, $params, CloudSearchApi::METHOD_POST);
    }

    /**
     * 同时删除当前索引下的多条文档。
     *
     * 例子:
     * <code>
     * $api = new CloudSearchApi('http://api.css.aliyun.com', 1, 'xxx');
     * $index = $api->getIndex('myindex');
     * $docIds = array(0 => 1, 1 => 2);
     * $index->deleteDocuments($docIds);
     *
     * @param array $docIds  文档ID列表
     *
     * @throws Exception 如果参数不正确，则抛出此异常。
     *
     * @example examples/deletedocumnet.php 更多例子
     * </code>
     */
    public function deleteDocuments($docIds = array()) {
        if (empty($docIds)) {
            throw new Exception('$docIds is empty.');
        }

        $data = array();
        foreach ($docIds as $i => $docId) {
            $data[] = $this->makeDocument('delete', $docId, NULL, NULL);
        }

        $params = array('action' => 'push', 'items' => json_encode($data));

        $this->_api->apiCall($this->_docURL, $params, CloudSearchApi::METHOD_POST);
    }
    public function topQuery($num=0,$days=0){
        $params = array("num"=>$num,"days"=>$days);
        return $this->_api->apiCall($this->_topURL, $params);
    }
    /**
     * 根据指定的关键词或条件查询索引。
     *
     * 例子:
     * <code>
     * $api = new CloudSearchApi(APIROOT, CLIENT_ID, CLIENT_SECRET);
     * $index = $api->getIndex('test_index');
     * $fields = array('title' => 'the title content',
     *                 'body' => 'the body content');
     * $index->addDocument(1, $fields);
     *
     * try {
     *     $index->search('q=test');
     * } catch (Exception $e) {
     *    echo 'Invalid argument ' . $e->getMessage();
     * }
     * </code>
     * 
     * @param string query 查询子句，支持简单和复杂查询表达式，对于简单的关键词查询: 
     *     q=query_expression, 例如: q=apple
     *     对于语法丰富的查询（布尔或短语查询等）: 
     *     cq=title:iphone AND uname:phpwind AND price=1000...6000
     * @param int $page 返回查询结果的第几页，默认返回第一页。
     * @param int $pageSize 每一页结果条数，默认是10条。
     * @param array $sort 排序子句。
     * @param string $filter 过滤子句。
     * @param array $facet Facet子句。
     * @param array $fetchFields 查询结果中需要返回的字段，多个字段用";"分割。
     * @param string $raw_query 当cq=时候需要通过该参数传递关键词以便于topquery统计搜索频率，q=的时候不需要。
     * @return array 返回查询结果。
     *
     * @throws Exception 如果参数不正确，则抛出此异常。
     *
     * @example examples/search.php 更多例子
     */ 
    public function search($query, $page = NULL, $pageSize = NULL, $sort = NULL,
          $filter = NULL, $facet = NULL, $fetchFields = NULL,$raw_query=NULL) {
        $args = array();
        if (NULL != $page) {
            $this->_checkPageClause($page);
            $args['page'] = $page;
        }

        if (NULL != $pageSize) {
            $this->_checkPageSizeClause($pageSize);
            $args['page_size'] = $pageSize;
        }

        if (NULL != $sort) {
            $args['sort'] = implode(';', $sort);
        }

        if (NULL != $filter){
            $args['filter'] = $filter;
        }
        
        if (NULL != $raw_query){
            $args['raw_query'] = $raw_query;
        }

        if (NULL != $facet) {
            $this->_checkFacetClause($facet);
            $mappedFacet = array_map(
                create_function('$key, $value', 'return $key.":".$value;'),
                array_keys($facet), array_values($facet)
            );

            $args['facet'] = implode(',', $mappedFacet);
        }

        if (NULL != $fetchFields) {
            $args['fetch_fields'] = $fetchFields;
        }

        if (!substr_compare($query, 'q=', 0, 2)) {
            $args['q'] = substr($query, 2);
        } else if (!substr_compare($query, 'cq=', 0, 3)) {
            $args['cq'] = substr($query, 3);
        } else {
            throw new Exception(
              '$query is invalid, missing "q=" or "cq=" clause.'
            ); 
        }
        return $this->_api->apiCall($this->_searchURL, $args);
    }


    /**
     * 组装单篇文档内容。
     *
     * @param string $action 文档处理方式，'add' 表示添加文档，'delete'表示删除文档。
     * @param string $docId 文档ID。
     * @param array $fields key-value形式的字段内容。
     * @param string $charset 文档编码。
     *
     * @throws Exception 如果参数不正确，则抛出此异常。
     */
    public function makeDocument($action, $docId, $fields, $charset) {
        if (NULL == $docId) {
                throw new Exception("$docId can not be NULL");
        }
        if (!is_string($docId)) {
            throw new Exception('$docId is not a string.');
        }

        if (NULL != $fields && !is_array($fields)) {
            throw new Exception('$fields is not an array.');
        }

        $resDoc = array("cmd" => $action);

        if (NULL != $charset) {
            $resDoc['charset'] = $charset;
        }

        if (NULL != $fields){
            $resDoc['fields'] = $fields;
             $resDoc['fields']['id'] = $docId;

        } else {
                $resDoc['fields'] = array('id' => $docId);
           
        }
        return $resDoc;
    }
    
    /**
     * 重新获取索引的元信息。
     *
     * @access private
     */
    private function _refreshMeta() {
        $this->_meta = $this->_api->apiCall($this->_metaURL);
    }

    /**
     * 检查$page参数是否合法。
     * 
     * @param int $page 指定的页码。
     *
     * @throws Exception 如果参数不正确，则抛出此异常。
     *
     * @access private
     */
    private function _checkPageClause($page) {
        if (NULL == $page || !is_int($page)) {
            throw new Exception('$page is not an integer.');
        }
        if ($page < 0) {
            throw new Exception(
                '$page is not greater than or equal to 0.'
            );
        }
    }

    /**
     * 检查$pageSize参数是否合法。
     * 
     * @param int $pageSize 每页显示的记录条数。
     *
     * @throws Exception 参数不合法
     * 
     * @access private
     */
    private function _checkPageSizeClause($pageSize) {
        if (NULL == $pageSize || !is_int($pageSize)) {
            throw new Exception('$pageSize is not an integer.');
        }
        if ($pageSize <= 0) {
            throw new Exception(
                '$pageSize is not greater than 0.'
            );
        }
    }

    /**
     * 检查facet子句是否合法。
     * 
     * @param array $facet
     *
     * @throws Exception 参数不合法
     *
     * @access private
     */    
    private function _checkFacetClause($facet = array()) {
        if (empty($facet)) {
           throw new Exception(
               'Invalid parameter: $facet clause.'
           );
        }
        foreach ($facet as $k => $v) {
            if (!in_array($k, self::$FACET_PARAMS)) {
                throw new Exception(
                    'Invalid parameter: $k in $facet clause.'
                );
            }
        }
    }
}
