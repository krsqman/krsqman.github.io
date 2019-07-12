
<div class="wrapper">
        <div class="welcome"><a href="#" title=""><img src="images/userPic.png" alt="" /></a><span>Xin chào, <?=$_SESSION['login']['username']?>!</span></div>
        <div class="userNav">
            <ul>
                <li><a href="http://<?=$config_url?>" title="" target="_blank"><img src="./images/icons/topnav/mainWebsite.png" alt="" /><span>Vào trang web</span></a></li>
             

                <li><a href="index.php?com=user&act=logout" title=""><img src="images/icons/topnav/logout.png" alt="" /><span>Đăng xuất</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
<?php echo $_SESSION['login']['role']; ?>
<script type="text/javascript">
// check vald for title and description box on post page
$(function () {
    let textAreaBox = $('.description_input'); 
    checkAreaBox(textAreaBox,155,100);
    let textAreaTitle = $('.meta_title_seo');
    checkAreaBox(textAreaTitle,60,50);
})
// checked funtion using length and textbox(string)
function checkAreaBox(textAreaBox = null,max_len = 0, min_len = 0) {
    var len = 0;
    textAreaBox.on('change keyup paste', function() {
        if (textAreaBox[0]) {
            if (textAreaBox[0].value =='') {
                if (textAreaBox[1]) {
                    len = textAreaBox[1].value.length;
                }
                
            } else {
                len = textAreaBox[0].value.length;
            }
        }else{
            len = textAreaBox.value.length; 
        }

        if (len>=max_len || len<=min_len) {
            textAreaBox.removeClass('text_green');
            textAreaBox.addClass('text_red');
        } else {
            textAreaBox.removeClass('text_red');
            textAreaBox.addClass('text_green');
        }
        
    });
    
}
</script>
<!-- custom style for check vald script -->
<style>
.text_red{
    color:red !important;
}
.text_green{
    color:green !important;
}
</style>
