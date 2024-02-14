<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    .dt-buttons {
        margin-bottom: 5px;
    }

    .card {
        padding: 10px;
        margin: 10px;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 10px 0;
        border-bottom: 1px solid #111;
        background-image: none !important;
    }

    table.dataTable thead .sorting_asc {
        background-image: none !important;
        text-align: center;
    }

    table.dataTable tbody td.w-10.sorting_1 {
        text-align: center;
    }

    table.dataTable tbody th,
    table.dataTable tbody td {
        padding: 10px 0;
    }

    table.dataTable tbody td:nth-child(3),
    table.dataTable tbody td:nth-child(4),
    table.dataTable tbody td:nth-child(5) {
        text-align: center;
    }

    table.dataTable thead th:nth-child(3),
    table.dataTable thead th:nth-child(4),
    table.dataTable thead th:nth-child(5) {
        text-align: center;
    }

    table.dataTable tfoot th,
    table.dataTable tfoot td {
        padding: 10px 0;
    }


    .w-5 {
        width: 5%;
    }

    .w-15 {
        width: 15%;
    }

    .w-25 {
        width: 25% !important;
    }

    .w-10 {
        width: 10%;
    }

    .w-20 {
        width: 20%;
    }

    .w-40 {
        width: 60%;
    }

    .sorting_1 {
        text-align: center;
    }
</style>
<section class="content-section" id="portfolio">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading text-center">
            <h3 class="text-secondary mb-0">Grafik</h3>
            <h2 class="mb-5">Data Suara </h2>
        </div>
        <div class="row gx-0">
            <div class="col-lg-7">
                <div class="card">
                    <?php if (!empty($data_tps_wilayah)) : ?>
                        <h4 class="mb-3">Tabel Data Suara by TPS <?php echo $data_tps_wilayah[0]->wilayah; ?></h4>
                        <table id="tabelSuara" class="table table-borderless mt-4">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Saksi</th>
                                    <th>No. TPS</th>
                                    <th>Qty. Suara</th>
                                    <?php if ($this->ion_auth->logged_in()) : ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $totalSuara = 0; // Inisialisasi total suara
                                    foreach ($data_tps_wilayah as $tps) {
                                        ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $tps->nama_lengkap; ?></td>
                                        <td><?php echo $tps->tps; ?></td>
                                        <td><?php echo format_angka($tps->total_suara); ?></td>
                                        <?php if ($this->ion_auth->logged_in()) : ?>
                                            <td>
                                                <a href="#" class="btn btn-primary edit-btn btn-sm text-white m-1" data-id="<?= $tps->id; ?>" data-bs-toggle="modal" data-bs-target="#editData">Edit</a>
                                                <a href="#" class="btn btn-danger edit-btn btn-sm text-white m-1" data-bs-toggle="modal" data-bs-target="#hapusData<?= $tps->id; ?>">Hapus</a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php
                                        $no++;
                                        $totalSuara += $tps->total_suara; // Tambahkan suara pada total
                                    }
                                    ?>
                            </tbody>

                            <tfoot class="bg-dark text-light">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <?php if ($this->ion_auth->logged_in()) : ?>
                                        <td></td>
                                    <?php endif; ?>
                                    <td class="align-left text-bold">Total Suara:</td>
                                    <td class="text-bold"><?php echo format_angka($totalSuara); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    <?php else : ?>
                        <p>Tidak ada data untuk wilayah yang dipilih.</p>
                    <?php endif; ?>

                </div>

            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="row">
                        <figure class="highcharts-figure">
                            <div id="chartSuarabyTPS"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="<?= base_url(); ?>welcome">Kembali ke Beranda</a>
        </div>
    </div>
</section>


