  <div class="container-fluid">

    <!-- CHANGE GENERAL INFO SECTION -->
    <div class="mt-3">
      <h3>Edit general informaion</h3>
    </div>
    <div class="row mb-5 animated fadeIn">
      <div class="col-lg-6">
        <hr class="my-2">
        <div id="left_edit">
          <form method="post" id="edit_form">

            <input type="hidden" name="item_id" value="<?php echo $items['item_id']; ?>">

            <div class="item-price mt-3">
                <div class="form-group">
                    <label>Item name</label>
                    <input type="text" name="itemname" class="form-control  z-depth-1" value="<?php echo $items['item_name']; ?>" style="height: 41px;" required>
                </div>
            </div>

            <div class="item-price">
                <div class="form-group position-relative mb-0">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value="<?php echo $items['price']; ?>" style="padding-left: 60px; height: 41px;" required>
                    <span class="font-weight-bold text-white bg-primary" style="position: absolute;left: 0px;top: 44%; background: rgb(0, 104, 153); padding: 8px 20px; border-radius: 5px 0 0 5px;">€</span>
                </div>
            </div>

            <div class="mt-4">
              <div class="form-group">
                <label>Description (Opitional)</label>
                <textarea class="form-control" name="description" id="description" rows="3"><?php echo $items['description']; ?></textarea>
              </div>
            </div>

            <div class="mt-4">
              <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="browser-default custom-select border-0" style="height: 41px;">
                <option disabled selected><?php echo $items['cat_name']; ?></option>
                  <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
                  <?php endforeach; ?>                
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary border-0">Save</button><span class="py-2 px-2 ml-3 rounded text-info" id="editSuccessToast" style="display: none;"><i class="fa fa-check mr-2"></i>Saved</span>

          </form>
        </div>
      </div>

      <div class="col-lg-6 d-flex justify-content-center mt-5 mt-md-0" id="right_edit">
        
        <form method="post" id="editImageForm">
          <h3 class="d-block d-lg-none mt-3">Edit main image</h3>
          <input type="hidden" name="item_id" id="item_id" value="<?php echo $items['item_id']; ?>">
          <div class="position-relative" id="actual_image">
            <div class="rounded overflow-hidden mt-3" style="height: 370px; width: 350px;">
              <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $items['main_image']; ?>" style="width: 100%;">
            </div>
            <div class="shadow-sm" style="position: absolute; top: -20px; right: -20px;">
              <input id="change_image" type="file" name="userfile" class="form-control border-0 d-none" required>
              <div class="input-group-append">
                <label for="change_image" class="btn btn-primary m-0 rounded-pill px-4 border-0"> <i class="fa fa-pen text-white"></i></label>
              </div>
            </div>
          </div>
          <div class="position-relative" id="new_image" style="display: none;">
            <div style="position: absolute; bottom: 75px; left: 75px; z-index: 10;">
              <span class="mr-3 shadow-lg"><a class="btn btn-info rounded-pill text-white" id="apply_image"><i class="fa fa-check mr-3"></i>Apply</a></span>
              <span class="shadow-lg"><a class="btn btn-primary rounded-pill text-white" id="discard_image"><i class="fa fa-times mr-3"></i>Cancel</a></span>
            </div>
            <div class="image-area" id="image_demo"></div>
          </div>

        </form>

      </div>
    </div>
    <!-- CHANGE GENERAL INFO SECTION -->

    <!-- CHANGE MAIN IMAGE SECTION -->
<!--     <div class="mb-4 mt-5 p-2 text-center text-white bg-info rounded z-depth-1">
      <h4>Change item main picture</h4>
    </div>
    <div class="main-picture col-lg-6"> -->
      <!-- Uploaded image area-->
      <!-- <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div> -->
      <!-- Upload image input-->
<!--       <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm mt-3">
          <input id="upload" type="file" name="userfile" onchange="readURL(this);" class="form-control border-0 d-none" required>
          <label id="upload-label" for="upload" class="font-weight-light text-muted d-none">Choose file</label>
          <div class="input-group-append">
            <label for="upload" class="btn btn-light m-0 rounded-pill px-4 border-0 text-white"> <i class="fa fa-cloud mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
          </div>
      </div>
    </div> -->
    <!-- CHANGE MAIN IMAGE SECTION -->
