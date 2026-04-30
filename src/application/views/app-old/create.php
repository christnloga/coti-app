
        <div class="container-fluid">
          <div class="mt-4">
            <div class="row">
              <div class="col-6">
                <h3>Add new item</h3>
              </div>
              <div class="col-6 text-right">
                <button id="add_item" class="btn btn-success border-0 d-block d-lg-none">Finish & Save</button>
              </div>
            </div>
          </div>
          <div class="row mb-5 animated fadeIn">
            <div class="col-lg-6">
              <hr class="my-2">

              <!-- <form method="post"> -->
                
                  <div class=" mt-3">
                      <div class="form-group">
                          <label>Item name</label>
                          <input type="text" name="itemname" id="itemname" class="form-control" style="height: 41px;">
                          <?php echo form_error('itemname', '<div class="text-danger mt-2">', '</div>'); ?>
                      </div>
                  </div>
                  <div class="">
                      <div class="form-group position-relative mb-0">
                          <label>Price</label>
                          <input type="text" name="price" id="price" class="form-control" style="padding-left: 60px; height: 41px;">
                          <span class="font-weight-bold text-white bg-default" style="position: absolute;left: 0px;top: 44%; background: rgb(0, 104, 153); padding: 8px 20px; border-radius: 5px 0 0 5px;">€</span>
                      </div>
                      <?php echo form_error('price', '<div class="text-danger mt-2">', '</div>'); ?>
                  </div>
                  <div class="mt-4">
                    <div class="form-group">
                      <label>Description (Opitional)</label>
                      <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>
                  </div>
                  <?php foreach($collections as $collection): ?>
                  <input type="hidden" name="collection_id" id="collection_id" value="<?php echo $collection['col_id']; ?>">
                  <?php endforeach; ?>
                  <div class="mt-4">
                    <div class="form-group">
                      <label>Category</label>
                      <select name="category_id" id="category_id" class="browser-default custom-select border-0 bg-default" style="height: 41px;">
                          <option disabled selected>Choose a category</option>
                          <?php foreach($categories as $category): ?>
                          <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
                          <?php endforeach; ?>                
                      </select>
                    </div>
                  </div>
                  <div class="">
                    <!-- Upload image input-->
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm mt-3">
                        <input id="insert_image" type="file" name="userfile" accept="image/*" class="form-control border-0 d-none userfile" required>
                        <label id="upload-label" for="insert_image" class="font-weight-light text-muted d-none">Choose file</label>
                        <div class="input-group-append">
                          <label for="insert_image" class="btn btn-default m-0 rounded-pill px-4 border-0"> <i class="fas fa-images mr-2 text-white"></i><small class="text-uppercase font-weight-bold text-white">Choose an image</small></label>
                        </div>
                        <?php echo form_error('userfile', '<div class="text-danger ml-3 mt-2">', '</div>'); ?>
                    </div>
                    <button id="add_item" class="btn btn-success border-0 ml-2 rounded-pill d-lg-block d-none">Finish & Save</button>
                  </div>

              <!-- </form> -->

            </div>
            <div class="col-lg-6 mt-4 d-flex justify-content-center">
              <!-- Uploaded image area-->
              <div id="image_demo" class="image-area">
                
              </div>
            </div>
          </div>
