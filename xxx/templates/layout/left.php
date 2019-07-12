<?php
$d->reset();
$sql_hotro = "select ten$lang as ten,dienthoai,email,yahoo,skype from #_yahoo where hienthi=1 order by stt,id desc";
$d->query($sql_hotro);
$hotro = $d->result_array();

$d->reset();
$sql_quangcao = "select id,ten$lang as ten,link,photo from #_slider where hienthi=1 and type='quangcao' order by stt,id desc";
$d->query($sql_quangcao);
$quangcao = $d->result_array();

$d->reset();
$sql_lkweb = "select id,ten$lang as ten,link from #_lkweb where hienthi=1 order by stt,id desc";
$d->query($sql_lkweb);
$lkweb = $d->result_array();

$d->reset();
$sql_product_danhmuc = "select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and noibat=1 order by stt,id desc";
$d->query($sql_product_danhmuc);
$danhmuc = $d->result_array();
?>


    <div class="danhmuc">
        <div class="tieude">DANH MỤC SẢN PHẨM</div>
        <?php for ($i = 0, $count_product_danhmuc = count($danhmuc); $i < $count_product_danhmuc; $i++) {
            $d->reset();
            $sql_product_list = "select ten$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and id_danhmuc='" . $danhmuc[$i]['id'] . "' order by stt,id desc";
            $d->query($sql_product_list);
            $product_list = $d->result_array();
            $best_product_id = null;
        ?>
        <ul>
            <li>
                <a href="san-pham/<?= $danhmuc[$i]['tenkhongdau'] ?>-<?= $danhmuc[$i]['id'] ?>"><i class="fas fa-caret-right"></i>  <?= $danhmuc[$i]['ten'] ?></a>
                <div class="submenu_left">
                <?php 
                if (!empty($product_list)) {
                ?>
                <ul>
                <!-- ////////// -->
                <?php
                foreach ($product_list as $key => $value) {
                    $best_product_id[] =  $value['id'];
                ?>
                <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
                    <li>
                        <a href="san-pham/<?= $value['tenkhongdau'] ?>-<?= $value['id'] ?>/"><?= $value['ten'] ?></a>
                    </li>
                
                <?php 
                    }
                ?>
                </ul>
                <ul class="right_submenu_content">
                    <div class="best_product_sub"><p><?= $danhmuc[$i]['ten'] ?> - Sản phẩm nổi bật</p></div>
                    <?php
                    $d->reset();
                    $sql_best_product = 'select id,ten,tenkhongdau,photo,thumb,giacu,gia,masp,mota from #_product where hienthi=1 and noibat=1 AND id_list in('.implode(',',$best_product_id).') order by luotxem DESC LIMIT 3';
                    $d->query($sql_best_product);
                    $best_product_list = $d->result_array();
                    foreach ($best_product_list as $key => $value) {
                     ?>
                     <div class="item" itemscope itemtype="http://schema.org/Product">
                        <p class="sp_img hover_sang1"><a href="san-pham/<?= $value['tenkhongdau'] ?>-<?= $value['id'] ?>.html" title="<?= $value['ten'] ?>">
                                <img src="<?php
                                if ($value['photo'] != NULL)
                                    echo _upload_sanpham_l . $value['photo'];
                                else
                                    echo 'images/noimage.png';
                                ?>" alt="<?= $value['ten'] ?>" itemprop="image" /></a></p>
                        <h3 class="sp_name"><a href="san-pham/<?= $value['tenkhongdau'] ?>-<?= $value['id'] ?>.html" title="<?= $value['ten'] ?>" itemprop="name"><?= $value['ten'] ?></a></h3>
                        <div class="sp_gia">
                            <div class="giaban">
                                <?= _gia ?>: <span><?php
                                if ($value['gia'] > 0)
                                    echo number_format($value['gia'], 0, ',', '.') . '';
                                else
                                    echo _lienhe;
                                ?></span>
                            </div>
                            <div class="muasp">
                                <a href="" rel="<?=$value['id']?>" class="dathang">                            
                                    </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </ul>
                <?php 
                    }
                ?>
                </div>
            </li>
        </ul>
        <!-- ///////////// -->
        <?php } ?>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\ -->
    </div><!---END #danhmuc-->

<div class="danhmuc">
    <div class="tieude">Fanpage Facebook</div>
    <ul>
        <div class="fb-like-box" data-href="<?= $company['fanpage'] ?>" data-width="240" data-height="250" data-show-faces="true" data-stream="true" data-show-border="false" data-header="false"></div>
    </ul>

</div><!---END #danhmuc-->

<div  class="danhmuc">
    <div class="tieude"><?= _quangcao ?></div>
    <ul>
        <div>
            <table>  
                <?php for ($i = 0, $count_quangcao = count($quangcao); $i < $count_quangcao; $i++) { ?>
                    <tr>
                        <td valign="top">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td valign="top">     	  
                                        <a target="_black" href="<?= $quangcao[$i]['link'] ?>"><img src="<?php
                                            if ($quangcao[$i]['photo'] != NULL)
                                                echo _upload_hinhanh_l . $quangcao[$i]['photo'];
                                            else
                                                echo 'images/noimage.gif';
                                            ?>" alt="<?php
                                                                                    if ($quangcao[$i]['ten'] != '')
                                                                                        echo $quangcao[$i]['ten'];
                                                                                    else
                                                                                        echo $company['ten']
                                                                                        ?>" /></a></td>
                                </tr>
                            </table>
                        </td>      
                    </tr>  
                <?php } ?>    
            </table>
        </div>
    </ul>
</div><!---END #danhmuc-->