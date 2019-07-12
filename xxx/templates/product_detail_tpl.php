<!-- slick -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.slick2').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: false, //Tự động chạy
            autoplaySpeed: 5000, //Tốc độ chạy
            asNavFor: '.slick'
        });
        $('.slick').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slick2',
            dots: false,
            centerMode: false,
            focusOnSelect: true
        });
        return false;
    });
</script>
<!-- slick -->

<!--Zoom hình-->
<script type="text/javascript" src="js/cloudzoom.js"></script>
<link href="css/cloudzoom.css" type="text/css" rel="stylesheet" /> 
<script type = "text/javascript">
    CloudZoom.quickStart();
</script>
<!--Zoom hình-->

<!--Phóng to hình-->
<link rel="stylesheet" href="css/swipebox.css">
<script src="js/jquery.swipebox.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.swipebox').swipebox({
            beforeOpen: function () {}, // called before opening
            afterOpen: function () {}, // called after opening
            afterClose: function () {}, // called after closing
            loopAtEnd: false // true will return to the first image after the last image is reached
        });
    });
</script>
<!--Phóng to hình-->

<!--Tags sản phẩm-->
<link href="css/tab.css" type="text/css" rel="stylesheet" />
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $('#content_tabs .tab').hide();
        $('#content_tabs .tab:first').show();
        $('#ultabs li:first').addClass('active');

        $('#ultabs li').click(function () {
            var vitri = $(this).data('vitri');
            $('#ultabs li').removeClass('active');
            $(this).addClass('active');

            $('#content_tabs .tab').hide();
            $('#content_tabs .tab:eq(' + vitri + ')').show();
            return false;
        });
    });
</script>
<!--Tags sản phẩm-->

<!--Mua hàng-->
<script type="text/javascript">
    $(document).ready(function (e) {
        $('.size').click(function () {
            $('.size').removeClass('active_size');
            $(this).addClass('active_size');
        });
        $('.mausac').click(function () {
            $('.mausac').removeClass('active_mausac');
            $(this).addClass('active_mausac');
        });
        $('a.dathang').click(function () {
            if ($('.size').length && $('.active_size').length == false)
            {
                alert('<?= _chonsize ?>');
                return false;
            }
            if ($('.active_size').length)
            {
                var size = $('.active_size').html();
            } else
            {
                var size = '';
            }

            if ($('.mausac').length && $('.active_mausac').length == false)
            {
                alert('<?= _chonmau ?>');
                return false;
            }
            if ($('.active_mausac').length)
            {
                var mausac = $('.active_mausac').html();
            } else
            {
                var mausac = '';
            }
            var act = "dathang";
            var id = "<?= $row_detail['id'] ?>";
            var soluong = $('.soluong').val();
            if (soluong > 0)
            {
                $.ajax({
                    type: 'post',
                    url: 'ajax/cart.php',
                    dataType: 'json',
                    data: {id: id, size: size, mausac: mausac, soluong: soluong, act: act},
                    beforeSend: function () {
                        $('.thongbao').html('<p><img src="images/loader_p.gif"></p>');
                    },
                    error: function () {
                        add_popup('<?= _hethongloi ?>');
                    },
                    success: function (kq) {
                        add_popup(kq.thongbao);
                        $('.menu2 li span').html(kq.sl);
                        console.log(kq);
                    }
                });
            } else
            {
                alert('<?= _nhapsoluong ?>');
            }
            return false;
        });
    });
</script>
<!--Mua hàng-->
<div class="wap_item">
    <div class="tieude_giua"><div><?= $title_cat ?></div><span></span></div>

    <div class="box_container">
        <div class="wap_pro">
            <div class="zoom_slick">    
                <div class="slick2">                
                    <a class="fancybox-buttons images_main swipebox" data-fancybox-group="button" href="<?php if ($row_detail['photo'] != NULL) echo _upload_sanpham_l . $row_detail['photo'];
