      <!-- Footer -->
      <footer class="footer mt-5 border-top">
        <div class="row align-items-center">
          <div class="col">
            <div class="copyright text-center text-muted">
              &copy; <?php echo Date('Y'); ?> <a href="<?php echo base_url() ?>" class="font-weight-bold ml-1" target="_blank">Nkonny.com</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script type="text/javascript"src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url(); ?>assets/admin/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>assets/admin/js/argon.js?v=1.2.0"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/croppie.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/exif.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin.js"></script>

  <script>
    $(document).ready(function() {

      $("#test").click(function(){
          $("#deleteSuccessToast").fadeTo(2000, 0.9);
          setInterval(function(){
            $("#deleteSuccessToast").fadeOut(4000);
          }, 4000);
          // toastr["info"]("I was launched via jQuery!")
      });

      // ITEMS CRUD
      
      // CREATE
      // 
      $(document).on( 'click', '#add_item', function(event){
        $image_crop.croppie('result', {
          type: 'canvas',
          quality: '0.9',
          size: {
              width:500,
              height:560
            }
        }).then(function(response){
          var itemname = $('#itemname').val();
          var price = $('#price').val();
          var description = $('#description').val();
          var collection_id = $('#collection_id').val();
          var category_id = $('#category_id').val();
          // var userfile = $('.userfile').val();
          $.ajax({
            url: '<?php echo base_url('Collections/create') ?>',
            type: "post",
            data: {itemname:itemname, price:price, description:description, collection_id:collection_id, category_id:category_id, "userfile":response},
            success:function(data){
              console.log('Added');
              history.back(-1);
              return false;
            }
          })
        })
      });

      // UPDATE IMAGE
      // 
      $(document).on( 'click', '#apply_image', function(event){
        $image_crop.croppie('result', {
          type: 'canvas',
          quality: '0.9',
          size: {
              width:500,
              height:560
            }
        }).then(function(response){
          var item_id = $('#item_id').val();
          $.ajax({
            url: '<?php echo base_url('Collections/update_image') ?>',
            type: "post",
            data: {item_id:item_id, "userfile":response},
            success:function(data){
              console.log('Added');
              $("#right_edit").fadeOut().load(" #right_edit").fadeIn();
              
            }
          })
        })
      });

      // DELETE
      // 
      $(document).on('click', '.delete_item', function () {
        var delete_id = $(this).attr('id');
        $.ajax({
          url: "<?php echo base_url('Collections/get_delete_id') ?>",
          type: "post",
          data: {delete_id:delete_id},
          success: function(data) {
            $("#id_input").html(data);
            $("#modalConfirmDelete").modal('show');
          } 
        }); 
      });

    //   $(document).on('click', '.delete_item', function () {
    //     var delete_id = $(this).attr('id');
    //     console.log(delete_id);
    //     $("#id_input").val(delete_id);
    //     $("#modalConfirmDelete").modal('show');
    //   });


      $("#delete_form").on('submit', function (e) {
        e.preventDefault();
          $.ajax({
            url: "<?php echo base_url('Collections/delete') ?>",
            type: "post",
            data: $("#delete_form").serialize(),
            success: function(data) {
              var card_id = $('.item-card').data('cardid');
              $("#modalConfirmDelete").modal('hide');
              $("#itemsContainer").fadeOut('slow').load(" #itemsContainer").fadeIn('slow');
              $("#deleteSuccessToast").fadeTo(2000, 0.9);
              setInterval(function(){
                $("#deleteSuccessToast").fadeOut(4000);
              }, 4000);
              console.log('Success');
            },
          }); 
      });


    // CONTACT FORM
    // 
    $("#contactForm").on('submit', function (e) {
        e.preventDefault();
          $.ajax({
            url: "<?php echo base_url('user/send_mail') ?>",
            type: "post",
            data: $("#contactForm").serialize(),
            success: function(data) {
              $("#sendSuccessToast").fadeTo(2000, 0.9);
              setInterval(function(){
                $("#sendSuccessToast").fadeOut(4000);
              }, 4000);
              $('#contactForm')[0].reset();
              console.log('Success');
            },
          }); 
      });


    // EDIT FORM
    // 
    $("#edit_form").on('submit', function (e) {
        e.preventDefault();
          $.ajax({
            url: "<?php echo base_url('Collections/update') ?>",
            type: "post",
            data: $("#edit_form").serialize(),
            success: function(data) {
              $("#left_edit").fadeOut().load(" #left_edit").fadeIn();
              $("#editSuccessToast").fadeTo(2000, 0.9);
              setInterval(function(){
                $("#editSuccessToast").fadeOut(4000);
              }, 4000);
              console.log('Success');
            },
          }); 
      });

  });

  new WOW().init();

  </script>

</body>

</html>