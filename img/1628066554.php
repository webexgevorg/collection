   <?php
session_start();

   ?>
<?php
	$htmlLang = substr($_SERVER['REQUEST_URI'], 1, 2);
	if($htmlLang === "en"){
		$wikiHref = "https://en.wikipedia.org/wiki/Armenia";
	}
	else if($htmlLang === "ru"){
		$wikiHref = "https://ru.wikipedia.org/wiki/Армения";
	}
	else{
		$wikiHref = "https://hy.wikipedia.org/wiki/Հայաստան";
	}
?>
   <footer id="footer">
   	<div class='newm'></div>
      <div class="container">
        <div class="copyright">
          &copy; <span id="year"></span> <strong>Webex Technologies LLC </strong>- All Rights Reserved
 <a href="<?= $wikiHref ?>"><img src="/img/map_armenia.png?2" alt="image map armenia" tittle="Armenia" /></a>
        </div>
        <div class="credits">

        </div>
      </div>
   
    </footer><!-- #footer -->
    
<div class="back-to-top1" id="comments1" style="display: none;"><i class='fa fa-comments icon-comment rotate-reset' style="font-size: 23px"></i></div>
<div id="comments">
  <!-- <div id="d-h">
  <a href="work/profile/" class="" title="Send request" target="blank"><i id ="i-hands" class='fa fa-handshake' style='color:#fff'></i></a>
</div> -->
<div id="d-v">
  <a title="Telegram" href="tg://resolve?domain=@HaykFullStack">
  <i class="fa fa-telegram" id="i-v" style='color:#0088cc;'></i></a>
</div>
<div id="d-w">
    <a  title="WhatsApp" href="whatsapp://send?phone=+37496400073"><i id="i-w" class="fa fa-whatsapp" style="color:#00e676;"></i></a></div>
    <div id="d-f">
    <a title="Facebook" href="https://www.facebook.com/webexarmenia/?fref=ts" class="d-lg-block d-inline facebook" target="blank2" ><i class="fa fa-facebook" style="color:#fff" id="i-f"></i></a>
  </div>
  <div id="d-l">
          <a title="linkedin" href="https://www.linkedin.com/in/webex-technologies-llc-465516182" class="d-lg-block d-inline linkedin" target="blank3"><i class='fa fa-linkedin' style='color:#fff' id="i-l"></i></a></div>
        <?php
if( $lnng=='ru'){
  echo '<div class="en-ru">
          <a id="en" class="lng d-lg-block d-inline " style="color:#fff" href="'.$lng_en.'">EN</a>
        </div>';
  echo '<div class="en-ru">
          <a id="am" class="lng d-lg-block d-inline " style="color:#fff" href="'.$lng_am.'">AM</a>
        </div>';
}
else if( $lnng=='en'){
  echo '<div class="en-ru">
          <a id="ru" class="lng d-lg-block d-inline 
          " style="color:#fff" href="'.$lng_ru.'">RU</a>
        </div>';
  echo '<div class="en-ru">
          <a id="am" class="lng d-lg-block d-inline " style="color:#fff" href="'.$lng_am.'">AM</a>
        </div>';
}
else if($lnng=='am'){
  echo '<div class="en-ru">
          <a id="ru" class="lng d-lg-block d-inline 
          " style="color:#fff" href="'.$lng_ru.'">RU</a>
        </div>';
  echo '<div class="en-ru">
          <a id="en" class="lng d-lg-block d-inline " style="color:#fff" href="'.$lng_en.'">EN</a>
        </div>';
}
else{
 echo '<div class="en-ru">
          <a id="ru" class="lng d-lg-block d-inline 
          " style="color:#fff" href="/ru">RU</a>
        </div>';
 echo '<div class="en-ru">
          <a id="am" class="lng d-lg-block d-inline " style="color:#fff" href="/am">AM</a>
        </div>';
}
?>
</div>
<!--------------modal  ЗАКАЗАТЬ from navbar---------------    -->
<?php 

    if($lnng=='en'){
      echo en_modal;
    }
    else if($lnng=='ru'){
      echo ru_modal;
    }
    else if($lnng=='am'){
      echo am_modal;
    }
    else{
      echo en_modal;
    }
?>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <script src="/lib/jquery/jquery.min.js"></script>
    <!--<script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>-->
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/superfish/superfish.min.js"></script>
    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/sticky/sticky.js"></script>

   <script src="https://unpkg.com/tilt.js@1.1.21/dest/tilt.jquery.min.js"></script>
    <!-- Template Main Javascript File -->
    <script src="/js/main.js"></script>
    <!--<script src="/js/script.js"></script>
    <script src="/js/button.js"></script>-->
    
<script>
    
  var d=new Date();
  var n=d.getFullYear();
  year.innerHTML='2007-'+n;

</script>
<script>

$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      // $('#comments').fadeIn('slow');
      $('#comments1').fadeIn('slow');
   
    } else {
      p=0
      $('#comments').slideUp('slow');
      $('#comments1').fadeOut('slow');
      $('#comments1').css("padding","7px 8px 7px 9px")

$(".icon-comment").removeClass('rotate')
$(".icon-comment").addClass('fa-comments')
$(".icon-comment").removeClass('fa-close')
$(".icon-comment").addClass('rotate-reset')

    }
  });
   // comments--------------
   var p=0
    $("#comments").hide()
   $("#comments1").click(function(){
    p++
    if(p%2!=0){
   $('#comments1').css("padding","7px 10.5px 7px 11px")

    }
    else{
   $('#comments1').css("padding","7px 8px 7px 9px")
    }
    console.log("toggle")
    $("#comments").slideToggle('slow')

$(".icon-comment").toggleClass('rotate')
$(".icon-comment").toggleClass('fa-comments')
$(".icon-comment").toggleClass('rotate-reset')
$(".icon-comment").toggleClass('fa-close')


    $("#comments").css("position", "fixed")

   })

   
</script>
<script src="/js/owl.carousel.min.js"></script>	

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<?php
include "script.php";
?>
