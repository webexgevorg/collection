<div class="col-sm-10 add-bs" style="margin: 0 auto">
    <div class="card stacked-form">
        <div class="card-header ">
            <h4 class="card-title">Import Excel</h4>
            <p></p>
        </div>
        <div class="container">
            <span id="message"></span>
            <form method="post" id="import_excel_form" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Select Collection name</label>
                    <select class="form-control" id="sel_rel_name" name='opt_name'>
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
                    <label>Select excel file</label>
                    <input type="file" name="import_excel" class="form-control" />
                </div>
                <input type="submit" name="import" id="import" class="btn btn-primary btn-add" value="Import" />
            </form>
            <a href="infographic.php"><button class="btn btn-add">Infographic</button></a>
        </div>
    </div>
</div>       
    