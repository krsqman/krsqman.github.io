<?php	

    $d->reset();
    $sql_contact = "select noidung$lang as noidung from #_about where type='footer' limit 0,1";
    $d->query($sql_contact);
    $company_contact = $d->fetch_array();

?>
<div id="main_footer">
	<?=$company_contact['noidung'];?>
</div>

<div id="maps">
    <?php include _template . "layout/map.php"; ?>
</div>