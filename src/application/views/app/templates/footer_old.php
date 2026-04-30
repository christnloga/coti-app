      <!-- Footer -->
      <!-- <footer class="footer mt-5 border-top">
        <div class="row align-items-center">
          <div class="col">
            <div class="copyright text-center text-muted">
              &copy; <?php echo Date('Y'); ?> <a class="text-green" href="https://altechs.africa" class="font-weight-bold ml-1" target="_blank">Altechs.africa</a>
            </div>
          </div>
        </div>
      </footer>
    </div> -->
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
  <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin.js"></script> -->

  <script>
    $(document).ready(function() {

      // Print table
      $('#print').click(function() {
        var printable = document.getElementById('table');
        var wme = window.open("","","width=900,height=700");
        wme.document.write(printable.outerHTML);
        wme.document.close();
        wme.focus();
        wme.print();
        // wme.close();
      })

      //

      $("#test").click(function(){
          $("#deleteSuccessToast").fadeTo(2000, 0.9);
          setInterval(function(){
            $("#deleteSuccessToast").fadeOut(4000);
          }, 4000);
          // toastr["info"]("I was launched via jQuery!")
      });

      // MEMBERS CRUD
      
      // CREATE
      // 
      $("#new_member").click(function(){
        $('#modalAddMember').modal('show');
        // $('body').css('filter','blur(5px)');
      });
      // Add member to
      $("#addTo").click(function(e){
        e.preventDefault();
        var memberID = $(this).data('memberid');
        console.log(memberID);
      });

      // Submit member form
      $(document).on( 'submit', '#newMemberForm', function(){
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url('User/register') ?>",
            type: "post",
            data: $("#newMemberForm").serialize(),
          success:function(data){
            $("#modalAddMember").modal('hide');
              $(".table-responsive").fadeOut('slow').load(".table-responsive").fadeIn('slow');
              // $("#deleteSuccessToast").fadeTo(2000, 0.9);
              // setInterval(function(){
              //   $("#deleteSuccessToast").fadeOut(4000);
              // }, 4000);
              console.log('Success');
          }
        })
      });

      // UPDATE MEMBER
      // 
      $(".update_member").click(function(){
        var firstName = $(this).data('firstname');
        var lastName = $(this).data('lastname');
        var username = $(this).data('username');
        var contact = $(this).data('contact');
        var address = $(this).data('address');
        console.log(firstName);
        $("#first_name").val(firstName);
        $("#last_name").val(lastName);
        $("#username").val(username);
        $("#contact").val(contact);
        $("#address").val(address);
        $('#modalUpdateMember').modal('show');
        // $('body').css('filter','blur(5px)');
      });

      $(document).on( 'submit', '#updateMemberForm', function(e){
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url('User/update') ?>",
            type: "post",
            data: $("#updateMemberForm").serialize(),
          success:function(data){
            $("#modalUpdateMember").modal('hide');
              // $(".table-responsive").fadeOut('slow').load(".table-responsive").fadeIn('slow');
              // $("#deleteSuccessToast").fadeTo(2000, 0.9);
              // setInterval(function(){
              //   $("#deleteSuccessToast").fadeOut(4000);
              // }, 4000);
              console.log('Success');
          }
        })
      });

      // DELETE
      // 
      // $(document).on('click', '.delete_member', function () {
      //   var delete_id = $(this).attr('id');
      //   $.ajax({
      //     url: "<?php echo base_url('User/get_delete_id') ?>",
      //     type: "post",
      //     data: {delete_id:delete_id},
      //     success: function(data) {
      //       $("#id_input").html(data);
      //       $("#modalConfirmDelete").modal('show');
      //     } 
      //   }); 
      // });

      $(document).on('click', '.delete_member', function () {
        var delete_id = $(this).attr('id');
        console.log(delete_id);
        $("#id_input").val(delete_id);
        $("#modalConfirmDelete").modal('show');
      });


      $("#delete_form").on('submit', function () {
        // e.preventDefault();
          $.ajax({
            url: "<?php echo base_url('User/delete') ?>",
            type: "post",
            data: $("#delete_form").serialize(),
            success: function(data) {
              // var card_id = $('.item-card').data('cardid');
              $("#modalConfirmDelete").modal('hide');
              $(".members-card").fadeOut('slow').load(".members-card").fadeIn('slow');
              // $("#deleteSuccessToast").fadeTo(2000, 0.9);
              // setInterval(function(){
              //   $("#deleteSuccessToast").fadeOut(4000);
              // }, 4000);
              console.log('Success');
            },
          }); 
      });
      
    // SEARCH MEMBER
    $('.search-input').keyup(function(){
      var query = $(this).val();
      if(query != '')
      {
        $.ajax({
            url: "<?php echo base_url('User/search') ?>",
            type: "post",
            data: {query:query},
            success: function(data) {
              $("#navigation").fadeOut();
              $(".search-result").fadeIn();
              $(".search-result").html(data);
              console.log('Success');
            },
        });
      }
      else
      {
        $(".search-result").fadeOut();
        $("#navigation").fadeIn();
      }
    })


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



  // TONTINE CRUD

        // CREATE
      // 
      $("#new_tontine").click(function(){
        $('#modalAddTontine').modal('show');
      });

      // Submit form
      $(document).on( 'submit', '#newTontineForm', function(){
        // e.preventDefault();
        $.ajax({
          url: "<?php echo base_url('Tontine/create') ?>",
            type: "post",
            data: $("#newTontineForm").serialize(),
          success:function(){
            $("#newTontineForm").modal('hide');
              console.log('Success');
          }
        })
      });

      // UPDATE
      // 
      $(".update_member").click(function(){
        var firstName = $(this).data('firstname');
        var lastName = $(this).data('lastname');
        var username = $(this).data('username');
        var contact = $(this).data('contact');
        var address = $(this).data('address');
        console.log(firstName);
        $("#first_name").val(firstName);
        $("#last_name").val(lastName);
        $("#username").val(username);
        $("#contact").val(contact);
        $("#address").val(address);
        $('#modalUpdateMember').modal('show');
      });

      $(document).on( 'submit', '#updateMemberForm', function(e){
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url('User/update') ?>",
            type: "post",
            data: $("#updateMemberForm").serialize(),
          success:function(data){
            $("#modalUpdateMember").modal('hide');
              console.log('Success');
          }
        })
      });

      // Close tontine modal

      $(document).on('click', '.end_tontine', function () {
        var delete_id = $(this).attr('id');
        var state = $(this).data('state');
        console.log(delete_id);
        $("#id_input").val(delete_id);
        $("#state_input").val(state);
        $("#modalConfirmDelete").modal('show');
      });

      // Close tontine function
      $("#end_form").on('submit', function () {
        // e.preventDefault();
          $.ajax({
            url: "<?php echo base_url('Tontine/end_tontine') ?>",
            type: "post",
            data: $("#end_form").serialize(),
            success: function(data) {
              $("#modalConfirmDelete").modal('hide');
              $(".card").fadeOut().load(".card").fadeIn();
              console.log('Success');
            },
          }); 
      });

  new WOW().init();

  </script>

</body>

</html>