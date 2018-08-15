<?php
$this->load->view('backend/tema/Header');
?>

        <!-- START CONTENT -->
        <section id="content">

            <!--start container-->
            <div class="container">
                <div class="section">
                <h4 class="header">Pusat Bantuan</h4>
                    <div class="divider"></div>
                    <?php if($this->session->userdata('sukses')!='') { ?>
                          <div id="card-alert" class="card green">
                               <div class="card-content white-text">
                                 <p><i class="mdi-navigation-check"></i> BERHASIL : Email Anda telah terkirim. Harap tunggu balasan dari kami. Terima Kasih.</p>
                               </div>
                               <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                               </button>
                         </div>
                         <?php } ?>
                        <div id="contact-page" class="card">
                            <div class="card-content">
                              <div class="row">
                                  <div class="col s12 m6">
                                    <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                                      <li>
                                        <div class="collapsible-header active"><i class="mdi-communication-live-help"></i> Tentang Aplikasi</div>
                                        <div class="collapsible-body" style="">
                                          <p>
                                          Aplikasi Administratif SPAM PASIGALA dibuat dengan memungkinkan pengguna untuk melihat data pengukuran yang diterima dari sensor tekanan air dan peralatan ukur lainnya yang ada di stasiun pengukuran. Perangkat lunak ini dirancang agar dapat mudah digunakan (user-friendly) namun handal dan dapat menampung data hasil pengukuran yang besar di dalam database dalam engine SQL. Data hasil pengukuran dapat di-eksport ke berbagai format data seperti excel, sql, csv dan bahkan dapat dicetak.
                                          </p>
                                          <p>
                                            Aplikasi ini terdiri dari beberapa menu navigasi, antara lain: Dashboard untuk melihat tampilan peta letak stasiun pengukuran, Stasiun Pengukuran untuk melakukan pengaturan terhadap lokasi pos stasiun pengukuran, Tekanan air untuk melihat riwayat data tekanan air beserta grafiknya dari stasiun pengukuran. Tegangan baterai untuk melihat riwayat data tegangan baterai beserta grafiknya dari stasiun pengukuran dan User untuk mengatur akun pengguna yang dapat masuk ke dalam aplikasi ini.
                                          </p>

                                        </div>
                                      </li>
                                      <li class="active">
                                        <div class="collapsible-header "><i class="mdi-communication-email"></i> Butuh Bantuan?</div>
                                        <div class="collapsible-body" style="display: none;">
                                          <p>Jika Anda memerlukan bantuan, Anda dapat mengirimkan pertanyaan melalui form yang tersedia di halaman ini. Isilah form tersebut lalu kirimkan dengan menekan tombol "send".  </p>
                                          <p>Anda juga dapat mengirimkan email pertanyaan Anda ke secara langsung ke <a mailto="sartika@sartika-ms.com">sartika@sartika-ms.com</a>.Kami akan segera membantu permasalahan aplikasi Anda.</p>
                                        </div>
                                      </li>
                                      <li>
                                        <div class="collapsible-header"><i class="mdi-editor-insert-emoticon"></i> Hubungi Kami</div>
                                        <div class="collapsible-body" style="">
                                          <div class="row">
                                          <div class="col s6 m6">
                                            <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Juniardi Arijanto<br /> (President Director)</p>
                                            <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Ira Gumbira<br /> (Project Manager)</p>
                                            <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Nurcahya Pradana<br /> (Software Engineer)</p>
                                          </div>
                                          <div class="col s6 m6">
                                            <p><i class="mdi-communication-business cyan-text text-darken-2"></i> PT. Sartika Mitrasejati</p>
                                            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i>  (+6221) 750 4918</p>
                                            <p><i class="mdi-communication-email cyan-text text-darken-2"></i>  sartika@sartika-ms.com</p>
                                            <p><i class="mdi-action-alarm cyan-text text-darken-2"></i>  09.00 - 16.00 WIB</p>
                                          </div>
                                        </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="col s12 m6">
                                    <form class="contact-form" method="post" action="about/kirim">
                                      <div class="row">
                                        <div class="input-field col s12">
                                          <input id="name" readonly="readonly" name="nama" type="text" value="<?php echo $this->session->userdata('nama'); ?>">
                                          <label for="first_name">Nama</label>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="input-field col s12">
                                          <input id="email" readonly="readonly" name="email" type="email" value="<?php echo $this->session->userdata('email'); ?>">
                                          <label for="email">Email</label>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="input-field col s12">
                                        <select id="subjek" name='subjek'>
                                          <option>WEB - Aplikasi Error</option>
                                          <option>WEB - Tampilan Error</option>
                                          <option>WEB - Database Error</option>
                                        </select>
                                        <label for="subjek">Subjek</label>
                                      </div>
                                      </div>
                                      <div class="row">
                                        <div class="input-field col s12">
                                          <textarea id="message" name="pesan" class="materialize-textarea"></textarea>
                                          <label for="message">Pesan</label>
                                        </div>
                                        <div class="row">
                                          <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Send
                                              <i class="mdi-content-send right"></i>
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
