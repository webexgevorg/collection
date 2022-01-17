<?php
include "../../config/con1.php";
include "../heder.php";
$arr_producer=['Upper Deck', 'Panini', 'Topps', 'Leaf', 'SeReal', 'Other', 'All','Custom','Other'];
$arr_news_type=['Portal News', 'Manufacture News', 'Releases News', 'Sports News', 'Other News','Select All'];
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sel="SELECT * FROM news WHERE id=$id";
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
                            <h4 class="card-title"><?= $res_row ? " Update News" : "Add News"  ?></h4>
                        </div>
                        <form method="post" id="<?= $res_row ? "updateNews": "add_news" ?>" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title"  name="title" placeholder="title" value="<?= $res_row ? $row_this['title'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="discription">Discription</label>
                                <textarea class="form-control" id="discription" name="discription" placeholder="description"><?= $res_row ? $row_this['discription'] : '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="sporttype">Sports type</label>
                                <select  class="form-control" id="sporttype" name="sporttype">
                                    <?php

                                    $sql_news="SELECT*FROM sports_type";
                                    $query_news=mysqli_query($con,$sql_news);
                                    while($row=mysqli_fetch_assoc($query_news)){
                                        echo $row['sport_type']==$row_this['sport'] ?
                                             "<option selected>".$row['sport_type']."</option>" : 
                                             "<option>".$row['sport_type']."</option>";

                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="producer">Manufacture</label>
                                <select  class="form-control" id="producer" name="producer">
                                   <?php
                                   foreach ($arr_producer as $key => $value) {
                                    echo $value==$row_this['producer'] ?
                                        "<option selected>".$row_this['producer']."</option>" : 
                                        "<option>".$value."</option>";
                                   }
                                   ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="newstype">All News</label>
                                <select  class="form-control" id="newstype" name="newstype">
                                <?php
                                   foreach ($arr_news_type as $key => $value) {
                                    echo $value==$row_this['news_type'] ?
                                        "<option selected>".$row_this['news_type']."</option>" : 
                                        "<option>".$value."</option>";
                                   }
                                   ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="img1">Image 1('jpg','jpeg','png','gif')</label>
                                <input type="file" class="form-control" id="img1" name="<?= $res_row ? "img1":"img[]" ?>" value=''>
                                <input type="hidden" name="$row_this['img1']">
                                <div style="<?= $res_row? 'height:70px;width:70px':'display:none'?>"><img class="img-fluid" src="<?= $res_row ? 'uploads/'.$row_this['img1']:'' ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="img2">Image 2('jpg','jpeg','png','gif')</label>
                                <input type="file" class="form-control" id="img2" name="<?= $res_row ? "img2" : "img[]" ?>" value="">
                                <!-- <input type="hidden" name="$row_this['img2']"> -->
                                <div style="<?= $res_row? 'height:70px;width:70px':'display:none'?>"><img class="img-fluid" src="<?= $res_row ? 'uploads/'.$row_this['img2']:'' ?>"></div>
                            </div>
                            <div class="form-group">
                                <label for="img3">Image 3('jpg','jpeg','png','gif')</label>
                                <input type="file" class="form-control" id="img3" name="<?= $res_row ? "img3" : "img[]" ?>" value="">
                                <!-- <input type="hidden" name="$row_this['img2']"> -->
                                <div style="<?= $res_row? 'height:70px;width:70px':'display:none'?>"><img class="img-fluid" src="<?= $res_row ? 'uploads/'.$row_this['img3']:'' ?>"></div>
                            </div>
                            <div class="form-group">
                            <label for="img3">If you click on it, this news will appear in the list of important</label><br>
                                <input type="checkbox" id='important' name='important' value='<?=$res_row? $row_this['important']: 0 ?>'>
                            </div>
                          <input type='hidden' id="this-id" name="this_id" value="<?= $res_row ? $row_this['id'] : '' ?>">
                         
                          <button   class="btn btn-primary <?= $res_row ? 'updateNews' : 'addNews' ?> p-2" type="submit" name="submit"  style="width:120px"><?= $res_row ? 'Update news' : 'Add news' ?></button>
                        </form>
                        
                       
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
    <script>
         $('#important').on('change',function(){
        
        if($(this).prop('checked')==true){
      
           $(this).val(1)
        }else{
            $(this).val(0)
        
        }
      
    })
    if($('#important').val()==1){
        $('#important').prop('checked',true)
    }
    </script>
   <script src="../my_js/add_news.js"></script>
   <script src="../my_js/update_news.js"></script>
   

    </body>
    </html>
