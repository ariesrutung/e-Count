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
									<th scope="col">No.</th>
									<th scope="col">Nama Depan</th>
									<th scope="col">Nama Belakang</th>
									<th scope="col">Email</th>
									<th scope="col">Role</th>
									<th scope="col">Status</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($users as $user) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
										<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
										<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
										<td id="group">
											<?php foreach ($user->groups as $group) : ?>
												<?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
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
											<a href="#" class="btn btn-danger edit-btn text-white" data-bs-toggle="modal" data-bs-target="#hapusData<?= $user->id; ?>">Hapus</a>
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
		<div class="modal-dialog modal-md modal-dialog-centered" role="document">
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
	<div class="modal fade" id="hapusData<?= $user->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData<?= $user->id; ?>Label" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="hapusData<?= $user->id; ?>Label">Peringatan</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="post" action="<?= base_url(); ?>auth/delete_user/<?= $user->id; ?>">
					<div class="modal-body">
						<p>Apakah anda yakin ingin menghapus <?= $user->first_name; ?> <?= $user->last_name; ?> ini? </p>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Ya, Hapus!</button>
					</div>
				</form>
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