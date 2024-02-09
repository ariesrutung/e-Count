<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<section class="content-section" id="portfolio">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading text-center">
            <h3 class="text-secondary mb-0">Input</h3>
            <h2 class="mb-5">Data Suara </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-5 text-center"><em>e-Count | Aplikasi Hitung Cepat - Pemilihan Anggota DPRD Dapil 1 Kabupaten Manokwari</em></h3>
            </div>
        </div>
        <div class="row gx-0">
            <div id="tabelchart" class="col-md-12">
                <!-- input_data.php -->
                <form action="<?php echo base_url('welcome/process_input'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Saksi:</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Ketikkan Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor HP/WA:</label>
                                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Ketikkan Nomor HP" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="wilayah" class="form-label">Pilih Wilayah TPS:</label>
                                <select class="form-select" id="wilayah" name="wilayah">
                                    <option value="" selected="selected" disabled>Pilih Wilayah TPS</option>
                                    <?php foreach ($data_wilayah as $wil) : ?>
                                        <option value="<?php echo $wil->nama_wilayah; ?>"><?php echo $wil->nama_wilayah; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tps" class="form-label">Nomor TPS:</label>
                                <input type="text" class="form-control" id="tps" name="tps" placeholder="Ketikkan Nomor TPS" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah_suara" class="form-label">Jumlah Suara:</label>
                                <input type="text" class="form-control" id="jumlah_suara" name="jumlah_suara" placeholder="Ketikkan Jumlah Suara" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bukti" class="form-label">Bukti/Dokumentasi:</label>
                                <input type="file" class="form-control" id="bukti" name="bukti">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Kirim Data</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    <?php if ($this->session->flashdata('success_message')) : ?>
        Swal.fire({
            title: 'Sukses!',
            text: '<?php echo $this->session->flashdata('success_message'); ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }
        });
    <?php endif; ?>
</script>