<?php 

/**
* Class Model implements Propel ORM
*/

class BC_Model extends CI_Model {
	
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_rules = array();
	protected $_timestamps = FALSE;
	
	function __construct() {
		parent::__construct();
	}
	
	public function get($pk = NULL) 
	{
		if ($pk != NULL) {
			$filter = $this->_primary_filter;
			$pk = $filter($pk);
			$method = 'findPk';
		} else {
			$method = 'find';
		}

		// if (!count($this->db->ar_orderby)) {
		// 	$this->db->order_by($this->_order_by);
		// }

		$table = $this->_table_name.'Query';
		return $table::create()->$method($pk);
	}
	
	public function get_by($where, $single = FALSE) 
	{
		$table = $this->_table_name.'Query';
		$query = $this->where($table::create(), $where);
		$method = $single === TRUE?'findOne':'find';
		return $query->$method();
	}
	
	public function save($data, $pk = NULL) 
	{
		// Set timestamps
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$pk || $data['created'] = $now;
			$data['modified'] = $now;
		}

		if ($pk === NULL) { // Insert
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$table = $this->_table_name;
			$obj = new $table();
		} else { // Update
			$filter = $this->_primary_filter;
			$pk = $filter($pk);
			$table = $this->_table_name.'Query';
			$obj = $table::create()->findPk($pk);
		}

		$obj->fromArray($data);
		if ($obj->save()) {
            return $obj->getPrimaryKey();
        }
		return null;
	}
	
	public function delete($pk) 
	{
		$filter = $this->_primary_filter;
		$pk = $filter($pk);
		
		if (!$pk) {
			return FALSE;
		}
		$table = $this->_table_name.'Query';
		$table::create()->findPk($pk)->delete();
	}

	protected function where($obj, $key, $value = NULL)
	{
		if ( ! is_array($key)) {
			$key = array($key => $value);
		}
		foreach ($key as $k => $v) {
			$filter = "filterBy{$k}";
			$obj->$filter($v);
		}

		return $obj;
	}

}