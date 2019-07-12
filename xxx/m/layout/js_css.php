<link href="css/popup.css" type="text/css" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js" ></script>
<script type="text/javascript" src="js/my_script.js"></script>
<script src="js/plugins-scroll.js" type="text/javascript" ></script>
<link href="fontawesome/css/font-awesome.css" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="css/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
<script type="text/javascript" src="js/slick.min.js"></script>
<!-- slick -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.video1').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: true, //Tự động chạy
            autoplaySpeed: 5000, //Tốc độ chạy
            asNavFor: '.video2'
        });
        $('.video2').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.video1',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            vertical: true, //Chay dọc
        });
    });
</script>
<!-- slick -->

<!--lazyload-->
<script type="text/javascript" src="js/jquery.lazyload.pack.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".item img").lazyload({
            //placeholder : "images/load.gif",
            effect: "fadeIn",
        });
    });
</script>
<!--lazyload-->

<!--Thêm alt cho hình ảnh-->
<script type="text/javascript">
    $(document).ready(function (e) {
        $('img').each(function (index, element) {
            if (!$(this).attr('alt') || $(this).attr('alt') == '')
            {
                $(this).attr('alt', '<?= $company['ten'] ?>');
            }
        });
    });
</script>
<!--Thêm alt cho hình ảnh-->

<!--Tim kiem-->
<script language="javascript">
    function doEnter(evt) {
        var key;
        if (evt.keyCode == 13 || evt.which == 13) {
            onSearch(evt);
        }
    }
    function onSearch(evt) {

        var keyword = document.getElementById("keyword").value;
        if (keyword == '' || keyword == '<?= _nhaptukhoatimkiem ?>...')
        {
            alert('<?= _chuanhaptukhoa ?>');
        } else {
            location.href = "tim-kiem.html&keyword=" + keyword;
            loadPage(document.location);
        }
    }
</script>   
<!--Tim kiem-->

<!--Code gữ thanh menu trên cùng-->
<script type="text/javascript">
    $(document).ready(function () {
        $(window).scroll(function () {
            var cach_top = $(window).scrollTop();
            var heaigt_header = $('#wap_header').height();

            if (cach_top >= heaigt_header) {
                $('#wap_menu').css({position: 'fixed', top: '0px', zIndex: 99});
                $('.search').addClass('search_fix');
            } else {
                $('#wap_menu').css({position: 'relative'});
                $('.search').removeClass('search_fix');
            }
        });
    });
</script>
<!--Code gữ thanh menu trên cùng-->
<!--Mua hàng-->
<!--Mua hÃ ng-->
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
<!--Mua hÃ ng-->
<!--Mua hàng-->