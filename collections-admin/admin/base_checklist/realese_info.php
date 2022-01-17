<div class="col-sm-10 add-bs" style="margin: 0 auto">
    <div class="card stacked-form">
        <div class="card-header ">
            <h4 class="card-title">Add Realese Info</h4>
            <p></p>
        </div>
        <div class="container">
                <span id="message_info"></span>
                <form method="post" id="realese_info">
                    <div class="form-group">
                         <label>Select Collection name</label>
                         <select class="form-control" id="" name='opt_name'>
                            <?php
                                 $sql="SELECT id, name_of_collection, year_of_releases FROM collections";
                                 $result=mysqli_query($con, $sql);
                                    while ($row=mysqli_fetch_assoc($result)) {
                                         echo "<option value='".$row['id']."'>".$row['name_of_collection']."-".$row['year_of_releases']."</option>";
                                    }
                            ?>
                         </select>
                    </div>
                    <div class="form-group">
                        <label>Info collection</label>
                        <textarea rows="10" cols="60" class="form-control" style="height:unset" name="info"></textarea>
                        <input type="hidden" name="hidden" value="info">
                    </div>
                    <input type="submit" name="a_info" class="btn btn-primary btn-add" value="Add Info" />
                </form>
        </div>                
    </div>
</div>   