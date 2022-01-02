<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function index()
	{
		$site 			= $this->site_model->listing();
		$category 		= $this->category_model->listing();
		$slider			= $this->post_model->listing();	
		$list_popular	= $this->post_model->listing_by_popular(5,0);

		$data = array(	'title' 		=> $site->namaweb,
						'tagline'		=> $site->tagline,
						'site'			=> $site,
						'category'		=> $category,
						'slider'		=> $slider,
						'list_popular'	=> $list_popular,
						'isi'			=> 'home/list'); 
		$this->load->view('layout/wrapper',$data,FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */