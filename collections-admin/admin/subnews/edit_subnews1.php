<?php
include "../../config/con1.php";
include "../heder.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sel="SELECT * FROM subnews WHERE id=$id";
    $res=mysqli_query($con, $sel);
    if(mysqli_num_rows($res)==1){
        $res_row=true;
        $row_this=mysqli_fetch_assoc($res);
    }
    else{
        $res_row=false;
    }
}
else{
    $res_row=false;
}

?>
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
                            <h4 class="card-title">Edit SubNews</h4>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="subnews_name">SubNews name</label>
                                <input type="text" class="form-control" id="subnews_name" placeholder="SubNews name" value="<?= $res_row ? $row_this['title'] : '' ?>">
                            </div>
                          <input type='hidden' id="this-id" value="<?= $res_row ? $row_this['id'] : '' ?>">
                        </form>
                        
                        <button   class="btn btn-primary <?= $res_row ? 'updateSubNews' : 'addSubNews' ?> p-2" type="submit"  style="width:120px"><?= $res_row ? 'Update SubNews' : 'Add SubNews' ?></button>
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
   <script src="../my_js/add_subnews.js"></script>
   <script src="../my_js/update_news.js"></script>

    </body>
    </html>
