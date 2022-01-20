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
        <div class="row">
            <div class="col-sm-10 add-bs" style="margin: 0 auto">
                <div class="card stacked-form">
                    <div class="card-header ">
                        <h4 class="card-title">Add Store Rating</h4>
                        <p></p>

                    </div>
                    <form method="post" action="change_store.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <ul id="ul">
                                <label>Title</label>
                                <li>
                                    <textarea  class="form-control" name="z1"></textarea>
                                </li>
                                <label>Intotitle1</label>
                                <li>
                                    <textarea  class="form-control" name="z2"></textarea>
                                </li>
                                <label>Intotitle2</label>
                                <li>
                                    <textarea  class="form-control" name="z3"></textarea>
                                </li>
                                <label>Text</label>
                                <li>
                                    <textarea  class="form-control" name="z4"></textarea>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label>Add</label>
                            <input type="file" name="store" class="inp1">
                        </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-fill btn-add" name="storerating">Add</button>
                        </div>
                    </form>
                </div>



        </div>
    </div>
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