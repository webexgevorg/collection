<?php

use function Complex\ln;

include "header.php";
include "config/con1.php";
require_once "user-logedin.php";
?>
<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/user_collections.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
 
<style>
thead input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    thead {
    background: #6ea4ae;
    font-size: 14px !important;
    text-align: center;
}
</style>
</head>
<body>
<?php include "cookie.php"; ?>
<?php 
   $releases="SELECT id, name_of_collection FROM collections";
   $res=mysqli_query($con, $releases);

   if(isset($_POST['sel-name'])){
      $rel_id=$_POST['sel-name'];
      $check_list="SELECT * FROM base_checklist WHERE realese_id=$rel_id";
      $res_list=mysqli_query($con, $check_list);
   }
?>

<section class="hidden"></section>
<section class="container mt-5 text-center">
    <div class="row">
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
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
               
                <th>Salary</th>
            </tr>
            <tr>
            <th class="th">Name</th>
                <th class="th">Position</th>
                <th class="th">Office</th>
                <th class="th">Age</th>
                
                <th class="th">Salary</th></tr>
        </thead>
        <tbody>
            
            <?php
                while($row_list=mysqli_fetch_assoc($res_list)){
                    echo "<tr><td>".$row_list['card_name']."</td>
                          <td>".$row_list['team']."</td>
                          <td>".$row_list['set_type']."</td>
                          <td>".$row_list['parallel']."</td>
                          <td>".$row_list['print_run']."</td></tr> ";
                }
                ?>
       
       
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>

    </div>
</section>









<?php include "footer.php" ?>
<!-- <script src=""></script> -->
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead .th').each( function () {
        var title = $(this).text();
        $(this).html( '<div class="input-group"> <input  class="form-control inpt2" type="text" placeholder="Search" aria-label="Search"> <button class="btn btn-srch" style="border-radius:0;"><i class="fa fa-search btn" aria-hidden="true"></i></button>  </div>' )
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );
</script>
</body>
</html>
