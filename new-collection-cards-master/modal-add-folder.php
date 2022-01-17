<div class="modal fade" id="add_folder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form action="add_collection_form.php" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add folder</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Name of Collection</label>
                        <input type="text" class="form-control f-name" name="first_folder">
                        <br>
                         <label>Description</label>
                        <textarea name ="first_description" class="form-control f-description"></textarea>
                        <br>
                        <label>Image</label>
                        <input type="hidden" name='id' value="<?php echo $tox['id']; ?>">
                        <input type="hidden" name='uid' value="<?php echo $_SESSION['user']; ?>">
                        <input class="form-control f-file" type="file" name="file">
                      </div>
                      <input type="hidden" name="folder_position" value="" class="folder-position">
                      <div class="message-folder"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="" name="add_folder" class="btn btn-primary " aria-label="Open" id="addFolder">Add</button>
                    </div>
                  </div>
                  </form>
                </div>
          </div>
            