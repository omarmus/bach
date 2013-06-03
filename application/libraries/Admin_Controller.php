<?php 

/**
 * 
 */
class Admin_Controller extends BC_Controller
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->data['meta_title'] = 'Bach PHP';
 	}
}