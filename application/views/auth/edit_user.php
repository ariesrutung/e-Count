<div class="main_content_iner ">
      <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                  <div class="col-12">
                        <div class="QA_section">
                              <div class="box_header ">
                                    <div class="main-title">
                                          <h3 class="mb-0">Ubah Data Pengelola Aplikasi</h3>
                                    </div>
                              </div>
                              <div class="row">
                                    <div id="infoMessage"><?php echo $message; ?></div>

                                    <?php echo form_open(uri_string()); ?>

                                    <div class="row">
                                          <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                      <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
                                                      <?php echo form_input($first_name, '', 'class="form-control" id="first_name"'); ?>
                                                </div>
                                          </div>
                                          <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                      <?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
                                                      <?php echo form_input($last_name, '', 'class="form-control" id="last_name"'); ?>
                                                </div>
                                          </div>
                                          <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                      <?php echo lang('edit_user_company_label', 'company'); ?> <br />
                                                      <?php echo form_input($company, '', 'class="form-control" id="company"'); ?>
                                                </div>
                                          </div>
                                          <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                      <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
                                                      <?php echo form_input($phone, '', 'class="form-control" id="phone"'); ?>
                                                </div>
                                          </div>
                                          <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                      <?php echo lang('edit_user_password_label', 'password'); ?> <br />
                                                      <?php echo form_input($password, '', 'class="form-control" id="password"'); ?>
                                                </div>
                                          </div>
                                          <div class="col-sm-4 mb-3">
                                                <div class="form-group">
                                                      <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
                                                      <?php echo form_input($password_confirm, '', 'class="form-control" id="password_confirm"'); ?>
                                                </div>
                                          </div>
                                          <div class="col-sm-4 mb-3">
                                                <?php if ($this->ion_auth->is_admin()) : ?>
                                                      <label class="mb-0"><?php echo lang('edit_user_groups_heading'); ?></label><br>
                                                      <?php foreach ($groups as $group) : ?>
                                                            <label class="checkbox">
                                                                  <input type="checkbox" class="common_checkbox mt-3" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                                                                  <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                                            </label>
                                                      <?php endforeach ?>
                                                <?php endif ?>
                                          </div>
                                    </div>
                                    <?php echo form_hidden('id', $user->id); ?>
                                    <?php echo form_hidden($csrf); ?>
                                    <div class="row mt-4">
                                          <p><?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"'); ?></p>
                                    </div>
                                    <?php echo form_close(); ?>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>