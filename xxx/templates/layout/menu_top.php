<?php 
$d->reset();
$sql_product_danhmuc = "select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and noibat=1 order by stt";
$d->query($sql_product_danhmuc);
$danhmuc = $d->result_array();
?>
<!--Hover menu-->
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $("#menu ul li").hover(function () {
            $(this).find('ul:first').css({visibility: "visible", display: "none"}).show(300);
        }, function () {
            $(this).find('ul:first').css({visibility: "hidden"});
        });
        $("#menu ul li").hover(function () {
            $(this).find('>a').addClass('active2');
        }, function () {
            $(this).find('>a').removeClass('active2');
        });
        $("#danhmuc ul li").hover(function () {
            $(this).find('ul:first').show(300);
        }, function () {
            $(this).find('ul:first').hide(300);
        });
    });
</script>
<!--Hover menu-->
<ul>	
    <?php for ($i = 0, $count_product_danhmuc = count($danhmuc); $i < $count_product_danhmuc; $i++) { ?>
        <li><a href="san-pham/<?= $danhmuc[$i]['tenkhongdau'] ?>-<?= $danhmuc[$i]['id'] ?>"><?= $danhmuc[$i]['ten'] ?></a>
            <ul>
                <?php
                $d->reset();
                $sql_product_list = "select ten$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and id_danhmuc='" . $danhmuc[$i]['id'] . "' order by stt,id desc";
                $d->query($sql_product_list);
                $product_list = $d->result_array();
                ?>
                <?php for ($j = 0, $count_product_list = count($product_list); $j < $count_product_list; $j++) { ?>
                    <li><a href="san-pham/<?= $product_list[$j]['tenkhongdau'] ?>-<?= $product_list[$j]['id'] ?>/"><?= $product_list[$j]['ten'] ?></a>

                    </li>
                <?php } ?>
            </ul>
        </li>
        <li class="line"></li>
    <?php } ?>
</ul>
