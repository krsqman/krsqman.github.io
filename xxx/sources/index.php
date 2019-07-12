<?php  if(!defined('_source')) die("Error");

	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,photo,mota$lang as mota from #_about where type='about' limit 0,1";		
	$d->query($sql);
	$gioithieu = $d->fetch_array();	
	
	$d->reset();
	$sql_video = "select id,ten$lang as ten,link from #_video where hienthi=1 order by stt,id desc";
	$d->query($sql_video);
	$video = $d->result_array();

?>