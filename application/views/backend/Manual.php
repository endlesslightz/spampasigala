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
                            <div class="col s8 m8 l8">
                                <h4 class="header">Manual Book</h4>
                                    <div class="card">
                                        <div class="card-content">                    
                                          <iframe id="isimanual" SRC=<?php echo base_url('libs/pdf/DMC.html');?> width=100% height="400" frameBorder="0"></iframe>          
      
                                        </div>
    
                                    </div>
                            </div>

                            <div class="col s4 m4 l4">
                                <h4 class="header">Daftar Manual Book</h4>
                                    <div class="card">
                                        <div class="card-content center">                    
                                            <p><a onclick="bukamanual('DMC.html')" class="btn waves-effect waves-light cyan darken-2" style="width: 250px;">Manual Data Logger</a></p><br>                  
                                            <p><a onclick="bukamanual('RMA.html')" class="btn waves-effect waves-light cyan darken-2" style="width: 250px;">Manual Book Aplikasi Administratif</a></p><br>                        
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