      </div>
      <!-- Footer -->
      <footer class="footer mt-5 border-top">
        <div class="row align-items-center">
          <div class="col">
            <div class="copyright text-center text-muted">
              &copy; <?php echo Date('Y'); ?> <a class="text-default" href="https://cybexai.com" class="font-weight-bold ml-1" target="_blank">Cybex.Ai</a>
            </div>
          </div>
        </div>
      </footer>
      </div>
      <!-- Argon Scripts -->
      <!-- Core -->
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/dist/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/vendor/js-cookie/js.cookie.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/js/swup/swup.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/js/swup/SwupSlideTheme.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/js/swup/SwupProgressPlugin.min.js"></script>

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/sl-1.3.1/datatables.min.js"></script>
      <!-- <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> -->
      <!-- Optional JS -->
      <script src="<?php echo base_url(); ?>assets/admin/vendor/chart.js/dist/Chart.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/vendor/chart.js/dist/Chart.extension.js"></script>
      <!-- Argon JS -->
      <script src="<?php echo base_url(); ?>assets/admin/js/argon.js?v=1.2.0"></script>
      <script src="<?php echo base_url(); ?>assets/admin/js/croppie.js"></script>
      <script src="<?php echo base_url(); ?>assets/admin/js/exif.js"></script>
      <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin.js"></script> -->

      <script>
        // const swup = new Swup();

        // const swup = new Swup({
        //   theme: [new SwupSlideTheme()]
        // });

        $(document).ready(function() {

          $('#myTable').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //   { extend: 'print', text: '<span class="fa fa-print"></span> Imprimer', className: 'printButton' }
            // ],

            responsive: true,

            "pagingType": "full_numbers",

            "language": {
              "info": "Actuellement _START_ à _END_ sur _TOTAL_ entrées",
              "lengthMenu": "Afficher _MENU_ entrée(s)",
              "search": "Recherche _INPUT_",
              "paginate": {
                "first": "<<",
                "last": ">>",
                "next": ">",
                "previous": "<"
              },
              "zeroRecords": "Aucune entrée correspondante",
              "infoEmpty": "Actuellement 0 à 0 sur 0 entrées",
            }

          });

          $('#membersModal').DataTable({

            "pagingType": "full_numbers",

            "language": {
              "info": "Actuellement _START_ à _END_ sur _TOTAL_ entrées",
              "lengthMenu": "Afficher _MENU_ entrée(s)",
              "search": "Recherche _INPUT_",
              "paginate": {
                "first": "<<",
                "last": ">>",
                "next": ">",
                "previous": "<"
              },
              "zeroRecords": "Aucune entrée correspondante",
              "infoEmpty": "Actuellement 0 à 0 sur 0 entrées",
            }

          });

          // Print table
          $('#print').click(function() {
            var printable = document.getElementById('table');
            var wme = window.open("", "", "width=900,height=700");
            wme.document.write(printable.outerHTML);
            wme.document.close();
            wme.focus();
            wme.print();
            // wme.close();
          })

          //

          $("#test").click(function() {
            $("#deleteSuccessToast").fadeTo(2000, 0.9);
            setInterval(function() {
              $("#deleteSuccessToast").fadeOut(4000);
            }, 4000);
            // toastr["info"]("I was launched via jQuery!")
          });

          // MEMBERS CRUD --------------------------------------------------------------------------

          // Add member to
          $("#addTo").click(function(e) {
            e.preventDefault();
            var memberID = $(this).data('memberid');
            console.log(memberID);
          });

          // Delete member
          $(document).on('click', '.delete_member', function() {
            var delete_id = $(this).attr('id');
            console.log(delete_id);
            $("#id_input").val(delete_id);
            $("#modalConfirmDelete").modal('show');
          });


          $("#delete_form").on('submit', function() {
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
          $('.search-input').keyup(function() {
            var query = $(this).val();
            if (query != '') {
              $.ajax({
                url: "<?php echo base_url('User/search') ?>",
                type: "post",
                data: {
                  query: query
                },
                success: function(data) {
                  $("#navigation").fadeOut();
                  $(".search-result").fadeIn();
                  $(".search-result").html(data);
                  console.log('Success');
                },
              });
            } else {
              $(".search-result").fadeOut();
              $("#navigation").fadeIn();
            }
          })

        });

        // TONTINE CRUD ---------------------------------------------------------------

        // Close tontine modal

        $(document).on('click', '.end_tontine', function() {
          var delete_id = $(this).attr('id');
          var state = $(this).data('state');
          console.log(delete_id);
          $("#id_input").val(delete_id);
          $("#state_input").val(state);
          $("#modalConfirmDelete").modal('show');
        });

        // Close tontine function
        $("#end_form").on('submit', function() {
          // e.preventDefault();
          $.ajax({
            url: "<?php echo base_url('Tontine/end_tontine') ?>",
            type: "post",
            data: $("#end_form").serialize(),
            success: function(data) {
              $("#modalConfirmDelete").modal('hide');
              // $(".table").load('Tontine/index');
              $(".table").load('.table');
              console.log('Success');
            },
          });
        });

        // Add record function
        $("#record_tontine_form").on('submit', function() {
          // e.preventDefault();
          $.ajax({
            url: "<?php echo base_url('User/add_record') ?>",
            type: "post",
            data: $("#record_tontine_form").serialize(),
            success: function(data) {
              // $(".table").load('Tontine/index');
              // $(".record-card").load('../tontines/seance/records.php');
              console.log('Success');
            },
          });
        });

        // CAISSE CRUD --------------------------------------------------------------------

        // New caisse modal
        $(document).on('click', '.new_caisse', function() {
          console.log('Clicked');
          $("#modalNewCaisse").modal('show');
        });

        // New caisse form
        $("#end_form").on('submit', function(e) {
          e.preventDefault();
          $.ajax({
            url: "<?php echo base_url('Caisses/create') ?>",
            type: "post",
            data: $("#caisse_form").serialize(),
            success: function(data) {
              $("#modalNewCaisse").modal('hide');
              console.log('Success');
            },
          });
        });

        // Update sold modal call
        $(document).on('click', '.update_sold', function() {
          var memberID = $(this).attr('id');
          var soldID = $(this).data('soldid');
          var sold = $(this).data('sold');
          console.log(sold);
          console.log(soldID);
          $("#member_id").val(memberID);
          $("#sold_id").val(soldID);
          $("#sold").val(sold);
          $("#updateSoldModal").modal('show');
        });

        // Withdraw sold modal call
        $(document).on('click', '.withdraw_sold', function() {
          var memberID = $(this).attr('id');
          var soldID = $(this).data('soldid');
          var sold = $(this).data('sold');
          console.log(sold);
          console.log(soldID);
          $("#memberId").val(memberID);
          $("#soldId").val(soldID);
          $("#current_sold").val(sold);
          $("#withdrawSoldModal").modal('show');
        });

        // HELPS CRUD -----------------------------------------------------------------------

        // New help modal call
        $(document).on('click', '.record_help', function() {
          var userID = $(this).attr('id');
          console.log(userID);
          $("#member_id").val(userID);
          $("#modalNewHelp").modal('show');
        });
      </script>

      </body>

      </html>