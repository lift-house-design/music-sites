<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* * * * * * * * * * * * * * * * * *\
 * Examples and Demos and Whatnots *
\* * * * * * * * * * * * * * * * * */
	
/* This class is for code examples and testing. *\
\*      It should not go into production.       */

class Demo extends App_Controller
{
	public function __construct()
	{
	//	$this->models[] = 'content';
		parent::__construct();
		$this->asides['topbar'] = 'topbar';
		$this->asides['notifications'] = 'notifications';
		
		// use min_css and min_js when possible to load assets through minify
		$this->min_js[] = '/plugins/projekktor-1.3.09/projekktor-1.3.09.min.js';		
		$this->min_css[] = '/plugins/projekktor-1.3.09/themes/maccaco/projekktor.style.css';
		
		/*
			LessCSS should only be used for development. 
			When you are ready to deploy, compile your less files into css files.
			Then remove any included .less files so that less.js will not be loaded.
		*/
		$this->less_css[] = 'application.less';
	}

	/* Ad hoc pages */

	public function index()
	{

	}

	public function rdio()
	{
		$this->view = false;
		$oauth = new OAuth('h94wmsjgnkeq5pwpec7kpr52','cAP2a2ZGgE');
	}

	public function youtube()
	{

	}

	public function id3info()
	{
		$this->view = false;
		$this->load->library('id3info');
		$this->id3info->load(__DIR__.'/../../assets/audio/Al Johnson - I Only Have Eyes For You.mp3');
		$this->data['song'] = $this->id3info->basic();
        $this->data['song']['picture'] = $this->id3info->picture();
        echo '<pre>';var_dump($this->data['song']);
	}

	public function chosen()
	{
		$this->min_js[] = '/plugins/chosen_v1.1.0/chosen.jquery.min.js';
		$this->min_css[] = '/plugins/chosen_v1.1.0/chosen.min.css';
		
	}

	public function projekktor()
	{

	}

	public function live365()
	{

	}

	public function soundcloud()
	{

	}

	public function spotify()
	{

	}

}