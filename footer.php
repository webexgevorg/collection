<?php
$sql="SELECT * FROM footer";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($res);
?>
<section id="footer">
    <div class="container">
        <div class="row row-collection">
            <div class="col-md-3 col-sm-6 col-xs-12 row-div">
                <p><?php echo $row['title1']?></p>
                <p><?php echo $row['text1']?></p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 row-div">
                <p><?php echo $row['title2']?></p>
                <p><?php echo $row['text2']?></p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 row-div">
                <p><?php echo $row['title3']?></p>
                <p><?php echo $row['text3']?></p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 row-div social-col d-flex justify-content-center">
                <div classs="social-center">
                <p>Social media</p>
                <div class="d-flex justify-content-center">
                     <div class="social-div">
                         <a href="https://www.facebook.com/Card-Collection-268222843700522/" target="_blank">
                             <i id="i-facebook" class="fa fa-facebook"></i>
                         </a>
                     </div>
                     <div class="social-div">
                         <a href="https://twitter.com/" target="_blank">
                             <i class="fa fa-twitter"></i>
                         </a>
                     </div>
                     <div class="social-div">
                         <a href="https://www.instagram.com/" target="_blank">
                             <i class="fa fa-instagram"></i>
                         </a>
                     </div>
                     <div class="social-div i-telegram">
                         <a href="https://web.telegram.org/#/login" target="_blank">
                             <i class="fab fa-telegram-plane" aria-hidden="true"></i>
                         </a>
                     </div>
                </div>
                <button class="social-button" data-toggle="modal" data-target="#exampleModal">Subscribe to update</button>
              </div>
            </div>
        </div>
    </div>
</section>
<section id="under-footer">
    <div class="container text-right">
    <p>&copy WEBEX TECHNOLOGIES LLC &copy<span id="year"></span><p>
    </div>
</section>
<!----------------------------modal for subscribe------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subscribe to update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Please enter your email address below to subscribe from FollowMyCollection email updates.</p>
        <input class="mail subscribe_mail form-control place_inp" placeholder="email">
               <p></p>
              <button class="submi subscribe_btn btn subscribe">Subscribe to update</button>
             <div class="result"></div>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------------------------------->
<script src="js/footer.js"></script>
<script src="js/subscribe.js"></script>
<script src="googleTranslate/googleTranslate.js"></script>
<script>
    
$('.dropdown-menu > .dropdown > a').addClass('dropdown-toggle');

$('.dropdown-menu a.dropdown-item').on('mouseover', function(e) {

  $(this).parent().parent().prev('.dropdown-item').css('background', 'rgb(110,164,174)')
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");

  }

  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');

  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    // $(this).parent().parent().prev('.dropdown-item').css('background', 'red')
    console.log(e)
    $('.dropdown-menu > .dropdown .show').removeClass("show");
  });

  return false;
});
$('.dropdown-menu a.dropdown-item').on('mouseout', function(e) {
  console.log('out')
  if($(this).hasClass('main-a')){
    if (!$(this).next().hasClass('show')) {
        $(this).parent().parent().find('.dropdown-item').css('background', 'unset')
     }
  }
  else{
    if (!$(this).next().hasClass('show')) {
         $(this).parent().parent().prev('.dropdown-item').css('background', 'unset')
     }
  }
  

})
</script>