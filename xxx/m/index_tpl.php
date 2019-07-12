<?php
$d->reset();
$sql_product_danhmuc = "select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and noibat=1 order by stt";
$d->query($sql_product_danhmuc);
$danhmuc = $d->result_array();
?>
<script type="text/javascript">
    function loadData(page, id_tab, id_danhmuc) {
        $.ajax({
            type: "POST",
            url: "paging_ajax/ajax_paging.php",
            data: {page: page, id_danhmuc: id_danhmuc},
            success: function (msg)
            {
                $("#loadbody").fadeOut("fast");
                $(id_tab).html(msg);
                $(id_tab + " .pagination li.active").click(function () {
                    var pager = $(this).attr("p");
                    var id_danhmucr = $(this).parents().parents().parents().attr("data-rel");

                    loadData(pager, ".load_page_" + id_danhmucr, id_danhmucr);
                });
            }
        });
    }
</script>
<?php for ($i = 0; $i < count($danhmuc); $i++) { ?>
    <div class="wap_item">
        <div class="tieude_giua">
            <div><?= $danhmuc[$i]['ten'] ?></div>
            <div class="xemtatca"><a href="san-pham/<?= $danhmuc[$i]['tenkhongdau'] ?>-<?= $danhmuc[$i]['id'] ?>">Xem tất cả sản phẩm</a></div>
        </div>
        <div class="load_page_<?= $danhmuc[$i]['id'] ?>" data-rel="<?= $danhmuc[$i]['id'] ?>">
            <script type="text/javascript">
                $(document).ready(function () {
                    loadData(1, ".load_page_<?= $danhmuc[$i]['id'] ?>", "<?= $danhmuc[$i]['id'] ?>");
                });
            </script>
        </div>
    </div>
<?php } ?>
<div class="clear"></div>




