<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Set Environment */
// detect from host (local.domain.com => local, domain.lifthousedesign.com => development, other => production)
if(strpos($_SERVER['HTTP_HOST'],'local') === 0)
	$config['environment'] = 'local';
elseif(strpos($_SERVER['HTTP_HOST'],'.lifthousedesign.com') !== false)
	$config['environment'] = 'development';
else
	$config['environment'] = 'production';

$config['error_email'] = 'bain.lifthousedesign@gmail.com';
/* Database Configuration */
$config['databases']=array(
	'default' => array(
		'hostname' => 'localhost',
		'dbdriver' => 'mysql',
		'db_debug' => true,		
	),
	'local'=>array(
		'username'=>'root',
		'password'=>'root',
		'database'=>'1950smusic',
	),
	'development'=>array(
		'username'=>'root',//'1950smusic',
		'password'=>'',//'1950smusic',
		'database'=>'1950smusic',
	),
	'production'=>array(
		'username'=>'',
		'password'=>'',
		'database'=>'',
		'db_debug' => false,
	),
);
$config['database'] = array_merge(
	$config['databases']['default'],
	$config['databases'][$config['environment']]
);

/* URL / Path Configuration */
$config['domain'] = $_SERVER['HTTP_HOST'];
$config['scheme'] = 'http';
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
	$config['scheme'] .= 's';
$config['base_path'] = $config['scheme'] . '://' . $config['domain'];
$config['full_path'] = $config['base_path'] . $_SERVER['REQUEST_URI'];
$config['assets_url'] = '/assets';
$config['module_path'] = APPPATH.'modules';

/* Metadata/SEO */
$config['meta'] = array(
	'site_name' => '1950s Music',
	'title' => "1950s Music",
	'description' => "1950s artist, songs, lyrics, and playlists",
	'keywords' =>'1950s music, 1950s radio',
	'url' => $config['full_path'],
	'image' => '/assets/img/logo.png'
);
$config['copyright']='Copyright &copy; '.$config['meta']['site_name'].' '.date('Y').' All Rights Reserved.';

$config['seo_content'] = '<a href="http://twitterape.com>Trend Archive</a> <a href="http://lifthousedesign.com">Austin Web Development</a>"';

/* Google Analytics */
$config['ga_code']=FALSE;

/* E-mail Notifications */
$config['email_notifications']=array(
	'sender_email'=>'no-reply@lifthousedesign.com',
	'sender_name'=>'1950s Music',
	'config'=>array(
		'protocol'=>'sendmail',
		'mailtype'=>'html',
	),
);

/* YouTube Playlist to use in the player on the homepage */
$config['youtube_playlist_id']='PL1AE1A7AD35A33916'; // http://www.youtube.com/playlist?list=PL1AE1A7AD35A33916