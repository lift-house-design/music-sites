<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trivia_model extends App_Model
{
	public function get_question()
	{
		switch(rand(1,2))
		{
			case 1:
				$artist = $this->rand_artist();
				$answer = $this->rand_song($artist);
				$answers = array(
					$answer,
					$this->rand_song_not($artist),
					$this->rand_song_not($artist)
				);
				shuffle($answers);
				$correct = array_search($answer, $answers) + 1;
				return array(
					'question' => "Which song was performed by <i>$artist</i> ?",
					'correct' => $correct,
					'answers' => $answers
				);
				break;
			case 2:
				$artist = $this->rand_artist();
				$song = $this->rand_song($artist);
				$answer = $artist;
				$answers = array(
					$answer,
					$this->rand_artist($artist),
					$this->rand_artist($artist)
				);
				shuffle($answers);
				$correct = array_search($answer, $answers) + 1;
				return array(
					'question' => "Which artist performed the song <i>$song</i> ?",
					'correct' => $correct,
					'answers' => $answers
				);
				break;
		}
	}

	public function rand_artist($artist='')
	{
		if($artist)
			$res = $this->db->query('select artist from songs where artist!='.$this->db->escape($artist).' order by rand() limit 1')->row_array();
		else
			$res = $this->db->query('select artist from songs order by rand() limit 1')->row_array();
		return $res['artist'];
	}

	public function rand_song($artist='')
	{
		if($artist){
			$res = $this->db->query('select title from songs where artist='.$this->db->escape($artist).' order by rand() limit 1')->row_array();
			return $res['title'];
		}
	}

	public function rand_song_not($artist='')
	{
		if($artist){
			$res = $this->db->query('select title from songs where title not in(select title from songs where artist='.$this->db->escape($artist).') order by rand() limit 1')->row_array();
			return $res['title'];
		}
	}
}
?>