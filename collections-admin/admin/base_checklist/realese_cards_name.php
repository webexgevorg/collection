<div class="col-sm-10 add-bs" style="margin: 0 auto">
    <div class="card stacked-form">
        <div class="card-header ">
            <h4 class="card-title">Add Cards Name</h4>
            <p></p>
            
        </div>
        <div class="container">
            <span id="message_cards"></span>
            <form method="post" id="cards_name_and_number" enctype="multipart/form-data">
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. Name Card</label>
                            <input type="text" placeholder="Name card" class="form-control" name="name_card_1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. Number of cards</label>
                            <input type="text" placeholder="Number card" class="form-control" name="number_card_1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. Name Card</label>
                            <input type="text" placeholder="Name card" class="form-control" name="name_card_2">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. Number of cards</label>
                            <input type="text" placeholder="Number card" class="form-control" name="number_card_2">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. Name Card</label>
                            <input type="text" placeholder="Name card" class="form-control" name="name_card_3">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. Number of cards</label>
                            <input type="text" placeholder="Number card" class="form-control" name="number_card_3">
                        </div>
                    </div>
                </div>
                  <input type="hidden" name="hidden_card_name_number" value="card_name_number">                      
                <input type="submit" class="btn btn-primary btn-add" value="Add cards name" />
            </form>
        </div>                
    </div>
</div>   