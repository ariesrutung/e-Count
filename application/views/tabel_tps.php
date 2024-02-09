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

    .w-60 {
        width: 60%;
    }

    .w-35 {
        width: 35%;
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
                                    <th class="w-10">No.</th>
                                    <th class="w-25">Nama Saksi</th>
                                    <th class="w-20">No. HP</th>
                                    <th class="w-15">No. TPS</th>
                                    <th class="w-15">Qty. Suara</th>
                                    <!-- <th class="w-15">Bukti</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $totalSuara = 0; // Inisialisasi total suara
                                    foreach ($data_tps_wilayah as $tps) {
                                        ?>
                                    <tr>
                                        <td class="w-10"><?php echo $no; ?></td>
                                        <td class="w-25"><?php echo $tps->nama_lengkap; ?></td>
                                        <td class="w-20"><?php echo $tps->nomor_hp; ?></td>
                                        <td class="w-15"><?php echo $tps->tps; ?></td>
                                        <td class="w-15"><?php echo format_angka($tps->total_suara); ?></td>
                                        <!-- <td class="w-15">
                                            <?php if (!empty($key->bukti)) : ?>
                                                <img class="w-50" src="<?= base_url('/assets/uploads/bukti/' . $key->bukti); ?>">
                                            <?php else : ?>
                                                <img class="w-50" src="<?= base_url('/assets/uploads/bukti/noimage.png') ?>">
                                            <?php endif; ?>
                                        </td> -->
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
                                    <td></td>
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