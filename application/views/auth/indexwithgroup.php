<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Daftar Pengelola Aplikasi</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="<?php echo site_url('auth/create_user'); ?>" class="btn_1">Tambah User</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Depan</th>
                                    <th scope="col">Nama Belakang</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <?php foreach ($user->groups as $group) : ?>
                                                <span type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#modalEditGroup<?= $user->id; ?>">Aktif</span>

                                            <?php endforeach ?>
                                        </td>
                                        <td>
                                            <?php if ($user->active) : ?>
                                                <span type="button" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#modalDeactivateUser<?= $user->id; ?>">Aktif</span>
                                            <?php else : ?>
                                                <span type="button" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#modalActivateUser<?= $user->id; ?>">Nonaktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('auth/edit_user/' . $user->id); ?>" class="btn btn-primary text-white">Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($users as $user) : ?>
    <div class="modal fade" id="modalDeactivateUser<?= $user->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalDeactivateUser<?= $user->id; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDeactivateUser<?= $user->id; ?>Label">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php echo form_open("auth/deactivate/" . $user->id); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Apakah Anda yakin ingin menonaktifkan user <?= $user->{$identity}; ?></p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="confirm" id="yes" value="yes" checked>
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="confirm" id="no" value="no">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_hidden($csrf); ?>
                    <?php echo form_hidden(['id' => $user->id]); ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-white">Simpan</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($users as $user) : ?>
    <div class="modal fade" id="modalActivateUser<?= $user->id; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalActivateUser<?= $user->id; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalActivateUser<?= $user->id; ?>Label">Peringatan!</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open("auth/activate/" . $user->id); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Apakah Anda yakin ingin mengaktifkan user <?= $user->{$identity}; ?></p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="confirm" id="yes" value="yes" checked>
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="confirm" id="no" value="no">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_hidden($csrf); ?>
                    <?php echo form_hidden(['id' => $user->id]); ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-white">Simpan</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($users as $user) : ?>
    <div class="modal fade" id="modalEditGroup<?= $user->id; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalEditGroup<?= $user->id; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditGroup<?= $user->id; ?>Label">Peringatan!</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open("auth/edit_group/" . $user->id); ?>
                <div class="modal-body">
                    <?php echo lang('edit_group_name_label', 'group_name'); ?> <br />
                    <?php echo form_input($group_name); ?>
                    </p>

                    <p>
                        <?php echo lang('edit_group_desc_label', 'description'); ?> <br />
                        <?php echo form_input($group_description); ?>
                    </p>

                    <p><?php echo form_submit('submit', lang('edit_group_submit_btn')); ?></p>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary text-white">Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        $(document).ready(function() {
            $('.activate-badge').on('click', function(e) {
                e.preventDefault();
                var targetModal = $(this).data('target-modal');
                $(targetModal).modal('show');
            });
        });
    </script>