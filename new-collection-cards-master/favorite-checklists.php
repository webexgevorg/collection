<?php
include "header.php";
include "config/con1.php";
require_once "user-logedin.php";
if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }
}


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/my_checklist.css">
</head>
<body>
<?php include "cookie.php"; ?>
<section style="height: 100px"></section>
<section class="section1 mt-5">
    <div class="my-5 container">
        <h2 class="text-center mb-5">FAVORITE CHECKLISTS</h2>
        <div class="w-100 cards mb-5 " >
        <?php 
        $sql="SELECT * FROM favorite_checklists where user_id=$user_id";
        $query=mysqli_query($con, $sql);
        $num_rows=mysqli_num_rows($query);
           if($num_rows>0){  
        ?>
            <table class="table" id="checklists" >
                <tbody  >
                    <?php
                        $count = 0;
                            while($row=mysqli_fetch_assoc($query)){
                                $count++;
                                // --- petq e poxel ------------
                                // $tblName=$row['checklist_type'];
                                $tblName='collections';
                                $checklist_name="SELECT name_of_collection FROM collections WHERE id=$row[checklist_id]";
                                $query_checklist_name=mysqli_query($con, $checklist_name);
                                $row_name=mysqli_fetch_assoc($query_checklist_name);
                                echo "<tr data-collId='".$row['id']."' class='tr_checklist'>
                                    <td>".$count."</td>
                                    <td>".$row_name['name_of_collection']."</td>
                                    <td>
                                       <i class='fa fa-star mr-2' style='font-size:30px; color:#6EA4AE;'></i>
                                       <i class='fa fa-trash' style='font-size:30px; color: #6EA4AE'></i></td>
                                </tr>";
                            }
                    ?>
                </tbody>
            </table>
        <?php
        }
         else{
            echo "<div class='text-center'>Nothing found</div>";
        }
        ?>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>
</body>
</html>