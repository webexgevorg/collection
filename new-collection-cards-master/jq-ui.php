<?php
include "header.php";
include "config/con1.php";
include "config/con1.php";
include "cookie.php";
/*if(isset($_COOKIE['user']) || isset($_SESSION['user'])){ // qcume er profile-page.php ejy
  header('location:profile-page.php');
}*/

?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/profile-page.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <style >
  *{
    margin: 0;
    padding: 0
  }
  .cards-section{
    margin-top: 200px
  }
    .jq-cont{
       height: auto;
    }
    #sortable, #sortable1{
      position: relative;
      height: 800px;
    }
    /*#sortable div{
      position: relative;
      margin: 5px;
      width: 210px; 
      height: 340px;
      border: 1px solid green;
      cursor: pointer;
      opacity: 0.7;
      background: lightgreen;
      overflow: hidden;
    }*/
    /*#sortable1 img{
      position: relative;
      margin: 5px;
      width: 210px; 
      height: 340px;
      border: 1px solid green;
      cursor: pointer;
      background: #ffe0fb;
    }*/
    .active-card{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7), 0 6px 20px 0 rgba(0, 0, 0, 0.7);
    }
    .editor{
      border: 1px solid;
      background-image: linear-gradient(rgba(254,254,254,.6), rgba(254,254,254,.6)), url('images/ppp.jpg');
      padding-bottom: 200px;
    }
    .edit-position{
      cursor: pointer;
    }
    /*.cont-1{
      position: absolute;
      overflow: hidden;
      opacity: 0.6;
      height: 100%;
      z-index: 1
    }
    */
 </style>
</head>
<body>
    <?php include "cookie.php";?>

     <section class="w-100 cards-section">
      <div class="container jq-cont">
        <span class="edit-position"><i class="fa fa-edit" style="font-size:36px"></i></span>
         <div id="sortable1" class="ui-widget-content w-100 d-flex flex-wrap cont-2">
        <div class="w-100 cont-1"></div>

<?php
    $sl="SELECT * FROM cards WHERE user_id=$user_id";
    $result=mysqli_query($con, $sl);
    while($row=mysqli_fetch_assoc($result)){
      echo "<img src='card-editor/".$row['card']."' style='position: absolute; left: ".$row['left']."px ; top: ".$row['top']."px'
      class='ui-state-default' data-id='".$row['id']."' data-user='".$row['user_id']."'>";
    }

?>
          </div>
      </div>
    </section>
   
<?php
// include "footer.php";
?>
<script>
  $( function() {
    $('.edit-position').click(function(){

       $('#sortable1').addClass('editor')


   $( ".ui-state-default" ).draggable();
       $('.ui-state-default').on( "mouseup",function(){
          $('.ui-state-default').removeClass('active-card')
          $(this).addClass('active-card')
           
          let l=$(this).position().left
          let t=$(this).position().top
          // let l=$(this).offset().left
          // let t=$(this).offset().top
          let c_id=$(this).attr('data-id')
          let u_id=$(this).attr('data-user')

           if(t+$(this).height()>$('#sortable1').outerHeight()){
                    $('#sortable1').css('padding-bottom',$(this).height())
           }

      console.log(l+" offset")
      console.log($(this).position().left+" position")

      $.ajax({
         method: 'post',
         url:'card-editor/position-card.php',
         data: {left: l, top: t, card_id: c_id, user_id: u_id},
         success: function(res){
            // console.log(res+' ---res')
         }
      })
       
    })
    })



    // $( "#sortable" ).sortable();
    // $( "#sortable" ).disableSelection();
    
    
  } );
  </script>

</body>
</html>