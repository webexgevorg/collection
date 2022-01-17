<?php
include "../../config/con1.php";
include "../heder.php";
//$sql="SELECT * FROM footer";
//$res=mysqli_query($con, $sql);
//$row=mysqli_fetch_assoc($res);

?>
<body>
<?php
include "../menu.php";

?>

<div class="content">
    <div class="container-fluid">
        <div class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
            <input class="form-control form-control-sm mr-3 w-75 searchValue" type="text" placeholder="Search"
                   aria-label="Search">
            <input type="submit" value="Search" class="search">
        </div>
        <?php
        if(isset($_SESSION['intotitle'])){
            $into = $_SESSION['intotitle'];
            $sql = "SELECT * FROM store_rating WHERE intotitle1 LIKE '%$into%'";
            $res = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($res);
            echo "
           <div class='row'>
            <div class='col-sm-10 add-bs' style='margin: 0 auto'>
                <div class='card stacked-form'>
                    <div class='status'>
             <form method='post' action='change_store.php' enctype='multipart/form-data'>
                             <div class='form-group'>
                                <ul id='ul'>
                                    <label>Title</label>
                                    <li>
                                        <textarea  class='form-control' name='z1'>" . $row['title'] . "</textarea>
                                    </li>
                                    <label>Intotitle1</label>
                                    <li>
                                        <textarea  class='form-control' name='z2'>" . $row['intotitle1'] . "</textarea>
                                    </li>
                                    <label>Intotitle2</label>
                                    <li>
                                        <textarea  class='form-control' name='z3'>" . $row['intotitle2'] . "</textarea>
                                    </li>
                                    <label>Text</label>
                                    <li>
                                        <textarea  class='form-control' name='z4'>" . $row['text'] . "</textarea>
                                    </li>
                                    <br>
                                    <div class='form-group'>
                                        <label>Add</label>
                                        <input type='file' name='store' class='inp1'>
                                    </div>
                                    <input type='hidden' name='picture' value='" . $row["id"] . "'/>
                                    <div class='card-footer '>
                                        <button type='submit' class='btn btn-fill btn-add' name='send'>Update</button>
                                    </div>
                                </ul>                             
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                            <br>
                            <hr>";
        }else{
            ?>
            <div class="status">



                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>
<?php
include "../footer.php";
?>
<script>
    $(".search").click(function(){
        var search = $(".searchValue").val();

        $.post(
            "change_store.php",
            {search:search},
            function (ard) {
                $(".status").html(ard)
            }
        )
    })
    $('.select').change(function(){
        if($(this).val()=='Other sport'){
            $('html select').after("<input type='text' placeholder='Enter sport type' class='form-control' name='other-sport-type'>");
            $(this).remove()
        }
    })
    $('#add_input').click(function(){
        $('#ul').append('<li><input type="text" placeholder="" class="form-control" name="desc[]"></li>')
    })



</script>

</body>
</html>