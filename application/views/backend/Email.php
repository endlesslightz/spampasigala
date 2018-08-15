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
                                <h4 class="header">IMPOR DATA</h4>
                                
                                    <?php if($this->session->userdata('sukses')!='') { ?>
                                     <div id="card-alert" class="card green">
                                          <div class="card-content white-text">
                                            <p><i class="mdi-navigation-check"></i> BERHASIL : File data telah berhasil dikirim ke email Anda.</p>
                                          </div>
                                          <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                          </button>
                                    </div>
                                    <?php } ?>
                                
                                    <div class="card">
                                        <div class="card-content" style="height: 400px">          
                                        <?php 
                                        // print_r($pos);
                                        foreach ($pos->result() as $item) {
                                            $nama = $item->nama_pos;
                                            $alamat = $item->alamat;
                                            $long = $item->long;
                                            $lat = $item->lat;
                                                  }   
                                        ?>    
                                        <div class="shadow-demo z-depth-3 col s12 m12 l12">        
                                        <h5>Alamat email terdaftar : <b><?php echo $this->session->userdata('email'); ?></b></h5>
                                            <a href="user/profile" class="lime-text text-accent-1">ubah alamat email?</a>
                                        </div>  
                                        <form method="post" action="email/kirim" id="form_import">

                                             <div class="input-field col s6">
                                                <input type="text" name="awal" class="awal" id="datepicker" >
                                                <label for="datepicker" class="active">Tanggal Mulai</label>
                                             </div>

                                             <div class="input-field col s6">
                                                <input type="text" name="akhir" class="akhir" id="datepicker2" >
                                               
                                                <label for="datepicker2" class="active">Tanggal Berakhir</label>
                                             </div>

                                             <input type="hidden" name="email" value="<?php echo $this->session->userdata('email') ?>">

                                            <div class="input-field col s3">              
                                                <input  class="btn btn-info" type="submit" name="tombol_email" value="Kirim Via Email">
                                            </div>

                                            <div class="input-field col s3">              
                                                <input  class="btn btn-info" type="submit" name="tombol_download" value="Download File CSV">
                                            </div>
                                        </form>
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