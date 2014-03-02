<?php
defined('BASEPATH') || exit('Forbidden');
/*
*
*
*/
class Memcache{
  private $_memcached;	// Holds the memcached object

  protected $_memcache_conf = array(
			      'default' => array(
			      'hostname'=> '127.0.0.1',
			      'port'=> 3721,
			      'weight'=> 1
	  	                                )
				    );

// --------------------------------------------------------
  public function __construct($config = array()){
     $this->_memcached = new Memcached();
     foreach($this->_memcache_conf as $cache_server){
     $this->_memcached->addServer(
                     $cache_server['hostname'], $cache_server['port'], $cache_server['weight']);
//echo '<pre>';var_dump($this->_memcached);exit;
     }

  }
// ------------------------------------------------------------
  /**
   * Fetch from cache
   *
   * @param 	mixed		unique key id
   * @return 	mixed		data on success/false on failure
   */	
  public function get($id){	
     $data = $this->_memcached->get($id);
		
	return (is_array($data)) ? $data[0] : FALSE;
  }

// --------------------------------------------------------------------

  /**
   * Save
   *
   * @param 	string		unique identifier
   * @param 	mixed		data being cached
   * @param 	int			time to live
   * @return 	boolean 	true on success, false on failure
   */
   public function save($id, $data, $ttl = 60){
      if (get_class($this->_memcached) == 'Memcached')
      {
        return $this->_memcached->set($id, array($data, time(), $ttl), $ttl);
      }
      else if (get_class($this->_memcached) == 'Memcache')
      {
	return $this->_memcached->set($id, array($data, time(), $ttl), 0, $ttl);
      }
		
      return FALSE;
    }
   public function set($id, $data, $ttl = 60){
     $this->save($id, $data, $ttl);
   }
// --------------------------------------------------------------------
	
  /**
   * Delete from Cache
   *
   * @param 	mixed		key to be deleted.
   * @return 	boolean 	true on success, false on failure
   */
  public function delete($id){
    return $this->_memcached->delete($id);
  }

// -----------------------------------------------------------------
	
  /**
   * Clean the Cache
   *
   * @return 	boolean		false on failure/true on success
   */
  public function clean(){
     return $this->_memcached->flush();
  }

// -------------------------------------------------------------

  /**
   * Cache Info
   *
   * @param 	null		type not supported in memcached
   * @return 	mixed 		array on success, false on failure
   */
  public function cache_info($type = NULL){
     return $this->_memcached->getStats();
  }

  // -----------------------------------------------------------------
	
  /**
   * Get Cache Metadata
   *
   * @param 	mixed		key to get cache metadata on
   * @return 	mixed		FALSE on failure, array on success.
   */
  public function get_metadata($id){
     $stored = $this->_memcached->get($id);

     if (count($stored) !== 3){
	return FALSE;
     }

     list($data, $time, $ttl) = $stored;

     return array(
		'expire'=> $time + $ttl,
		'mtime'	=> $time,
		'data'	=> $data
		 );
  }


}
