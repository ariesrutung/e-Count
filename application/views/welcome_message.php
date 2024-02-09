<link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
<style>
	img#profil {
		border: 2px solid #fff;
		padding: 0;
	}

	.highcharts-figure,
	.highcharts-data-table table {
		min-width: 320px;
		max-width: 800px;
		margin: 1em auto;
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

	input[type="number"] {
		min-width: 50px;
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

	table.dataTable tbody tr {
		background-color: #ffffff;
		vertical-align: middle;
	}

	.dt-buttons {
		margin-bottom: 10px;
	}

	.card {
		padding: 10px;
		margin: 10px;
	}

	th.w-60.sorting {
		padding-left: 10px;
	}

	th.w-35.sorting {
		padding-left: 10px;
	}

	table.dataTable thead th,
	table.dataTable thead td {
		padding: 8px 0 !important;
	}

	table.dataTable tbody th,
	table.dataTable tbody td {
		padding: 8px 0;
	}

	table.dataTable thead .sorting {
		background-image: none !important;
		padding: 8px 0;
	}

	th.w-10.sorting.sorting_asc,
	td.w-10.sorting_1 {
		text-align: center;
	}

	table.dataTable tfoot th,
	table.dataTable tfoot td {
		padding: 8px 0;
		border-top: 1px solid #111;
	}

	.judul {
		font-size: 18px;
		/* Ubah ukuran font sesuai kebutuhan */
	}
</style>
<header class="masthead d-flex align-items-center">
	<div class="container px-4 px-lg-5 text-center">
		<div class="row d-flex justify-content-center">
			<img id="profil" class="w-25" src="<?= base_url(); ?>assets/assets/img/suryati.jpg" alt="Suryati">
		</div>
		<h1 class="mb-1">e-Count</h1>
		<h3 class="mb-5"><em>Aplikasi Hitung Cepat - Pemilihan Anggota DPRD Dapil 1 Kabupaten Manokwari</em></h3>
		<div class="row gx-4 gx-lg-5 d-flex justify-content-center">
			<div class="col-lg-6 col-md-12 mb-5 mb-lg-0">
				<div class="col-lg-6 col-md-12 text-light rounded-circle mx-auto mb-3 font-weight-bold">
					<span id="jumlahSuara">JUMLAH SUARA LIVE!</span>
					<?php
					// Cek apakah database kosong
					if ($jumlah_suara == 0) {
						// Jika kosong, tampilkan angka 0
						echo '<span id="">0</span>';
					} else {
						// Jika tidak kosong, tampilkan jumlah suara dengan format yang diinginkan
						echo '<span id="">' . number_format($jumlah_suara, 0, ',', '.') . '</span>';
					}
					?>
				</div>
				<h4>Waktu sekarang: <strong id="jam_detik"> <?= $waktu_sekarang_wit; ?></strong></h4>
				<p class="text-faded mb-0"><?= $tanggal_indonesia; ?></p>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-12">
				<?php if (!$this->ion_auth->logged_in()) : ?>
					<a class="btn btn-primary btn-xl text-bold" href="<?= base_url() ?>auth/login">Lapor Sekarang</a>
				<?php endif; ?>
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
			<div id="tabelchart" class="col-lg-6 mb-5">
				<div class="card">
					<div class="row mb-3">
						<h4 class="w-75">Tabel Data Suara by Wilayah TPS</h4>
					</div>
					<div class="table-responsive">
						<table id="tabelSuara" class="table">
							<thead class="bg-dark text-light">
								<tr>
									<th class="w-10">No.</th>
									<th class="w-60">Wilayah TPS</th>
									<th class="w-30">Jumlah Suara</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$totalSuara = 0; // Inisialisasi total suara
								foreach ($data_tps as $key) {
									?>
									<tr>
										<td class="w-10"><?php echo $no; ?></td>
										<td class="w-60">
											<a href='<?php echo base_url('welcome/tabel_tps/') . urlencode($key->wilayah); ?>'>
												<?php echo $key->wilayah; ?>
											</a>
										</td>
										<td class="w-30"><?php echo format_angka($key->total_suara); ?></td>
									</tr>
								<?php
									$no++;
									$totalSuara += $key->total_suara; // Tambahkan suara pada total
								}
								?>
							</tbody>

							<tfoot class="bg-dark text-light">
								<tr>
									<td></td>
									<td class="align-left text-bold">Total Suara:</td>
									<td class="text-bold"><?php echo format_angka($totalSuara); ?></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="row">
						<figure class="highcharts-figure">
							<div id="chartSuara"></div>
						</figure>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Semua Button Cetak -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
	$(document).ready(function() {
		$('#tabelSuara').DataTable({
			searching: false,
			dom: 'Bfrtip',
			buttons: [{
					extend: 'excel',
					text: 'Excel',
					className: 'btn btn-primary btn-sm text-white',
					title: 'Rekap Suara Berdasarkan WIlayah TPS',
					footer: true,

				},
				{
					extend: 'print',
					text: 'Cetak',
					className: 'btn btn-primary btn-sm text-white',
					title: 'Rekap Suara Berdasarkan WIlayah TPS',
					footer: true,

				}
			]
		});
	});
</script>

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

<script>
	Highcharts.chart('chartSuara', {
		chart: {
			type: 'pie'
		},
		title: {
			text: 'Grafik Data Suara by Wilayah TPS'
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
				<?php foreach ($data_tps as $key) : ?> {
						name: '<?php echo $key->wilayah; ?>',
						y: <?php echo $key->total_suara; ?>
					},
				<?php endforeach; ?>
			]
		}]
	});
</script>