<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends App_Controller
{
	//protected $layout='layouts/administration';
	protected $authenticate=array('administrator');

	public function __construct()
	{
		$this->models[] = 'content';

		parent::__construct();

		$this->asides['topbar'] = 'topbar';
		$this->asides['footer'] = 'footer';
		$this->asides['notifications'] = 'notifications';
		//$this->js[] = '/plugins/tinymce/tinymce.min.js';
		$this->js[] = '/plugins/tinymce4.0.11/js/tinymce/tinymce.min.js';
		$this->min_js[] = '/plugins/fancybox2/jquery.fancybox.pack.js';
		$this->min_js[] = 'admin.js';
		//$this->less_css[] = 'application.less';
	}
	
	public function index()
	{
		$post = $this->input->post();
		if(is_array($post))
			$post = array_map('trim', $post);
		if(isset($post['action']))
		{
			if($post['action'] === 'Save Content')
			{
				$this->content->update($post['name'],$post['content']);
			}
		}
		$this->data['content'] = $this->content->get_all();
		$this->data['configuration'] = $this->configuration->get_all();
	}
}

/* End of file administration.php */
/* Location: ./application/controllers/administration/administration.php */