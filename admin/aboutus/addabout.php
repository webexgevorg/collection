<?php
include "../../config/con1.php";
include "../heder.php";

$sql="SELECT * FROM aboutus WHERE id=1";
 $query1=mysqli_query($con, $sql);
  $row1=mysqli_fetch_assoc($query1);


?>
</head>

<link rel="stylesheet" type="text/css" href="">
    <body>
    <?php
    include "../menu.php";
    ?>

     <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-7 add-bs" style="margin: 0 auto">
                    <div class="p-3 card stacked-form">
                        <!-- <button class="btn btn-primary">Add News</button> -->
                        <div class="card-header mb-4">
                            <h4 class="card-title">Add Content</h4>
                        </div>
                       
                        <form>
                            <input type="hidden"  id="id" value="<?php  echo $row1['id'];?>">
                        	<div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="title" value="<?php echo $row1['title'];?>">
                            </div>
                            <div class="form-group">
                                <label for="discription">Discription</label>
                                <textarea class="form-control" id="discription" placeholder="description">
                                    <?php echo $row1['discription']; ?>
                                </textarea>
                            </div>
                        </form>
                        
                        <button  class="btn btn-primary p-2" type="submit" id="Add_About" style="width:120px">Update</button>
                        <p  class="m-5 text-center" id="rezult"></p>
                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
    <?php
    include "../footer.php";
    ?>
   <script src="../my_js/aboutus.js"></script>
   

    </body>
    </html>
