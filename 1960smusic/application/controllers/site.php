<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends App_Controller
{
	public function __construct()
	{
		$this->models[] = 'content';
		$this->models[] = 'trivia';
		parent::__construct();
		$this->asides['topbar'] = 'topbar';
		$this->asides['footer'] = 'footer';
		$this->asides['trivia'] = 'trivia';
		$this->asides['notifications'] = 'notifications';
		$this->asides['ads'] = 'ads';
		
		// use min_css and min_js when possible to load assets through minify
		$this->min_js[] = 'trivia.js';		
		//$this->min_css[] = 'application.css';
		
		/*
			LessCSS should only be used for development. 
			When you are ready to deploy, compile your less files into css files.
			Ensure $this->less_css is empty  so that less.js will not be loaded.
		*/
		//$this->less_css[] = 'application.less';
	}		

	/* Ad hoc pages */
	public function cleanup()
	{	
		$this->view = 'site/index';
		$res = $this->db->query('select * from songs')->result_array();
		$new = array();
		foreach($res as $row)
		{
			$a = $row['artist'];
			$t = $row['title'];
			$l = str_replace(array('(',')'),'',$row['lyrics']);
			if(isset($new[$a][$t]))
				if(strlen($new[$a][$t]) < strlen($l))
					$new[$a][$t] = $l;
				else
					1;
			else
				$new[$a][$t] = $l;
		}
		$this->db->query('delete from songs');
		foreach($new as $a => $row)
			foreach($row as $t => $l)
				$this->db->insert('songs',array('artist'=>$a,'title'=>$t,'lyrics'=>$l));
	}

	public function update()
	{
		$this->authenticate=array('administrator');
		$this->db->where('artist',$this->input->post('artist'));
		$this->db->where('title',$this->input->post('title'));
		$this->db->update('songs',array('lyrics'=>$this->input->post('lyrics')));
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function trivia($answer=0)
	{
		$data = $this->session->all_userdata();
		$return = array();
		if(empty($data['trivia_score']))
			$data['trivia_score'] = 0;

		$return['correct'] = !empty($data['trivia_correct']) && ($data['trivia_correct'] == $answer);
		if($answer == 0)
			$data['trivia_score'] += 0;
		elseif($return['correct'])
			$data['trivia_score'] += 10;
		else
			$data['trivia_score'] = max(0, $data['trivia_score'] - 5);


		$return['score'] = $data['trivia_score'];
		$question = $this->trivia->get_question();
		$data['trivia_correct'] = $question['correct'];
		$return['question'] = $question['question'];
		$return['answers'] = $question['answers'];

		$this->session->set_userdata($data);
		$this->_json( $return );

	}

	public function index()
	{
		$this->data['content'] = $this->content->get('home');
		$this->data['youtube_playlist_id']=$this->config->item('youtube_playlist_id');
	}

	public function artists()
	{
		$this->data['artists'] = $this->db->query('select artist, count(title) as song_count from songs group by artist order by count(title) desc')->result_array();
		$this->data['content'] = $this->content->get('artists');
	}
	public function songs($artist='')
	{	
		$artist = urldecode($artist);
		if($artist)
		{
			$this->data['artist'] = $artist;
			$this->db->where('artist',$artist);
		}
		else
		{
			$this->data['artist'] = "1950's";
			$this->db->where('length(artist)+length(title) < 50')->limit(1000)->order_by('length(lyrics) desc');
		}
		$this->data['songs'] = $this->db->select('title,artist')->get('songs')->result_array();
		$this->data['content'] = $this->content->get('songs');
	}
	public function lyrics($artist='',$title='')
	{
		$artist = urldecode($artist);
		$title = urldecode($title);
		if($artist && $title)
		{	
			$this->data['artist'] = $artist;
			$this->data['title'] = $title;
			$this->db->where('artist',$artist);
			$this->db->where('title',$title);
			$this->data['lyrics'] = $this->db->select('title,artist,lyrics')->get('songs')->result_array();
		}
		else
		{
			$this->view = 'site/songs.php';
			$this->songs($artist);
			return;
		}
		if(empty($this->data['lyrics']))
		{
			$this->db->where('length(artist)+length(title) < 50')->limit(1000)->order_by('length(lyrics) desc');
			$this->data['songs'] = $this->db->select('title,artist,lyrics')->get('songs')->result_array();
		}
		if(empty($this->data['lyrics']))
			$this->data['lyrics'] = array(array('lyrics'=>''));
		
		$this->data['content'] = $this->content->get('lyrics');
	}

	/* * * * * * * * * * * * * * * * * * *
	 * Some cool functions worth saving. *
	 * * * * * * * * * * * * * * * * * * */

	// this was used for slang.org CMS pages. Should build a CMS system with it.
	public function content($page)
	{
		$this->data['content'] = $this->content->get($page);
		$this->data['page'] = $page;
	}

	// robots.txt generator
	public function robots()
	{
		$this->view = false;
		header("Content-type: text/plain; charset=utf-8"); 
		echo "Sitemap: " . $this->config->item('base_path') . "/sitemap.xml";
	}

	// this is used to verify google webmaster tools
	public function google_verification()
	{
		$this->view = false;
		echo "google-site-verification: " . $this->config->item('google_site_verification');
	}

	// this is used to generate a sitemap.xml
	public function sitemap_xml()
	{
		$this->view = false;
		$this->load->library('xml');

		$base_url = $this->config->item('base_path');
		$yesterday = date('Y-m-d',time()-86400*2);
		$lastweek = date('Y-m-d',time()-86400*8);
		$urls = array();

		// top level
		foreach(array('','about','lyrics','artists','songs') as $page)
			$urls[] = array(
				'loc' => $base_url . '/' . $page,
				'lastmod' => $yesterday,
				'changefreq' => 'daily',
				'priority' => 1
			);

		// artists
		$artists = $this->db->query('select distinct artist from songs')->result_array();
		foreach($artists as $a)
			$urls[] = array(
				'loc' => $base_url . '/songs/' . urlencode($a['artist']),
				'lastmod' => $yesterday,
				'changefreq' => 'weekly',
				'priority' => 0.8
			);

		// songs
		$artists = $this->db->query('select distinct artist,title from songs')->result_array();
		foreach($artists as $a)
			$urls[] = array(
				'loc' => $base_url . '/lyrics/' . urlencode($a['artist']) . '/' . urlencode($a['title']),
				'lastmod' => $yesterday,
				'changefreq' => 'weekly',
				'priority' => 0.8
			);

		header("Content-type: text/xml; charset=utf-8"); 
		echo $this->xml->get_sitemap($urls);
	}

	/* human readable sitemap */
	public function sitemap()
	{
		$base_url = 'http://'.$_SERVER['HTTP_HOST'];
		$yesterday = date('Y-m-d',time()-86400*2);
		$lastweek = date('Y-m-d',time()-86400*8);
		$urls = array();

		// top level
		foreach(array('' => 'Project Template') as $page => $text)
			$urls[] = array(
				'url' => $base_url . '/' . $page,
				'text' => $text,
				'children' => array()
			);
	}
}