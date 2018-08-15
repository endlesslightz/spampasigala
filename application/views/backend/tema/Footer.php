 <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © <?php echo date("Y"); ?>   <a class="grey-text text-lighten-4" href="https://sartika-ms.com" target="_blank">Sartika Mitrasejati</a> All rights reserved.
                <span class="right"> Designed and Developed by <a class="grey-text text-lighten-4" href="http://about.me/nurcahyapradana" target="_blank">Nurcahya Pradana</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->


    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugins/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/materialize.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugins/sparkline/sparkline-script.js"></script>



    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/materialize-plugins/date_picker/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/backend/js/custom-script.js"></script>

    <!-- Toast Notification -->
    <script type="text/javascript">
      $('.awal').pickadate({
        selectMonths: true,
        selectYears: 15
      });

       $('.akhir').pickadate({
        selectMonths: true,
        selectYears: 15
      });


    function bukamanual(x){
        document.getElementById("isimanual").src = "<?php echo site_url(); ?>libs/pdf/" + x;
    }

    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/')+1);
    if(filename=='dashboard'){
        $(window).load(function() {
            setTimeout(function() {
                Materialize.toast("Selamat datang di Aplikasi Administratif SPAM PASIGALA", 1500);
            }, 1500);
        });
    } else if (filename=='email'){
          $("#form_import").validate({
        rules: {
            awal: {
                required: true
            },akhir: {
                required: true
            }
        },
        //For custom messages
        messages: {
            awal:{
                required: "<div style='color:red; font-size:9pt; text-align:right'>Batas tanggal awal tidak boleh dikosongkan</div>"
            },
            akhir:{
                required: "<div style='color:red; font-size:9pt; text-align:right'>Batas tanggal akhir tidak boleh dikosongkan</div>"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });

    }
    </script>
</body>

</html>
