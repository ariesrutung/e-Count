<div class="main_content_iner ">
      <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                  <div class="col-12">
                        <div class="QA_section">
                              <div class="box_header ">
                                    <div class="main-title">
                                          <h3 class="mb-0">Tambah Pengelola Aplikasi</h3>
                                    </div>
                              </div>
                              <div class="row">
                                    <div id="infoMessage" class="col-md-12"><?php echo $message; ?></div>
                                    <?php echo form_open("auth/create_user"); ?>
                                    <div class="col">
                                          <div class="row">
                                                <div class="mb-3 col-md-4">
                                                      <div class="form-group">
                                                            <label class="form-label" for="first_name">Nama Depan</label>
                                                            <input type="text" class="form-control" name="first_name" id="first_name">
                                                      </div>
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                      <div class="form-group">
                                                            <label class="form-label" for="last_name">Nama Belakang</label>
                                                            <input type="text" class="form-control" name="last_name" id="last_name">
                                                      </div>
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                      <div class="form-group">
                                                            <label class="form-label" for="identity">Username</label>
                                                            <input type="text" class="form-control" name="identity" id="identity">
                                                      </div>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                      <div class="form-group">
                                                            <label class="form-label" for="email">Email</label>
                                                            <input type="email" class="form-control" name="email" id="email">
                                                      </div>
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                      <div class="form-group">
                                                            <label class="form-label" for="company">Perusahaan</label>
                                                            <input type="text" class="form-control" name="company" id="company" value="PT NAKARANA PANGAN PERKASA GROUP" readonly>
                                                      </div>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                      <div class="form-group">
                                                            <label class="form-label" for="phone">Telepon</label>
                                                            <input type="text" class="form-control" name="phone" id="phone">
                                                      </div>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                      <div class="form-group">
                                                            <label class="form-label" for="password">Kata Sandi</label>
                                                            <input type="password" class="form-control" name="password" id="password">
                                                      </div>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                      <div class="form-group">
                                                            <label class="form-label" for="password_confirm">Konfirmasi Kata Sandi</label>
                                                            <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                          </div>
                                    </div>
                                    <?php echo form_close(); ?>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>