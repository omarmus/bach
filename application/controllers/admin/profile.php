<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Admin_Controller {

	private $id_user;

	public function __construct()
	{
		parent::__construct();

		$this->id_user = $this->data['userdata']['id_user'];
		$this->load->model('file_m', 'file');
	}

	public function index()
	{   
		$this->data['user'] = $this->user->get($this->id_user)->toArray();

		if ($this->data['user']['IdPhoto']) {
			$file = $this->file->get($this->data['user']['IdPhoto'])->toArray();
			$this->data['user']['photo'] = $file['Filename'];
		}

		$this->data['subview'] = 'admin/user/profile';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function update_data()
	{
		$rules = $this->user->rules_edit;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {

			// Save a new data user
			$data = $this->user->array_request($_POST);
			$this->user->save($data, $this->id_user);

			// Set a new data session
			$user = $this->user->get($this->id_user);
			$this->user->set_session_data($user);
			$this->data['user'] = $user->toArray();
		} else {
			$this->data['user'] = $this->user->get($this->id_user)->toArray();
		}
		$this->load->view('admin/user/profile_data', $this->data);
	}

	public function update_password()
	{
		$this->load->library('bcrypt');

		$this->form_validation->set_rules($this->user->rules_password);
		if ($this->form_validation->run() == TRUE) {
			$data = $this->user->array_request($_POST);
			$data['Password'] = $this->bcrypt->hash_password($data['Password']);
			$this->user->save($data, $this->id_user);
		}
		$this->load->view('admin/user/profile_password');
	}

	public function update_photo()
	{
		$this->data['user'] = $this->user->get($this->id_user)->toArray();
		if (!is_null($this->data['user']['id_photo'])) {
			$file = $this->file->get($this->data['user']['id_photo']);
			$this->data['user']['photo'] = $file['Filename'];
		}
		// Set a new data session
		$user = $this->user->get($this->id_user);
		$this->user->set_session_data($user);
		$this->data['user'] = $user->toArray();

		$this->load->view('panel/sec/profile_photo', $this->data);
	}

	public function delete_photo()
	{
		$this->file->delete($this->session->userdata('id_photo'));
		$this->user->save(array('IdPhoto' => NULL), $this->id_user);

		// $this->update_photo();
	}

	public function upload_photo()
	{
		$config['field'] = 'photo';
		$config['upload_path'] = './static/files/user_profile/';
		$config['allowed_types'] = 'gif|jpg|png';

		$file = upload_file($config);

		if($file['id_file']) {
			$this->user->save(array('IdPhoto' => $file['id_file']), $this->id_user);
		}

		echo json_encode($file);
	}

	public function _verify_old_password()
	{
		$user = $this->user->get($this->id_user);

		if($this->bcrypt->check_password($this->input->post('OldPassword'), $user->getPassword())) {
            return TRUE;
        } else {
        	$this->form_validation->set_message('_verify_old_password', 'La %s es incorrecta.');
			return FALSE;
        }
	}

}

/* End of file profile.php */
/* Location: .//C/wamp/www/gns/app/controllers/panel/cms/profile.php */