else echo 'images/noimage.gif'; ?>"><img class='cloudzoom' src="<?php if ($row_detail['photo'] != NULL) echo _upload_sanpham_l . $row_detail['photo'];
else echo 'images/noimage.gif'; ?>" data-cloudzoom ="zoomSizeMode:'image',autoInside: 550 ,zoomImage: '<?php if ($row_detail['photo'] != NULL) echo _upload_sanpham_l . $row_detail['photo'];
                    else echo 'images/noimage.gif'; ?>'" /></a>

                    <?php $count = count($hinhthem);
                    if ($count > 0) { ?>
    <?php for ($j = 0, $count_hinhthem = count($hinhthem); $j < $count_hinhthem; $j++) { ?>
                            <a class="fancybox-buttons images_main swipebox" data-fancybox-group="button" href="<?php if ($hinhthem[$j]['photo'] != NULL) echo _upload_hinhthem_l . $hinhthem[$j]['photo'];
        else echo 'images/noimage.gif'; ?>"><img class='cloudzoom' src="<?php if ($hinhthem[$j]['photo'] != NULL) echo _upload_hinhthem_l . $hinhthem[$j]['photo'];
                else echo 'images/noimage.gif'; ?>" data-cloudzoom ="zoomSizeMode:'image',autoInside: 550 ,zoomImage: '<?php if ($hinhthem[$j]['photo'] != NULL) echo _upload_hinhthem_l . $hinhthem[$j]['photo'];
                else echo 'images/noimage.gif'; ?>'" /></a>	
                        <?php }
                    } ?>
                </div><!--.slick-->


                <?php $count = count($hinhthem);
                if ($count > 0) { ?>
                    <div class="slick">                
                        <p><img class='cloudzoom-gallery' src="timthumb.php?src=<?php if ($row_detail['photo'] != NULL) echo _upload_sanpham_l . $row_detail['photo'];
                    else echo 'images/noimage.gif'; ?>&h=80&w=100&zc=1&q=100" data-cloudzoom ="useZoom:'.cloudzoom', image:'<?php if ($row_detail['photo'] != NULL) echo _upload_sanpham_l . $row_detail['photo'];
                    else echo 'images/noimage.gif'; ?>' ,zoomImage: '<?php if ($row_detail['photo'] != NULL) echo _upload_sanpham_l . $row_detail['photo'];
                else echo 'images/noimage.gif'; ?>'" ></p>

    <?php for ($j = 0, $count_hinhthem = count($hinhthem); $j < $count_hinhthem; $j++) { ?>
                            <p><img class='cloudzoom-gallery' src="<?php if ($hinhthem[$j]['thumb'] != NULL) echo _upload_hinhthem_l . $hinhthem[$j]['thumb'];
        else echo 'images/noimage.gif'; ?>" data-cloudzoom ="useZoom:'.cloudzoom', image:'<?php if ($hinhthem[$j]['photo'] != NULL) echo _upload_hinhthem_l . $hinhthem[$j]['photo'];
        else echo 'images/noimage.gif'; ?>' ,zoomImage: '<?php if ($hinhthem[$j]['photo'] != NULL) echo _upload_hinhthem_l . $hinhthem[$j]['photo'];
        else echo 'images/noimage.gif'; ?>'" ></p>
    <?php } ?>
                    </div><!--.slick-->
                <?php } ?>
            </div><!--.zoom_slick--> 

            <ul class="product_info">
                <li class="ten"><?= $row_detail['ten'] ?></li>
<?php if ($row_detail['masp'] != '') { ?><li><b><?= _masanpham ?>:</b> <?= $row_detail['masp'] ?></span></li><?php } ?>

                <li class="gia"><?= _gia ?>: <?php if ($row_detail['gia'] > 0) echo number_format($row_detail['gia'], 0, ',', '.') . ' <sup>đ</sup>';
else echo _lienhe; ?></li>



                <li><b><?= _soluong ?>:</b> <input type="text" value="1" class="soluong" /> </li>  

                <li><b><?= _luotxem ?>:</b> <span><?= $row_detail['luotxem'] ?></span></li>
                <li><a class="dathang"><?= _datmuasanpham ?></a></li>
                    <?php if ($row_detail['mota'] != '') { ?><li><?= str_replace("/n", "<br />", $row_detail['mota']); ?></li><?php } ?>


                <li><div class="addthis_native_toolbox"></div></li>          
            </ul>
            <div class="clear"></div>  
        </div><!--.wap_pro-->

        <div id="tabs">   
            <ul id="ultabs">				 
                <li data-vitri="0"><?= _thongtinsanpham ?></li>
                <li data-vitri="1"><?= _binhluan ?></li>      
            </ul>
            <div style="clear:both"></div>

            <div id="content_tabs">               
                <div class="tab">
    <?= $row_detail['noidung'] ?>   

                </div> 

                <div class="tab">
                    <div class="fb-comments" data-href="<?= getCurrentPageURL() ?>" data-numposts="5" data-width="100%"></div>
                </div>  
            </div><!---END #content_tabs-->
        </div><!---END #tabs-->	
        <div class="clear"></div>
    </div><!--.box_containerlienhe-->
</div>
                <?php if (count($product) > 0) { ?>
    <div class="wap_item">
        <div class="tieude_giua"><div> <?= _sanphamcungloai ?></div><span></span></div>

                        <?php for ($i = 0, $count_product = count($product); $i < $count_product; $i++) { ?>
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
        <div class="clear"></div>
        <div class="pagination"><?= pagesListLimitadmin($url_link, $totalRows, $pageSize, $offset) ?></div>
    </div><!---END .wap_item-->
<?php } ?>
