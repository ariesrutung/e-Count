<style>
    td,
    th {
        background-image: none !important;
        padding: 0 !important;
        vertical-align: middle;
    }

    table.dataTable thead .sorting_asc {
        background-image: none !important;
        padding: 10px 0 !important;
        text-align: center;
    }

    table.dataTable tfoot td.totalSuara {
        padding: 10px !important;
        border-top: 1px solid #111;
    }

    td.w-10.sorting_1 {
        text-align: center;
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

    th.w-20.bukti.sorting {
        text-align: center;
    }
</style>
<section class="content-section" id="portfolio">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading text-center">
            <h3 class="text-secondary mb-0">Tabel</h3>
            <h2 class="mb-5">Rekapitulasi Suara Masuk </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-5 text-center"><em>e-Count | Aplikasi Hitung Cepat - Pemilihan Anggota DPRD Dapil 1 Kabupaten Manokwari</em></h3>
            </div>
        </div>
        <div class="row gx-0">
            <?php if (!empty($data_tps_wilayah)) : ?>
                <div class="row d-flex justify-content-start mb-4">
                    <div class="col-12">
                        <a href="<?= base_url('pdfview'); ?>" class="btn btn-primary text-white">Generate Laporan | PDF</a>
                    </div>
                </div>
                <table id="tabelSuara" class="table table-borderless mt-4">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th class="w-10">No.</th>
                            <th class="w-25">Nama Saksi</th>
                            <th class="w-20">No. HP</th>
                            <th class="w-15">No. TPS</th>
                            <th class="w-15">Qty. Suara</th>
                            <th class="w-20 bukti">Bukti</th>
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
                                <td class="w-20">
                                    <?php if (!empty($key->bukti)) : ?>
                                        <img class="w-100" src="<?= base_url('/assets/uploads/bukti/' . $key->bukti); ?>">
                                    <?php else : ?>
                                        <img class="w-100" src="<?= base_url('/assets/uploads/bukti/noimage.png') ?>">
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php
                                $no++;
                                $totalSuara += $tps->total_suara; // Tambahkan suara pada total
                            }
                            ?>
                    </tbody>

                    <tfoot class="bg-dark text-light">
                        <tr>
                            <td class="totalSuara" colspan="5" class="align-left text-bold">Total Suara:</td>
                            <td class="text-bold"><?php echo format_angka($totalSuara); ?></td>
                        </tr>
                    </tfoot>
                </table>
            <?php else : ?>
                <p>Tidak ada data untuk wilayah yang dipilih.</p>
            <?php endif; ?>

        </div>
    </div>
</section>