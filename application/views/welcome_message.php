<!-- Header-->
<header class="masthead d-flex align-items-center">
	<div class="container px-4 px-lg-5 text-center">
		<div class="row d-flex justify-content-center">
			<img class="w-25" src="<?= base_url('') ?>assets/assets/img/suryati.jpg" alt="Suryati">
		</div>
		<h1 class="mb-1">e-Count</h1>
		<h3 class="mb-5"><em>Aplikasi Hitung Cepat - Pemilihan Anggota DPRD Dapil 1 Kabupaten Manokwari</em></h3>
		<div class="row gx-4 gx-lg-5 d-flex justify-content-center">
			<div class="col-lg-6 col-md-12 mb-5 mb-lg-0">
				<div class="col-lg-6 col-md-12 text-light rounded-circle mx-auto mb-3 font-weight-bold">
					<span id="jumlahSuara">JUMLAH SUARA LIVE!</span>
					<span id=""><?= number_format($jumlah_suara, 0, ',', '.'); ?></span>
				</div>
				<h4>Waktu sekarang: <strong id="jam_detik"> <?= $waktu_sekarang_wit; ?></strong></h4>
				<p class="text-faded mb-0"><?= $tanggal_indonesia; ?></p>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-12">
				<a class="btn btn-primary btn-xl text-bold" href="<?= base_url() ?>welcome/inputdata">Lapor Sekarang</a>
			</div>
		</div>
	</div>
</header>
<section class="content-section" id="portfolio">
	<div class="container px-4 px-lg-5">
		<div class="content-section-heading text-center">
			<h3 class="text-secondary mb-0">Grafik</h3>
			<h2 class="mb-5">Data Suara</h2>
		</div>
		<div class="row gx-0">
			<div id="tabelchart" class="col-lg-5 mb-5">
				<div class="row mb-3">
					<h4 class="w-75">Tabel Data Suara by Wilayah TPS</h4>
					<a href="<?php echo base_url('welcome/generatePDF'); ?>" class="btn btn-primary btn-sm w-25">Generate PDF</a>
				</div>
				<div class="table-responsive">
					<table id="tabelSuara" class="table table-borderless">
						<thead class="bg-dark text-light">
							<tr>
								<th>No.</th>
								<th>Nama Wilayah</th>
								<th>Jumlah Suara</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$totalSuara = 0; // Inisialisasi total suara
							foreach ($data_tps as $key) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td>
										<a href='<?php echo base_url('welcome/tabel_tps/') . urlencode($key->wilayah); ?>'>
											<?php echo $key->wilayah; ?>
										</a>
									</td>
									<td><?php echo $key->total_suara; ?></td>
								</tr>
							<?php
								$no++;
								$totalSuara += $key->total_suara; // Tambahkan suara pada total
							}
							?>
						</tbody>

						<tfoot class="bg-dark text-light">
							<tr>
								<td colspan="2" class="align-left text-bold">Total Suara:</td>
								<td class="text-bold"><?php echo $totalSuara; ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-6">
				<div class="row">
					<h4 class="mb-3">Grafik Data Suara by Wilayah TPS</h4>
				</div>
				<div class="row">
					<canvas id="chartSuara" height="550"></canvas>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
	function updateDetik() {
		var detikElement = document.getElementById("jam_detik");
		var jamWit = new Date().toLocaleTimeString('en-GB', {
			timeZone: 'Asia/Jayapura',
			hour12: false
		});
		detikElement.innerHTML = jamWit;
	}

	setInterval(updateDetik, 1000);
</script>

<script>
	var dataWilayah = <?php echo json_encode($data_tps); ?>;

	var labels = [];
	var data = [];

	for (var i = 0; i < dataWilayah.length; i++) {
		labels.push(dataWilayah[i].wilayah);
		data.push(dataWilayah[i].total_suara);
	}

	var ctx = document.getElementById('chartSuara').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: labels,
			datasets: [{
				data: data,
				backgroundColor: [
					'rgba(255, 99, 132, 0.8)',
					'rgba(54, 162, 235, 0.8)',
					'rgba(255, 206, 86, 0.8)',
					'rgba(75, 192, 192, 0.8)',
					'rgba(153, 102, 255, 0.8)',
					'rgba(255, 159, 64, 0.8)'
				],
			}]
		},
		options: {
			indexAxis: 'y',
			responsive: true,
			maintainAspectRatio: false
		},
	});
</script>

<!-- <script>
	setInterval(function() {
		location.reload();
	}, 5000);
</script> -->

<script>
	function blinkElement(element, interval) {
		setInterval(function() {
			element.style.visibility = (element.style.visibility === 'visible') ? 'hidden' : 'visible';
		}, interval);
	}
	var jumlahSuaraElement = document.getElementById('jumlahSuara');
	blinkElement(jumlahSuaraElement, 500);
</script>