<?php

	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau from #_news where hienthi=1 and type='cham-soc' order by stt,id desc";
	$d->query($sql);
	$chamsoc = $d->result_array();
	
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau from #_news where hienthi=1 and type='ve-chung-toi' order by stt,id desc";
	$d->query($sql);
	$vechungtoi = $d->result_array();

?>

<div class="item_ft">
	<p class="td_ft5">Chăm sóc khách hàng</p>
	<ul>
    	<?php for($i = 0, $count_chamsoc = count($chamsoc); $i < $count_chamsoc; $i++){ ?>
    		<li>
            	<a href="cham-soc/<?=$chamsoc[$i]['tenkhongdau']?>-<?=$chamsoc[$i]['id']?>.html"><?=$chamsoc[$i]['ten']?></a>
            </li>
        <?php } ?>
    </ul>
</div>

<div class="item_ft">
	<p class="td_ft5">Về chúng tôi</p>
	<ul>
    	<?php for($i = 0, $count_vechungtoi = count($vechungtoi); $i < $count_vechungtoi; $i++){ ?>
    		<li>
            	<a href="ve-chung-toi/<?=$vechungtoi[$i]['tenkhongdau']?>-<?=$vechungtoi[$i]['id']?>.html"><?=$vechungtoi[$i]['ten']?></a>
            </li>
        <?php } ?>
    </ul>
</div>

<!-- <div class="nhanemail">
	<p class="td_ft5">Đăng ký nhận tin</p>
    <p>Đăng ký email của bạn để nhận tin khuyến mãi mới nhất từ chúng tôi.</p>
	<?php 
	// include _template."layout/dangkynhantin.php";
	?>
    <!--<a href="" target="_blank"><img src="images/2018-05-16.png" /></a>-->
</div> -->

<div class="fanpage">
<p class="td_ft5">Fanpage facebook</p>
	<div class="fb-like-box" data-href="<?=$company['fanpage']?>" data-width="285" data-height="140" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
</div><!---END #danhmuc-->