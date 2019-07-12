<?php if(!defined('_lib')) die("Error");

	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	$config_url=$_SERVER["SERVER_NAME"].'';	
	
	$config['database']['servername'] = '112.213.89.20';
	// $config['database']['servername'] = '112.213.89.41';

	$config['database']['username'] = 'sexshop1_db';
	$config['database']['password'] = '[X_.4!xD4rf"n*N9DqLK6@t';
	$config['database']['database'] = 'sexshop1_test';
	$config['database']['refix'] = 'table_';
	
	$ip_host = '127.0.0.1';
	$mail_host = 'shop@sexshop18.vn';
	$pass_mail = 'SpDkF#68Uu-n';

	$config['lang']=array(''=>'Tiếng Việt');#Danh sách ngôn ngữ hỗ trợ
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');

?>
