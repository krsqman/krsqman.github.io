
<div class="wap_item">
    <div class="tieude_giua"><div> <?= $title_cat ?></div><span></span>
        <div class="xemtatca"><a>Có <?= $dem['numrows'] ?> sản phẩm</a></div>
    </div>

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
        <?php } ?><?php } ?>

    <div class="clear"></div>
    <div class="pagination"><?= pagesListLimitadmin($url_link, $totalRows, $pageSize, $offset) ?></div>
</div><!---END .wap_item-->