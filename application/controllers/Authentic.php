<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentic extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('email','Email','required',array('required'	=> '%s harus diisi'));
		$this->form_validation->set_rules('password','Password','required',array('required'	=> '%s harus diisi'));
		if($this->form_validation->run()){
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			// proses ke simple login
			$this->simple_login->login($email,$password);
		}

		$data = array('title' => 'Login Administrator');
		$this->load->view('authentic/list',$data,FALSE);	
	}

	public function logout(){
		$this->simple_login->logout();
	}

}

/* End of file Authentic.php */
/* Location: ./application/controllers/Authentic.php */