<?php foreach ($data_tps_wilayah as $key) : ?>
    <div class="modal fade" id="hapusData<?= $key->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData<?= $key->id; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusData<?= $key->id; ?>Label">Peringatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?= base_url(); ?>welcome/hapus_data/<?= $key->id; ?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data <?= $key->tps; ?> di wilayah <?= $key->wilayah; ?> ini? </p>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ya, Hapus!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<div class="modal fade" id="editData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabel">Ubah Data Suara</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="edit_id" name="edit_id">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_nama_lengkap" class="form-label">Nama Saksi:</label>
                                <input type="text" class="form-control" id="edit_nama_lengkap" name="edit_nama_lengkap" placeholder="Ketikkan Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_nomor_hp" class="form-label">Nomor HP/WA:</label>
                                <input type="text" class="form-control" id="edit_nomor_hp" name="edit_nomor_hp" placeholder="Ketikkan Nomor HP" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_wilayah" class="form-label">Pilih Wilayah TPS:</label>
                                <select class="form-select" id="edit_wilayah" name="edit_wilayah">
                                    <option value="" selected="selected" disabled>Pilih Wilayah TPS</option>
                                    <?php foreach ($data_wilayah as $wil) : ?>
                                        <option value="<?php echo $wil->nama_wilayah; ?>"><?php echo $wil->nama_wilayah; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_tps" class="form-label">Nomor TPS:</label>
                                <input type="text" class="form-control" id="edit_tps" name="edit_tps" placeholder="Ketikkan Nomor TPS" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_jumlah_suara" class="form-label">Jumlah Suara:</label>
                                <input type="text" class="form-control" id="edit_jumlah_suara" name="edit_jumlah_suara" placeholder="Ketikkan Jumlah Suara" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk Chart.js -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Semua Button Cetak -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    Highcharts.chart('chartSuarabyTPS', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Grafik Data Suara by Wilayah TPS <?php echo $data_tps_wilayah[0]->wilayah; ?>'
        },
        tooltip: {
            valueSuffix: ' suara'
        },
        subtitle: {
            text: 'Sumber: Data TPS'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Jumlah',
            colorByPoint: true,
            data: [
                <?php foreach ($data_tps_wilayah as $key) : ?> {
                        name: '<?php echo $key->tps; ?>',
                        y: <?php echo $key->total_suara; ?>
                    },
                <?php endforeach; ?>
            ]
        }]
    });
</script>

<script>
    $(document).ready(function() {
        $('#tabelSuara').DataTable({
            searching: false,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        stripHtml: false
                    },
                    text: 'Excel',
                    className: 'btn btn-primary btn-sm text-white',
                    title: 'Rekap Suara Berdasarkan Wilayah TPS <?php echo $data_tps_wilayah[0]->wilayah; ?>',
                    footer: true,

                },
                {
                    extend: 'print',
                    exportOptions: {
                        stripHtml: false
                    },
                    text: 'Cetak',
                    className: 'btn btn-primary btn-sm text-white',
                    title: 'Rekap Suara Berdasarkan Wilayah TPS <?php echo $data_tps_wilayah[0]->wilayah; ?>',
                    footer: true,

                }
            ]
        });
    });
</script>


<script>
    // JavaScript untuk menangani pengiriman form dan menutup modal
    $(document).ready(function() {

        $('.edit-btn').click(function() {
            var id = $(this).data('id');

            // Kirim AJAX request untuk mendapatkan data investor berdasarkan ID
            $.ajax({
                type: 'GET',
                url: '<?= base_url() ?>welcome/get_datamasuk/' + id,
                dataType: 'json',
                success: function(response) {
                    // Isi form edit dengan data investor
                    $('#edit_id').val(response.id);
                    $('#edit_nama_lengkap').val(response.nama_lengkap);
                    $('#edit_nomor_hp').val(response.nomor_hp);
                    $('#edit_wilayah').val(response.wilayah);
                    $('#edit_tps').val(response.tps);
                    $('#edit_jumlah_suara').val(response.jumlah_suara);

                    // Tampilkan modal edit
                    $('#editData').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Tambahkan event listener untuk form edit
        $('#editForm').submit(function(e) {
            e.preventDefault();

            // Kirim AJAX request untuk update data investor
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>welcome/update_datamasuk', // Sesuaikan dengan URL controller Anda
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);

                    // Tutup modal edit
                    $('#editData').modal('hide');

                    // Reload halaman untuk menampilkan data terbaru
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>