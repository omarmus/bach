<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Page extends Admin_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['sortable'] = TRUE;

		// Fetch all pages
		$this->data['pages'] = $this->page->get_with_parent();

		// Load view
		// Esta vista se generó usando el estandar de Codeigniter por fuerza mayor
		$this->data['subview'] = 'admin/page/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function order()
	{
		is_ajax();

		$this->load->view('admin/page/order', $this->data);
	}

	public function order_ajax()
	{
		is_ajax();

		// Save order from  ajax call
		if (isset($_POST['sortable'])) {
			$this->page->save_order($this->input->post('sortable'));
		}
		
		// Fetch all pages
		$this->data['pages'] = $this->page->get_nested();

		// Load view
		$this->load->view('admin/page/order_ajax', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a page or set a new one
		if ($pk) {
			$this->data['page'] = $this->page->get($pk)->toArray();
			count($this->data['page']) || $this->data['errors'][] = 'page could no be found';
		} else {
			$this->data['page'] = $this->page->get_new();
		}

		// Pages for dropdown
		$this->data['list_modules'] = $this->page->get_no_parents(0);

		// Set up the form
		$rules = $this->page->rules;

		$page_type = $this->input->post('PageType');
		if ($page_type == 'section' || $page_type == 'subsection') {
			$rules['IdModule']['rules'] .= '|callback__required_dropdown';
		}
		if ($page_type == 'subsection') {
			$rules['IdSection']['rules'] .= '|callback__required_dropdown';
		}

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->page->array_request($_POST);
			$this->page->save($data, $pk);
			echo $pk?'UPDATE':'CREATE';
		} else {
			$this->data['page_type'] = $page_type ? $page_type : 'module';
			// Load the view
			$this->load->view('admin/page/edit', $this->data);
		}	
	}

	public function delete_selected()
	{
		is_ajax();
		
		echo $this->page->deleteItems($this->input->post('pks'))?"OK":"ERROR";
	}

	public function delete($id)
	{
		echo $this->page->delete($id)?"OK":"ERROR";
	}

	public function _unique_slug()
	{
		// Do NOT valide if slug already exists
		//UNLESS it's the email for the current user
		$id = $this->uri->segment(4);
		$page = SysPagesQuery::create()->filterBySlug($this->input->post('Slug'))
									   ->filterByIdPage($id, Criteria::NOT_EQUAL)->find();
		if (count($page)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}

	public function get_sections()
	{
		$idModule = $this->input->post('idModule');
		if ($idModule) {
			echo json_encode(json_dropdown($this->page->get_no_parents($this->input->post('idModule'))));
		} else {
			echo json_encode(array(array('value' => 0, 'text' => 'Seleccione una sección')));
		}
	}

	public function set_on_off($id_page)
	{
		echo $this->page->save(array('State' => $this->input->post('state')), $id_page);
	}
}

/* End of file page.php */
/* Location: ./application/controllers/admin/page.php */