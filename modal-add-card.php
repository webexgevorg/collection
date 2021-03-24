<div class="modal fade" id="add_card" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form action="add_collection_form.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Card</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Name of Collection</label>
                        <input type="text" class="form-control" name="first_folder">
                        <br>
                         <label>Description</label>
                        <textarea name ="first_description"class="form-control"></textarea>
                        <br>
                        <input type="hidden" name='id' value="<?php  echo $folder_id?>" class="folder-id">
                        <input type="hidden" name='uid' value="<?php echo $_SESSION['user']; ?>">
                        <input type="hidden" name="card-name" value="" class="card-name">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button type="submit" name="add_card" class="btn btn-primary" style="background: linear-gradient(180deg, rgba(252,217,0,1) 0%, rgba(251,196,0,1) 50%, rgba(250,174,0,1) 100%);border: rgba(252,217,0,1);color: black;padding: 5px 25px !important;">Add</button>
                    </div>
                  </div>
                  </form>
              
                </div>
          </div>