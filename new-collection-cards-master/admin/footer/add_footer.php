<?php
include "../heder.php";
include "../../config/con1.php";
$sql="SELECT * FROM footer";
$res=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($res);

?>
<body>
<?php
include "../menu.php";

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 add-bs" style="margin: 0 auto">
                <div class="card stacked-form">
                    <div class="card-header ">
                        <h4 class="card-title">Add Footer</h4>
                        <p></p>
                        <div>
                            <div class="text-success">
                                <h5><?php echo $_SESSION['success']; ?></h5>
                            </div>

                        </div>
                    </div>
                    <form method="post" action="changeFooter.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title1</label>
                            <input type="text"  class="form-control" name="z1" value='<?php echo $row['title1']; ?>'>
                        </div>
                        <div class="form-group">
                            <label>Text1</label>
                            <input type="text" class="form-control" name="z2" value="<?php echo $row['text1']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Title2</label>
                            <input type="text"  class="form-control" name="z3" value="<?php echo $row['title2']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Text2</label>
                            <input type="text"  class="form-control" name="z4" value='<?php echo $row['text2']; ?>'>
                        </div>
                        <div class="form-group">
                            <label>Title3</label>
                            <input type="text" class="form-control" name="z5" value="<?php echo $row['title3']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Text3</label>
                            <input type="text"  class="form-control" name="z6" value="<?php echo $row['text3']; ?>">
                        </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-fill btn-add" name="btn-connect">Submit</button>
                        </div>
                    </form>
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