<?php
$this->load->view('backend/tema/Header');
?>

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">
                    <!--card widgets start-->
                    <div id="card-widgets">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h4 class="header">Akun User</h4>
                                    <div class="card">
                                        <div class="card-content">                    
                                          <iframe SRC=<?php echo site_url('backend/user/grid');?> width=100% height="400" frameBorder="0"></iframe>          
      
                                        </div>
    
                                    </div>
                            </div>
                        </div>
                    </div>                                     
                    <!-- //////////////////////////////////////////////////////////////////////////// -->
                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
        </div>
        <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->

<?php
$this->load->view('backend/tema/Footer');
?>