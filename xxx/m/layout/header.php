<?php
$d->reset();
$sql_banner = "select photo$lang as photo from #_background where type='banner' limit 0,1";
$d->query($sql_banner);
$row_banner = $d->fetch_array();

$d->reset();
$sql_product_danhmuc = "select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 order by stt,id desc";
$d->query($sql_product_danhmuc);
$product_danhmuc = $d->result_array();

$d->reset();
$sql_hotro = "select ten$lang as ten,skype from #_yahoo where hienthi=1 order by stt,id desc";
$d->query($sql_hotro);
$hotro = $d->result_array();

$d->reset();
$sql_slider = "select ten$lang as ten,link,photo from #_slider where hienthi=1 and type='mangxahoi' order by stt,id desc";
$d->query($sql_slider);
$mangxahoi=$d->result_array();
?>
<a href="" class="logo"><img src="<?= _upload_hinhanh_l . $row_banner['photo'] ?>" /></a>
<!--<div class="search">
    <select name="tim_danhmuc">
        <option value="0"><?= _chondanhmuc ?></option>
        <?php for ($i = 0, $count_product_danhmuc = count($product_danhmuc); $i < $count_product_danhmuc; $i++) { ?>
        <option value="<?= $product_danhmuc[$i]['id'] ?>"><?= $product_danhmuc[$i]['ten'] ?></option>
        <?php } ?>
    </select>
    <input type="text" name="keyword" id="keyword" onKeyPress="doEnter(event, 'keyword');" value="<?= _nhaptukhoatimkiem ?>..." onclick="if (this.value == '<?= _nhaptukhoatimkiem ?>...') {
                this.value = ''
            }" onblur="if (this.value == '') {
                        this.value = '<?= _nhaptukhoatimkiem ?>...'
                    }">
    <div class="tim" onclick="onSearch(event, 'keyword');">
        <p>Tìm kiếm</p>
    </div>
</div>-END #search   -->
<!--hotline-->
<div class="toigiohang">
    <a href="gio-hang.html" class="cart_mt"><i class="fas fa-cart-arrow-down"></i><span>  <?php if(count($_SESSION['cart'])>0)echo count($_SESSION['cart']);else echo '0';?>  SP</span></a> 
</div>
<!--<div class="hotlineh">
    Hotline:</br>   
    <span><?=$company['dienthoai']?></span>
</div>-->
<!--Hotline-->
<div class="mangxahoi">
	<ul>
	<?php  for($i=0,$count_mxh=count($mangxahoi);$i<$count_mxh;$i++){ ?>
		<li>
			<a target="_black" href="<?=$mangxahoi[$i]['link']?>"><img src="<?=_upload_hinhanh_l.$mangxahoi[$i]['photo'] ?>" title="<?=$mangxahoi[$i]['ten']?>" width="100%"/></a>
		</li>
	<?php }?>
	</ul>
</div>
