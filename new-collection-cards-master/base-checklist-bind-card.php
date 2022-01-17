<?php

use function Complex\ln;

include "header.php";
include "config/con1.php";
require_once "user-logedin.php";
if(empty($_GET['link'])){
   header('location: index.php');
}
else{
    $link=$_GET['link'];
}
?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/user_collections.css">
<link rel="stylesheet" type="text/css" href="css/base_checklist.css">
<link rel="stylesheet" type="text/css" href="css/base-checklist-bind-card.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
</head>
<body>
<?php include "cookie.php"; ?>
<?php 
   $releases="SELECT id, name_of_collection FROM collections";
   $res=mysqli_query($con, $releases);

   if(isset($_POST['sel-name'])){
      $rel_id=$_POST['sel-name'];
   }
   else{
       $releases_1="SELECT id FROM collections LIMIT 1";
       $res_1=mysqli_query($con, $releases_1);
       $row_1=mysqli_fetch_assoc($res_1);
       $rel_id=$row_1['id'];
   }
      $check_list="SELECT * FROM base_checklist WHERE realese_id=$rel_id";
      $res_list=mysqli_query($con, $check_list);
?>

<section class="hidden"></section>
<section class="container mt-5 text-center">
    <div class="row mb-2">
      <form method="post" action class="w-100">                            
        <div class="form-group">
             <label>Chose Collection Name</label>
            <select class="form-control select" onchange="this.form.submit()" name='sel-name'>
            <?php
                while($row=mysqli_fetch_assoc($res)){
                    if(isset($_POST['sel-name']) && $_POST['sel-name']==$row['id']){
                        echo "<option value=".$row['id']." name='opt-id' selected>".$row['name_of_collection']."</option>";

                    }
                    else{
                     echo "<option value=".$row['id']." name='opt-id'>".$row['name_of_collection']."</option>";

                    }
                }
            ?>
            </select>
        </div>
      </form>    
      <form >
    </div>
</section>
<section class="container">
   <div class="row">
      <table id="example" class="display table table-hover" style="width:100%">
        <thead>
            <tr>
               <th>ID</ht>
               <th>Card Number</th>
                <th>Card Name</th>
                <th>Team</th>
                <th>Parallel</th>
                <th>Print Run</th>
                <th>ction</th>
            </tr>
            <tr>
                <td></td>
                <td class="srch"></td>
                <td class="srch"></td>
                <td class="srch"></td>
                <td class="srch"></td>
                <td class="srch"></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
                $count=0;
                while($row_list=mysqli_fetch_assoc($res_list)){
                        $count++;
                        echo "<tr data-coll-id=".$row_list['realese_id'].">
                             <td>".$count."</td>
                             <td>".$row_list['card_number']."</td>
                             <td class='card-name'>".$row_list['card_name']."</td>
                             <td>".$row_list['team']."</td>
                             <td>".$row_list['parallel']."</td>
                             <td>".$row_list['print_run']."</td>
                             <td><button class='px-3 py-1 bind' data-card-id=".$row_list['id']." data-link=".$link.">Bind</button></td>
                         </tr> ";
                }
                ?>
        </tbody>
      </table>
    </div>
</section>

<?php include "footer.php" ?>
<script>
$(document).ready(function() {
    $('#example thead .srch').each( function () {
        $(this).removeClass('sorting')
        $(this).html( '<div class="input-group"> <input  class="form-control inpt2" type="text" placeholder="Search" aria-label="Search"> <button class="btn btn-srch" style="border-radius:0;"><i class="fa fa-search btn" aria-hidden="true"></i></button>  </div>' )
    } );
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            this.api().columns().every( function () {
                var that = this;
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
                $('input', this.header()).on('click', function(e) {
        e.stopPropagation();
    });
            } );
        }
    });
    var table = $('#example').DataTable()
    table.on('click', '.bind', function(){
        let bind_coll_id=$(this).parent().parent().attr('data-coll-id')
        let bind_card_id=$(this).attr('data-card-id')
        let card_name=$(this).parent().parent().find('.card-name').html()
        console.log(card_name)
        let link=$(this).attr('data-link')+'.php'
        $.ajax({
            method: 'post',
            url: 'bind-card-session.php',
            data: {bind_card_id: bind_card_id, bind_coll_id: bind_coll_id, card_name: card_name},
            success: function(res){
               if(res){

                location.href=link
               }
            }
        })
    })
 
} );
</script>
</body>
</html>
