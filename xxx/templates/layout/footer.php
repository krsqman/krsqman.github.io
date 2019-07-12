<?php	

	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,noidung$lang as noidung from #_news where type='hethong' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$chinhanh = $d->result_array();

?>

<?php for($i = 0, $count_chinhanh = count($chinhanh); $i < $count_chinhanh; $i++){ ?>
	<div class="item_cn">
		<p class="td_ft"><?=$chinhanh[$i]['ten']?></p>
		<?=$chinhanh[$i]['noidung']?>
	</div>
<?php } ?>
<a href="#">
	<div class="us-phone-number">
	<i class="fa fa-phone" aria-hidden="true"> 0938005909</i>
	</div>
</a>

