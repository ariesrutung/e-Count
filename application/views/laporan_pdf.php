<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif
        }

        #table {
            border-collapse: collapse;
            width: 100%;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #111;
            color: #fff;
        }

        tfoot {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #111;
            color: #fff;
        }

        tfoot td {
            padding: 15px;
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

        img {
            width: 100px;
            height: auto;
        }

        th.w-10.nomor,
        td.w-10.nomor {
            text-align: center !important;
        }

        th.w-15.tengah,
        td.w-15.tengah {
            text-align: center !important;
        }

        th.w-20.tengah,
        td.w-20.tengah {
            text-align: center !important;
        }

        .text-bold {
            font-size: 18px !important;
            font-weight: bold !important;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3><?= $title_pdf; ?></h3>
    </div>
    <table id="table">
        <thead class="bg-dark text-light">
            <tr>
                <th class="w-10 nomor">No.</th>
                <th class="w-25">Nama Saksi</th>
                <th class="w-20">No. HP</th>
                <th class="w-15 tengah">No. TPS</th>
                <th class="w-15 tengah">Qty. Suara</th>
                <th class="w-20 tengah">Bukti</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $totalSuara = 0; // Inisialisasi total suara
            foreach ($data_tps_wilayah as $tps) {
                ?>
                <tr>
                    <td class="w-10 nomor"><?php echo $no; ?></td>
                    <td class="w-25"><?php echo $tps->nama_lengkap; ?></td>
                    <td class="w-20"><?php echo $tps->nomor_hp; ?></td>
                    <td class="w-15 tengah"><?php echo $tps->tps; ?></td>
                    <td class="w-15 tengah"><?php echo format_angka($tps->total_suara); ?></td>
                    <td class="w-20 tengah">
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
                <td class="totalSuara text-bold" colspan="5">Total Suara:</td>
                <td class="text-bold"><?php echo format_angka($totalSuara); ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>