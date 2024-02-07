<section class="content-section" id="portfolio">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading text-center">
            <h3 class="text-secondary mb-0">Grafik</h3>
            <h2 class="mb-5">Data Suara </h2>
        </div>
        <div class="row gx-0">
            <div class="col-lg-5">
                <h4 class="mb-3">Tabel Data Suara by TPS</h4>
                <table id="tabelSuara" class="table table-bordered mt-4">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>No.</th>
                            <th>Nama Saksi</th>
                            <th>Nama TPS</th>
                            <th>Jumlah Suara</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $totalSuara = 0; // Inisialisasi total suara
                        foreach ($data_tps_wilayah as $tps) {
                            echo "<tr>";
                            echo "<td>{$no}</td>";
                            echo "<td>{$tps->nama_lengkap}</td>";
                            echo "<td>{$tps->tps}</td>";
                            echo "<td>{$tps->total_suara}</td>";
                            echo "</tr>";
                            $no++;
                            $totalSuara += $tps->total_suara; // Tambahkan suara pada total
                        }
                        ?>
                    </tbody>
                    <tfoot class="bg-dark text-light">
                        <tr>
                            <td></td>
                            <td colspan="2" class="align-left text-bold">Total Suara:</td>
                            <td class="text-bold"><?php echo $totalSuara; ?></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <div class="row">
                    <h4 class="mb-3">Grafik Data Suara by TPS</h4>
                </div>
                <div class="row">
                    <canvas id="chartSuarabyTPS" height="550" width="650"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="<?= base_url(); ?>welcome">Kembali ke Beranda</a>
        </div>
    </div>
</section>



<!-- Script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ambil data dari PHP dan konversi menjadi array JavaScript
    var dataTpsWilayah = <?php echo json_encode($data_tps_wilayah); ?>;

    // Inisialisasi data untuk chart
    var labels = dataTpsWilayah.map(function(tps) {
        return tps.tps;
    });

    var data = dataTpsWilayah.map(function(tps) {
        return tps.total_suara;
    });

    // Menggambar chart
    var ctx = document.getElementById('chartSuarabyTPS').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                ]
            }]
        }
    });
</script>