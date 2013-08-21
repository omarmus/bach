<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_m extends BC_Model {

	protected $_table_name = 'SysPermissions';
	protected $_primary_key = 'Name';

	public function create_rols_permission($id_page)
	{
		$roles = SysRolesQuery::create()->find();
		foreach ($roles as $rol) {
			parent::save(array('IdPage' => $id_page, 'IdRol' => $rol->getIdRol()));
		}
	}

	public function get_permissions_page($id_page)
	{
		return SysPermissionsQuery::create()->filterByIdPage($id_page)->find();
	}

	public function set_permission($id_page, $id_rol, $type, $state)
	{
		SysPermissionsQuery::create()->findPks(array($id_page, $id_rol))->update(array($type => $state));
	}
}

/* End of file permission_m.php */
/* Location: ./application/models/permission_m.php */