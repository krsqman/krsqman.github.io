<?php
include ("../ajax/ajax_config.php");
include_once "class_paging_ajax.php";

if (isset($_POST["page"])) {
    $paging = new paging_ajax();

    $paging->class_pagination = "pagination";
    $paging->class_active = "active";
    $paging->class_inactive = "inactive";
    $paging->class_go_button = "go_button";
    $paging->class_text_total = "total";
    $paging->class_txt_goto = "txt_go_button";
    $paging->per_page = $company['tiwtter'];
    $paging->page = $_POST["page"];
    $paging->text_sql = "select id,ten,tenkhongdau,photo,thumb,giacu,gia,masp,mota from table_product where hienthi=1 and id_danhmuc=" . $_POST["id_danhmuc"] . " and noibat=1 and type='sanpham' order by stt asc";
    $product = $paging->GetResult();
    $message = '';
	$paging->data = "" . $message . "";
}
?>
<?php
if (count($product) == 0) {
    echo '<div class="dangcapnhat">Nội dung đang cập nhật ...</div>';
} else {
    for ($i = 0, $count_product = count($product); $i < $count_product; $i++) {
        ?>
        <div class="item" itemscope itemtype="http://schema.org/Product">
            <p class="sp_img hover_sang1"><a href="san-pham/<?= $product[$i]['tenkhongdau'] ?>-<?= $product[$i]['id'] ?>.html" title="<?= $product[$i]['ten'] ?>">
                    <img src="<?php
                    if ($product[$i]['photo'] != NULL)
                        echo _upload_sanpham_l . $product[$i]['photo'];
                    else
                        echo 'images/noimage.png';
                    ?>" alt="<?= $product[$i]['ten'] ?>" itemprop="image" /></a></p>
            <h3 class="sp_name"><a href="san-pham/<?= $product[$i]['tenkhongdau'] ?>-<?= $product[$i]['id'] ?>.html" title="<?= $product[$i]['ten'] ?>" itemprop="name"><?= $product[$i]['ten'] ?></a></h3>
            <div class="sp_gia">
                <div class="giaban">
                    <?= _gia ?>: <span><?php
                    if ($product[$i]['gia'] > 0)
                        echo number_format($product[$i]['gia'], 0, ',', '.') . '';
                    else
                        echo _lienhe;
                    ?></span>
                </div>
                <div class="muasp">
                      <a href="" rel="<?=$product[$i]['id']?>" class="dathang">                            
                        </a>
                </div>
            </div>
        </div><!---END .item-->
    <?php } ?>
    <?= $paging->Load(); ?>
<?php } ?>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.size').click(function(){
			$('.size').removeClass('active_size');
			$(this).addClass('active_size');
		});
		$('.mausac').click(function(){
			$('.mausac').removeClass('active_mausac');
			$(this).addClass('active_mausac');
		});
		$('.item a.dathang').click(function(){
				if($('.size').length && $('.active_size').length==false)
				{
					alert('<?=_chonsize?>');
					return false;
				}
				if($('.active_size').length)
				{
					var size = $('.active_size').html();
				}
				else
				{
					var size = '';
				}
				
				if($('.mausac').length && $('.active_mausac').length==false)
				{
					alert('<?=_chonmau?>');
					return false;
				}
				if($('.active_mausac').length)
				{
					var mausac = $('.active_mausac').html();
				}
				else
				{
					var mausac = '';
				}
					var act = "dathang";
					var id = $(this).attr('rel');
					var soluong = 1;
					if(soluong>0)
					{
						$.ajax({
							type:'post',
							url:'ajax/cart.php',
							dataType:'json',
							data:{id:id,size:size,mausac:mausac,soluong:soluong,act:act},
							beforeSend: function() {
								$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  
							},
							error: function(){
								add_popup('<?=_hethongloi?>');
							},
							success:function(kq){
								add_popup(kq.thongbao);
								$('.menu2 li span').html(kq.sl);
								console.log(kq);
							}
						});
					}
					else
					{
						alert('<?=_nhapsoluong?>');
					}
			return false;
		});
	});
</script>