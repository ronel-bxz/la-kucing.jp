<!-- footer -->
<footer>
  <div class="container-fluid footer">
    <div class="container px-0">
      <div class="row">
        <div class="col-md-12 col-lg-8 first ">
          <div class="nav">
            <ul>
              <li><a href="">製品情報</a></li>
              <li><a href="">会社情報</a></li>
              <li><a href="">個人情報保護方針</a></li>
              <li><a href="">サイト利用について</a></li>
              <li><a href="">お問い合わせ</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <ul class="social-media">
              <li><a href=""><img src="images/facebook-icon.png"></a></li>
              <li><a href=""><img src="images/twitter-icon.png"></a></li>
              <li><a href=""><img src="images/instagram-icon.png"></a></li>
            </ul>
        </div>
      </div>
      
   <p class="copy py-0">Copyright KOKI. All Rights Reserved.</p>
    </div>
  </div>

  <a href="javascript:;" id="go-up" class="go-up">
    <img src="images/go-up.png">
  </a>
</footer>
</main>
<script>
    var scrollTop = $("#go-up");
    $(window).scroll(function() {
      var topPos = $(this).scrollTop();
      if (topPos > 700) {
        $(scrollTop).css("opacity", "1");

      } else {
        $(scrollTop).css("opacity", "0");
      }

    });

    //scroll to top
    $("#go-up").click(function() {
      $("html, body").animate({ scrollTop: 0 }, "slow");
      return false;
    });

$(function(){
  $('.menu-trigger').on('click',function(){
    if($(this).hasClass('active')){
      $(this).removeClass('active');
      $('main').removeClass('open');
      $('nav').removeClass('open');
      $('.overlay').removeClass('open');
      $('.menu').css('color','#000');
      $('.wrapper').css('overflow-y','scroll');
    } else {
      $(this).addClass('active');
      $('main').addClass('open');
      $('nav').addClass('open');
      $('.overlay').addClass('open');
      $('.menu').css('color','#fff');
      $('.wrapper').css('overflow','hidden');
    }
  });
  $('.overlay').on('click',function(){
    if($(this).hasClass('open')){
      $(this).removeClass('open');
      $('.menu-trigger').removeClass('active');
      $('main').removeClass('open');
      $('nav').removeClass('open');
      $('.menu').css('color','#000');
      $('.wrapper').css('overflow-y','scroll');    
    }
  });
});

 $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();
        if(scrollTop > 90) {
           $('.header-fixed').addClass("shadow");
        } else {
            $('.header-fixed').removeClass("shadow");
        }
    });
</script>

</body>
</html>