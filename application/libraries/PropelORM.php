<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PropelORM
{
	private $_propel;
    private $_propel_conf_file;
    private $_propel_models_dir;
    private $_propel_main_script;
	public function __construct()s
	{
        $this->_propel =& get_instance();
 
        $this->_propel_conf_file   = $this->_propel->config->item('propel_conf_file');
        $this->_propel_models_dir  = $this->_propel->config->item('propel_models_dir');
        $this->_propel_main_script = $this->_propel->config->item('propel_main_script');
 
        // see http://www.propelorm.org/documentation/02-buildtime.html setting up propel section
        // Include the main Propel script
        require_once $this->_propel_main_script;
        // Initialize Propel with the runtime configuration
        Propel::init( $this->_propel_conf_file );
 
        // Add the generated 'classes' directory to the include path
        set_include_path($this->_propel_models_dir . PATH_SEPARATOR . get_include_path());
	}

}

/* End of file PropelORM.php */
/* Location: ./application/libraries/PropelORM.php */
