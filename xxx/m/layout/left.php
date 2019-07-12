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

<?php for ($i = 0, $count_product_danhmuc = count($danhmuc); $i < $count_product_danhmuc; $i++) {
    ?>
    <div class="danhmuc">
        <div class="tieude"><?= $danhmuc[$i]['ten'] ?></div>
        <ul>
            <?php
            $d->reset();
            $sql_product_list = "select ten$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and id_danhmuc='" . $danhmuc[$i]['id'] . "' order by stt,id desc";
            $d->query($sql_product_list);
            $product_list = $d->result_array();
            ?>
            <?php for ($j = 0, $count_product_list = count($product_list); $j < $count_product_list; $j++) {
                ?>
                <li><a href="san-pham/<?= $product_list[$j]['tenkhongdau'] ?>-<?= $product_list[$j]['id'] ?>/"><i class="fas fa-caret-right"></i>  <?= $product_list[$j]['ten'] ?></a>

                </li>
            <?php } ?>
        </ul>

    </div><!---END #danhmuc-->
<?php } ?>
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