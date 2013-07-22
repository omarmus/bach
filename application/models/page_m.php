<?php
class Page_m extends BC_Model {
	
	protected $_table_name = 'SysPages';
	protected $_primary_key = 'IdPage';

	public $rules = array(
		'IdParent' => array(
			'field' => 'IdParent',
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

	public function get_new()
	{
		return array(
			'Title' => '',
			'Slug' => '',
			'IdParent' => 0
		);
	}

	public function delete($pk)
	{
		// Delete a page
		parent::delete($pk);

		// Reset parent ID for its children
		SysPagesQuery::create()->filterByIdParent($pk)->update(array('IdParent' => 0));
	}

	public function save_order($pages)
	{
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					$data = array('IdParent' => (int)$page['parent_id'], 'Order' => $order);
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
			if (! $page['IdParent']) {
				$array[$page['IdPage']] = $page;
			} else {
				$array[$page['IdParent']]['children'][] = $page;
			}
		}
		return $array;
	}

	public function get_with_parent ()
	{
		// Propel no soporta el join de una tabla con sigo misma si es que no existe una relación
		// La consulta se realizó con ActiveRecord de Codeigniter
		return $this->db->select('sys_pages.*, p.slug as parent_slug, p.title as parent_title')
						->from('sys_pages')
						->join('sys_pages as p', 'sys_pages.id_parent=p.id_page', 'left')
						->order_by('sys_pages.order', 'asc')
						->get()->result();
	}

	public function get_no_parents()
	{
		// Fetch pages without parents
		$pages = parent::get_by(array('IdParent' => 0));

		// Return key =>  value pair array
		$array = array();

		if (count($pages)) {
			foreach ($pages as $page) {
				$array[$page->getIdPage()] = $page->getTitle();
			}
		}

		return array(
			0 => 'Create a new module',
			'Select module...' => $array
		);
	}
}