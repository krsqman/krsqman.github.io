<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107365337-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-107365337-2');
</script>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b5e7cd5df040c3e9e0c121a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
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

<header class="cd-header">
    <a href="" class="cd-logo"><img src="https://sexshop18.vn/upload/hinhanh/logo_sexshop18-1663.jpg" alt="Logo"></a>
    <a  class="cd-3d-nav-trigger"><span></span></a>
    <div class="main_header_menu">
    <a href="#0" class="cd-3d-nav-trigger menu_main_nav"><i style="color: darkviolet;" class="fas fa-venus-mars"></i></a>
    <a href="#0" class="cd-3d-nav-trigger menu_main_nav"><i class="fas fa-mars-double"></i></a>
    <a href="#0" class="cd-3d-nav-trigger menu_main_nav"><i style="color:  deeppink;" class="fas fa-venus-double"></i></a>
    <a href="#0" class="cd-3d-nav-trigger menu_main_nav"><i  class="fas fa-mars"></i></a>
    <a href="#0" class="cd-3d-nav-trigger menu_main_nav"><i style="color:  deeppink;" class="fas fa-venus"></i></a>
</header> <!-- .cd-header -->
	
	<nav class="cd-3d-nav-container">
        
		<ul class="cd-3d-nav">
        <li class="cd-selected">
            <a href=""><i class="fas fa-home"></i></a>
        </li>
        <?php foreach ($product_danhmuc as $key => $value) {?>
            <li id = "<?= $value['id'] ?>">
                <a href="san-pham/<?= $value['tenkhongdau'] ?>-<?= $value['id'] ?>"><?php echo $value['ten']; ?></a>
                
			</li>
        <?php } ?>
		</ul> <!-- .cd-3d-nav -->
    </nav> <!-- .cd-3d-nav-container -->
    <script>
        jQuery(document).ready(function($){
            //toggle 3d navigation
            $('.cd-3d-nav-trigger').on('click', function(){
                toggle3dBlock(!$('.cd-header').hasClass('nav-is-visible'));
            });
            //select a new item from the 3d navigation
            $('.cd-3d-nav').on('click', 'a', function(){
            var selected = $(this);
                id_danhmucr = selected[0].parentNode.id;
                writeCookie('id_product_select',id_danhmucr,2);
            });
            var tmp = readCookie('id_product_select');
            $('.cd-3d-nav li#'+tmp).addClass('cd-selected').siblings('li').removeClass('cd-selected');
            updateSelectedNav('close');
            $(window).on('resize', function(){
                window.requestAnimationFrame(updateSelectedNav);
            });

            function toggle3dBlock(addOrRemove) {
                if(typeof(addOrRemove)==='undefined') addOrRemove = true;	
                $('.cd-header').toggleClass('nav-is-visible', addOrRemove);
                $('.cd-3d-nav-container').toggleClass('nav-is-visible', addOrRemove);
                $('main').toggleClass('nav-is-visible', addOrRemove).one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                    //fix marker position when opening the menu (after a window resize)
                    addOrRemove && updateSelectedNav();
                });
            }

            //this function update the .cd-marker position
            function updateSelectedNav(type) {
                var selectedItem = $('.cd-selected'),
                    selectedItemPosition = selectedItem.index() + 1, 
                    leftPosition = selectedItem.offset().left,
                    backgroundColor = selectedItem.data('color'),
                    marker = $('.cd-marker');

                marker.removeClassPrefix('color').addClass('color-'+ selectedItemPosition).css({
                    'left': leftPosition,
                });
                if( type == 'close') {
                    marker.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                        toggle3dBlock(false);
                    });
                }
            }

            $.fn.removeClassPrefix = function(prefix) {
                this.each(function(i, el) {
                    var classes = el.className.split(" ").filter(function(c) {
                        return c.lastIndexOf(prefix, 0) !== 0;
                    });
                    el.className = $.trim(classes.join(" "));
                });
                return this;
            };

            function writeCookie(name,value,days) {
                var date, expires;
                if (days) {
                    date = new Date();
                    date.setTime(date.getTime()+(days*24*60*60*1000));
                    expires = "; expires=" + date.toGMTString();
                        }else{
                    expires = "";
                }
                document.cookie = name + "=" + value + expires + "; path=/";
            }
            function readCookie(name) {
                var i, c, ca, nameEQ = name + "=";
                ca = document.cookie.split(';');
                for(i=0;i < ca.length;i++) {
                    c = ca[i];
                    while (c.charAt(0)==' ') {
                        c = c.substring(1,c.length);
                    }
                    if (c.indexOf(nameEQ) == 0) {
                        return c.substring(nameEQ.length,c.length);
                    }
                }
                return '';
            }
        });
    </script>
    
