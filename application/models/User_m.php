<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends BC_Model {

	protected $_table_name = 'SysUsers';
	protected $_primary_key = 'idUser';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_rules = array();
	protected $_timestamps = FALSE;
	
}

/* End of file User.php */
/* Location: ./application/models/User.php */