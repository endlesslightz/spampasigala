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
                                <h4 class="header">Riwayat Tekanan Air</h4>
                                    <div class="card">
                                        <div class="card-content">                    
                                            <?php if($_GET['kat']=='harian') { ?>
                                            <iframe SRC=<?php echo base_url('backend/Tekanan/graflive2/').$_GET['id'];?> width=100% height="330" frameBorder="0"></iframe>          
                                                 <?php } else if($_GET['kat']=='bulanan') { ?>
                                            <iframe SRC=<?php echo base_url('backend/Tekanan/graflive3/').$_GET['id'];?> width=100% height="330" frameBorder="0"></iframe>          
                                                 <?php } else if($_GET['kat']=='jam') { ?>
                                            <iframe SRC=<?php echo base_url('backend/Tekanan/graflive4/').$_GET['id'];?> width=100% height="330" frameBorder="0"></iframe>          
                                                 <?php } else { ?> 
                                            <iframe SRC=<?php echo base_url('backend/Tekanan/graflive/').$_GET['id'];?> width=100% height="330" frameBorder="0"></iframe>          
                                                 <?php } ?>        
                                        </div>
    
                                    </div>
                            </div>

                            <div class="col s4 m4 l4">
                                <h4 class="header">Kategori</h4>
                                    <div class="card">
                                        <div class="card-content center" style="height:375px">                    
                                            <br><p><a class="btn waves-effect waves-light cyan darken-2" style="width: 150px;" href="tekanan?id=1&kat=menit">10 Menit</a></p><br>    <br>              
                                            <p><a class="btn waves-effect waves-light cyan darken-2" style="width: 150px;" href="tekanan?id=1&kat=jam">Jam</a></p><br><br>                        
                                            <p><a class="btn waves-effect waves-light cyan darken-2" style="width: 150px;" href="tekanan?id=1&kat=harian">Harian</a></p><br><br>                        
                                            <p><a class="btn waves-effect waves-light cyan darken-2" style="width: 150px;" href="tekanan?id=1&kat=bulanan">Bulanan</a></p>
                                        </div>
    
                                    </div>
                            </div>
                        </div>
                            <!-- map-card -->
                            <div class="col s12 m12 l12">
                                <h4 class="header">Tabel Tekanan Air</h4>
                                <div class="map-card">
                                    <div class="card">
                                        <div class="card-content">                    

         <?php if($_GET['kat']=='harian') { ?>
            <iframe SRC=<?php echo base_url('backend/Tekanan/grid2/').$_GET['id'];?> width=100% height="500" frameBorder="0"></iframe>          
         <?php } else if($_GET['kat']=='bulanan') { ?>
            <iframe SRC=<?php echo base_url('backend/Tekanan/grid3/').$_GET['id'];?> width=100% height="500" frameBorder="0"></iframe>          
         <?php } else if($_GET['kat']=='jam') { ?>
            <iframe SRC=<?php echo base_url('backend/Tekanan/grid4/').$_GET['id'];?> width=100% height="500" frameBorder="0"></iframe>          
         <?php } else { ?> 
              <form action="<?php echo site_url();?>backend/Tekanan/createSess/<?php echo $_GET['id']; ?>" method="post" target="frametabel">
                <div class='form-group'>
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    
                            <table border="0" width="50%">
                                <tr>
                                <td><p>Tanggal Mulai: <input type="text" name="tglmulai" class="datepicker" id="datepicker"></p></td>
                                <td><p>Tanggal Berakhir: <input type="text" name="tglakhir" class="datepicker" id="datepicker"></p></td>
                                <td><input type="submit" value="Filter" class="btn waves-effect waves-light cyan darken-2"></td>
                                <td><a href="<?php echo site_url();?>backend/Tekanan/grid/<?php echo $_GET['id']; ?>" target="frametabel" class="btn waves-effect waves-light red darken-2"><input type="button" value="Reset Filter" class="btn-secondary"></a></td>
                            </table>
                    
                </div>
                </form>
            <iframe name="frametabel" SRC=<?php echo base_url('backend/Tekanan/grid/').$_GET['id'];?> width=100% height="500" frameBorder="0"></iframe>          
         <?php } ?>     
                                        </div>
    
                                    </div>
                                </div>
                            </div>

                    </div>
                    <!--card widgets end-->

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