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
                                <h4 class="header">Informasi Stasiun Pengukuran</h4>
                                    <div class="card">
                                        <div class="card-content" style="height: 400px">          
                                        <?php                  
                                            $nama = $this->session->userdata('nama');
                                            $username =  $this->session->userdata('username');
                                            $password =  $this->session->userdata('password');
                                            $email =  $this->session->userdata('email');
                                        ?>               
                                        <form method="post" action="edit_profile" enctype="multipart/form-data">
                                        <div class="col s8">
                                            <div class="input-field col s12">              
                                                <input name="username" id="username" class="validate" type="text">
                                                <label for="username" class="active">Username</label>
                                            </div>
                                            <div class="input-field col s12">              
                                                <input name="nama" id="nama" class="validate" type="text">
                                                <label for="nama" class="active">Nama Lengkap</label>
                                            </div>

                                            <div class="input-field col s12">              
                                                <input name="password" id="password" class="validate" type="password">
                                                <label for="password" class="active">Password</label>
                                            </div>

                                            <div class="input-field col s12">              
                                                <input name="email" id="email" class="validate" type="email">
                                                <label for="email" class="active">Email</label>
                                            </div>

                                            <div class="input-field col s12">              
                                                <input  class="btn btn-info" type="submit" value="Ubah">
                                            </div>
                                        </div>

                                            <div class="col s4">
                                            <?php if($this->session->userdata('gambar')==""){ ?>
                                                <center><img src="<?php echo base_url(); ?>assets/backend/images/user.png" style="width: 75%" alt="" class="circle responsive-img valign profile-image"></center>
                                            <?php } else { ?>
                                                 <center><img src="<?php echo base_url(); ?>assets/backend/profile/<?php echo $this->session->userdata('gambar'); ?>" style="width: 75%" alt="" class="circle responsive-img valign profile-image"></center>
                                            <?php } ?>
                                              <div class="file-field input-field">                   
                                                  <div class="btn">
                                                    <span>Upload</span>
                                                    <input type="file" name="profile" >
                                                  </div>
                                                  <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                  </div>
                                              </div>
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
    <script type="text/javascript">
        document.getElementById('nama').value="<?php echo $nama; ?>";
        document.getElementById('username').value="<?php echo $username; ?>";
        document.getElementById('password').value="<?php echo $password; ?>";
        document.getElementById('email').value="<?php echo $email; ?>";
    </script>
<?php
$this->load->view('backend/tema/Footer');
?>