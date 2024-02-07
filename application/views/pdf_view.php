<!DOCTYPE html>
<html>

<head>
    <title>Rekapitulasi Suara Masuk - Hitung Cepat</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .w-20 {
            width: 20% !important;
        }
    </style>
</head>

<body>
    <h2>Rekapitulasi Suara Masuk - Hitung Cepat</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Saksi</th>
                <th>Nomor HP</th>
                <th>TPS</th>
                <th>Jumlah Suara</th>
                <th>Wilayah</th>
                <th>Bukti</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $key) : ?>
                <tr>
                    <td><?php echo $key['nama_lengkap']; ?></td>
                    <td><?php echo $key['nomor_hp']; ?></td>
                    <td><?php echo $key['tps']; ?></td>
                    <td><?php echo $key['jumlah_suara']; ?></td>
                    <td><?php echo $key['wilayah']; ?></td>
                    <td>
                        <?php if (!empty($key['bukti'])) : ?>
                            <img class="w-20" src="<?= base_url('/assets/uploads/bukti/' . $key['bukti']); ?>">
                        <?php else : ?>
                            <img class="w-20" src="<?= base_url('/assets/uploads/bukti/noimage.png') ?>">
                        <?php endif; ?>
                    </td>
                    <!-- Add more table cells if needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>