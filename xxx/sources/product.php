<?php if (!defined('_source')) die("Error");

@$id_danhmuc = (int)trim(strip_tags(addslashes($_GET['id_danhmuc'])));
@$id_list = (int)trim(strip_tags(addslashes($_GET['id_list'])));
@$id_cat = (int)trim(strip_tags(addslashes($_GET['id_cat'])));
@$id_item = (int)trim(strip_tags(addslashes($_GET['id_item'])));
@$id = (int)trim(strip_tags(addslashes($_GET['id'])));

//Chi tiết sản phẩm
if ($id != '') {
    //Cập nhật lượt xem
    $sql_lanxem = "UPDATE #_product SET luotxem=luotxem+1 WHERE id ='$id'";
    $d->query($sql_lanxem);

    //Chi tiết sản phẩm
    $sql_detail = "select id,ten$lang as ten,mota$lang as mota,noidung$lang as noidung,masp,gia,giacu,luotxem,thumb,photo,size,mausac,id_danhmuc,id_list,id_cat FROM #_product where hienthi=1 and id='$id' limit 0,1";
    $d->query($sql_detail);
    $row_detail = $d->fetch_array();

    $title_cat = $row_detail['ten'];
    $title = $row_detail['title'];
    $keywords = $row_detail['keywords'];
    $description = $row_detail['description'];

    #Thông tin share facebook
    $images_facebook = 'http://' . $config_url . '/' . _upload_sanpham_l . $row_detail['photo'];
    $title_facebook = $row_detail['ten'];
    $description_facebook = trim(strip_tags($row_detail['mota']));
    $url_facebook = getCurrentPageURL();

    //Hình ảnh khác của sản phẩm
    $sql_hinhthem = "select id,ten$lang as ten,thumb,photo FROM #_hinhanh where id_hinhanh='" . $row_detail['id'] . "' and type='" . $type . "' and hienthi=1 order by stt,id desc";
    $d->query($sql_hinhthem);
    $hinhthem = $d->result_array();

    //Tag sản phẩm
    $d->reset();
    $sql_tags = "select id,ten FROM #_tags where  id IN (select id_tag FROM #_protag where id_pro=" . $row_detail['id'] . ") and type='" . $type . "' order by id desc";
    $d->query($sql_tags);
    $tags_sp = $d->result_array();

    //Đánh giá sao
    $d->reset();
    $sql = "select ROUND(AVG(giatri)) as giatri FROM #_danhgiasao where link='" . getCurrentPageURL() . "' order by time desc";
    $d->query($sql);
    $danhgiasao = $d->fetch_array();

    if ($danhgiasao['giatri'] < 6) {
        $num_danhgiasao = 6;
    } else {
        $num_danhgiasao = $danhgiasao['giatri'];
    };

    //Sản phẩm cùng loại
    $where = " type='" . $type . "' and id_danhmuc='" . (int)$row_detail['id_danhmuc'] . "' and id<>'$id' and hienthi=1 order by stt,id desc";
}
//Danh mục sản phẩm cấp 4
elseif ($id_item != '') {
    $sql = "select id,ten$lang as ten,title,keywords,description FROM #_product_item where id='$id_item' limit 0,1";
    $d->query($sql);
    $title_bar = $d->fetch_array();

    $title_cat = $title_bar['ten'];
    $title = $title_bar['title'];
    $keywords = $title_bar['keywords'];
    $description = $title_bar['description'];

    $where = " type='" . $type . "' and id_item='$id_item' and hienthi=1 order by stt,id desc";
}
//Danh mục sản phẩm cấp 3
elseif ($id_cat != '') {
    $sql = "select id,ten$lang as ten,title,keywords,description FROM #_product_cat where id='$id_cat' limit 0,1";
    $d->query($sql);
    $title_bar = $d->fetch_array();

    $title_cat = $title_bar['ten'];
    $title = $title_bar['title'];
    $keywords = $title_bar['keywords'];
    $description = $title_bar['description'];

    $where = " type='" . $type . "' and id_cat='$id_cat' and hienthi=1 order by stt,id desc";
}
//Danh mục sản phẩm cấp 2
elseif ($id_list != '') {
    $sql = "select id,ten$lang as ten,title,keywords,description FROM #_product_list where id='$id_list' limit 0,1";
    $d->query($sql);
    $title_bar = $d->fetch_array();

    $title_cat = $title_bar['ten'];
    $title = $title_bar['title'];
    $keywords = $title_bar['keywords'];
    $description = $title_bar['description'];

    $where = " type='" . $type . "' and FIND_IN_SET('$id_list', id_list)>0 and hienthi=1 order by stt,id desc";
}

//Danh mục sản phẩm cấp 1
else if ($id_danhmuc != '') {
    $sql = "select id,ten$lang as ten,title,keywords,description FROM #_product_danhmuc where id='$id_danhmuc' limit 0,1";
    $d->query($sql);
    $title_bar = $d->fetch_array();

    $title_cat = $title_bar['ten'];
    $title = $title_bar['title'];
    $keywords = $title_bar['keywords'];
    $description = $title_bar['description'];

    $where = " type='" . $type . "' and FIND_IN_SET('$id_danhmuc', id_danhmuc)>0 and hienthi=1 order by stt,id desc";

}
//Tất cả sản phẩm
else {
    $where = " type='" . $type . "' and hienthi=1 order by stt,id desc";
}

#Lấy sản phẩm và phân trang
$d->reset();
$sql = "SELECT count(id) AS numrows FROM #_product where $where";
$d->query($sql);
$dem = $d->fetch_array();

$totalRows = $dem['numrows'];
$page = $_GET['p'];
if ($id > 0) {
    $pageSize = $company['yahoo']; //Số item cho 1 trang
} else {
    $pageSize = $company['skype']; //Số item cho 1 trang
}
$offset = 5; //Số trang hiển thị				
if ($page == "")
    $page = 1;
else
    $page = $_GET['p'];
$page--;
$bg = $pageSize * $page;

$d->reset();
$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giacu FROM #_product where $where limit $bg,$pageSize";
$d->query($sql);
$product = $d->result_array();
$url_link = getCurrentPageURL();
?>