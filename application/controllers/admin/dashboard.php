<?php
class Dashboard extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_m', 'user');
    }

    public function index() {
    	$this->data["subview"] = "";
    	$this->data["users"] = $this->user->getUsers();
    	$this->load->view('admin/_layout_main', $this->data);
    }
    
    public function modal() {
    	$this->load->view('admin/_layout_modal', $this->data);
    }
}