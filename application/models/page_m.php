<?php
class Page_m extends BC_Model {
	
	protected $_table_name = 'SysPages';
	protected $_primary_key = 'IdPage';

	public $rules = array(
		'IdModule' => array(
			'field' => 'IdModule',
			'label' => 'Parent',
			'rules' => 'trim|intval'
		),
		'Title' => array(
			'field' => 'Title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'Slug' => array(
			'field' => 'Slug',
			'label' => 'URI',
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		)
	);

	public function save($data, $pk = NULL)
	{
		!is_null($pk) || $data['Order'] = SysPagesQuery::create()->count()+1;
		parent::save($data, $pk);
	}

	public function get_new()
	{
		return array(
			'Title' => '',
			'Slug' => '',
			'IdModule' => 0
		);
	}

	public function delete($pk)
	{
		// Delete a page
		parent::delete($pk);

		// Reset modules ID for its children
		SysPagesQuery::create()->filterByIdModule($pk)->update(array('IdModule' => 0, 'IdSection' => 0));
	}

	public function save_order($pages)
	{
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					$data = array('IdModule' => (int)$page['parent_id'], 'Order' => $order);
					SysPagesQuery::create()->filterByIdPage($page['item_id'])->update($data);
				}
			}
		}
	}

	public function get_nested ()
	{
		$pages = SysPagesQuery::create()->orderByOrder()->find()->toArray();
		
		$array = array();
		foreach ($pages as $page) {
			if (!$page['IdModule'] && !$page['IdSection']) {
				$page['Type'] = 'module';
				$array[$page['IdPage']] = $page;
			} else {
				if (!$page['IdSection']) {
					$page['Type'] = 'section';
					$array[$page['IdModule']]['children'][$page['IdPage']] = $page;
				} else {
					$page['Type'] = 'subsection';
					$array[$page['IdModule']]['children'][$page['IdSection']]['children'][$page['IdPage']] = $page;
				}
			}
		}

		return $array;
	}

	public function get_with_parent ()
	{
		// Propel no soporta el join de una tabla con sigo misma a menos que se lo defina como un árbol binario
		// si es que no existe una relación entre si misma
		// La consulta se realizó con ActiveRecord de Codeigniter
		return $this->db->select('sys_pages.*, m.slug as parent_slug, m.title as module, s.title as section')
						->from('sys_pages')
						->join('sys_pages as m', 'sys_pages.id_module=m.id_page', 'left')
						->join('sys_pages as s', 'sys_pages.id_section=s.id_page', 'left')
						->order_by('sys_pages.order', 'asc')
						->get()->result();
	}

	public function get_no_parents($id)
	{
		// Fetch pages without parents
		$pages = parent::get_by(array('IdModule' => $id));

		// Return key =>  value pair array
		$array[0] = 'Seleccione ' . ($id ? 'una sección' : 'un módulo') . '...';
		if (count($pages)) {
			foreach ($pages as $page) {
				$array[$page->getIdPage()] = $page->getTitle();
			}
		}

		return $array;
	}
}