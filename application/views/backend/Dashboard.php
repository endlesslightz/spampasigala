<?php
$this->load->view('backend/tema/Header');
?>

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">

                    <!--chart dashboard start-->
                     <div id="card-widgets">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <ul id="task-card" class="collection with-header">
                                    <li class="collection-header green">
                                        <h4 class="task-card-title">Peta Stasiun Pengukuran</h4>
                                        <!-- <p class="task-card-date">March 26, 2015</p> -->
                                    </li>
                                    
                                       <iframe src=<?php echo base_url('backend/dashboard/map');?> width=100% height=400 frameBorder="0"></iframe>
                                   
                                </ul>
                            </div>
                        </div>              
                    </div>
                    <!--chart dashboard end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--card stats start-->
                    <div id="card-stats">
                        <div class="row">
                            <div class="col s12 m4 l4">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-action-toc"></i> Total Data Diterima</p>
                                        <h4 class="card-stats-number"><?php echo $data; ?> Data</h4>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m4 l4">
                                <div class="card">
                                    <div class="card-content cyan white-text">
                                        <p class="card-stats-title"><i class="mdi-communication-invert-colors-on "></i> Data Terbaru</p>
                                        <h4 class="card-stats-number"><?php foreach($tanggal->result() as $tgl){
                                            echo $tgl->tekanan;
                                        } ?> Psi</h4>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m4 l4">
                                <div class="card">
                                    <div class="card-content pink lighten-1 white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-invitation"></i> Update Data Terakhir</p>
                                        <h4 class="card-stats-number"><?php foreach($tanggal->result() as $tgl){
                                            echo $tgl->waktu;
                                        } ?></h4>
                                        </p>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!--card stats end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--card widgets start-->
                    <div id="card-widgets">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="card">
                                    <div class="card-content light-blue white-text" style="height: 390px;">
                             <div class="col s12 m8 l8">
                                
                                       <video class='media-video' id='media-video' controls>
                                         <source id="isivideo" src="http://media.bmkg.go.id/media/Rain_Forecast_24h.mp4" type="video/mp4">
                                     </video>
                            </div>
                            <div class="col s12 m4 l4">
                                <a class="btn btn-fw light-blue darken-4" style="width:100%" onclick="cuaca('http://media.bmkg.go.id/media/Satellite_Indonesia.mp4')">Satelit</a>
                                <br><br>
                                <a class="btn btn-fw light-blue darken-4" style="width:100%" onclick="cuaca('http://media.bmkg.go.id/media/Wind_Forecast_24h.mp4')">Angin</a>
                                <br><br>
                                <a class="btn btn-fw light-blue darken-4" style="width:100%" onclick="cuaca('http://media.bmkg.go.id/media/Rain_Forecast_24h.mp4')">Hujan</a>
                                <br><br>
                                <a class="btn btn-fw light-blue darken-4" style="width:100%" onclick="cuaca('http://media.bmkg.go.id/media/Radar_Indonesia.mp4')">Radar</a>
                                <br><br>
                                <a class="btn btn-fw light-blue darken-4" style="width:100%" onclick="cuaca('http://media.bmkg.go.id/media/Cloud_Forecast_24h.mp4')">Awan</a>
                                <br><br>
                                <a class="btn btn-fw light-blue darken-4" style="width:100%" onclick="cuaca('http://media.bmkg.go.id/media/City_Forecast_Tomorrow.mp4')">Cuaca</a>  
                            </div>
                        </div></div></div>
                        </div>              
                    </div>
                    <!--card widgets end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->
                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START RIGHT SIDEBAR NAV-->
        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->
    <script type="text/javascript">
         function cuaca(x){
                document.getElementById("isivideo").src = x;
                mediaPlayer = document.getElementById('media-video');
                mediaPlayer.currentTime = 0;
                mediaPlayer.load();
                mediaPlayer.play();
            }
    </script>

<?php
$this->load->view('backend/tema/Footer');
?>