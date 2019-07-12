<?php
session_start();
$session = session_id();

@define('_source', './sources/');
@define('_lib', './@admin/lib/');

include_once _lib . "Mobile_Detect.php";
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
if ($deviceType == 'phone') {
    @define('_template', './m/');
} else {
    @define('_template', './templates/');
}

$lang_default = array("", "en");
if (!isset($_SESSION['lang']) or ! in_array($_SESSION['lang'], $lang_default)) {
    $_SESSION['lang'] = '';
}
$lang = $_SESSION['lang'];

require_once _source . "lang$lang.php";
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "class.database.php";
include_once _lib . "functions_user.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "file_requick.php";
include_once _source . "counter.php";

if ($_REQUEST['command'] == 'add' && $_REQUEST['productid'] > 0) {
    $pid = $_REQUEST['productid'];
    addtocart($pid, 1);
    redirect("gio-hang.html");
}
?>

<!doctype html>
<html lang="vi">

    <head>
        <base href="http://<?= $config_url ?>/"  />
        <?php if ($deviceType == 'phone') { ?>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />
            <link href="css/default_mobi.css" type="text/css" rel="stylesheet" />
            <link href="style_mobi.css" type="text/css" rel="stylesheet" />
        <?php } else { ?>
            <meta name="viewport" content="width=1200">
            <link href="css/default.css" type="text/css" rel="stylesheet" />
            <link href="style.css" type="text/css" rel="stylesheet" />
        <?php } ?>  
        <?php include _template . "layout/seoweb.php"; ?>
        <?php include _template . "layout/js_css.php"; ?> 
        <?= $company['codethem'] ?>     
    </head>

    <?php include _template . "layout/background.php"; ?>
    <!-- <body onLoad=" initialize();" <?= $str_background ?>> -->
    <body onLoad=" initialize();">
        <div id="pre-loader"><div class="loader"></div></div>
        <h1 class="vcard fn" style="position:absolute; top:-1000px;"><?php
            if ($title != '')
                echo $title;
            else
                echo $seo['title'];
            ?></h1>
        <h2 style="position:absolute; top:-1000px;"><?php
            if ($title != '')
                echo $title;
            else
                echo $seo['title'];
            ?></h2>
        <h3 style="position:absolute; top:-1000px;"><?php
            if ($title != '')
                echo $title;
            else
                echo $seo['title'];
            ?></h3>

        <?php if ($deviceType == 'phone') { ?>
            <div id="wapper">
                <div id="wap_header">
                    <div id="header">
                        <?php include _template . "layout/header.php"; ?>
                        <div class="clear"></div>
                    </div><!---END #header-->
                </div><!---END #header-->

                <div id="menu_mobi">
                    <?php include _template . "layout/menu_mobi.php"; ?>
                </div><!---END #menu_mobi-->
				
                <div id="slider">
				
                    <?php include _template . "layout/slider_jssor.php"; ?>
				
                </div><!---END #slider-->
				

                <div id="main_content">

                    <?php include _template . $template . "_tpl.php"; ?> 
                    <div class="clear"></div>
                </div><!---END #main_content-->
            </div><!---END #wapper-->
            <?php include _template . "layout/fanpage.php"; ?>
            <div id="wap_footer">
                <div id="footer">
                    <!-- <?php include _template . "layout/footer.php"; ?> -->
                    <div class="clear"></div>
                </div><!---END #footer--> 
            </div><!---END #footer--> 

            
            <?php include _template . "layout/phone2.php"; ?>
        <?php } else { ?>
            <div id="wap_header">
                <div id="header">
                    <?php include _template . "layout/header.php"; ?>
                </div><!---END #header-->
                <div class="clear"></div>
            </div><!---END #header-->
            <main>
            <div id="wapper">
                <!-- <div id="wap_menu">
                    <div id="menu"> -->
                        <?php 
                        // include _template . "layout/menu_top.php"; 
                        ?>
                    <!-- </div> -->
                    <!---END #menu-->
                <!-- </div> -->
                <!---END #menu-->
				<?php if($_GET['com']==''||$_GET['com']=='index'){ ?>
                <div id="slider">
                    <?php include _template . "layout/slider_jssor.php"; ?>
                </div><!---END #slider-->
				<?php } ?>
                <div id="main_content">
                     <div id="right">
                        <?php include _template . $template . "_tpl.php"; ?> 
                    </div>
                    <div id="left">
                        <?php include _template . "layout/left.php"; ?>
                    </div>
                    <div class="clear"></div>
                </div><!---END #main_content-->
            </div><!---END #wapper-->
            
            <div id="wap_bottom">
                <div id="bottom">
                    <?php include _template."layout/bottom.php"; ?>
                    <div class="clear"></div>
                </div><!---END #bottom--> 
            </div><!---END #wap_bottom--> 

            <div id="wap_footer">
                <div id="footer">
                    <?php include _template . "layout/footer.php"; ?>
                    <div class="clear"></div>
                </div><!---END #footer--> 
            </div><!---END #footer--> 

            <div id="wap_copy">
                <div id="copy">
                    <div style="text-align:center">2018 © Sexshop18.vn</div>
                    <!-- <?php include _template . "layout/copy.php"; ?> -->
                    <div class="clear"></div>
                </div><!---END #footer--> 
            </div><!---END #footer--> 
            </main>
        <?php } ?>

    </body>
</html>
