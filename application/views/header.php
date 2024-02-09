<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS dan JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <style>
        .font-weight-bold {
            font-weight: bold;
            font-size: 5rem !important;
        }

        .service-icon {
            background-color: #fff;
            color: #1D809F;
            height: 15rem;
            width: auto;
            display: flex;
            line-height: 7.5rem;
            font-size: 2.25rem;
            box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.1);
            justify-content: center;
            align-items: center;
            border-radius: 15px !important;
        }

        div#tabelSuara_filter {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        .align-left {
            text-align: left;
        }

        .text-bold {
            font-weight: bold;
        }

        .col-lg-5 canvas#chartSuarabyTPS {
            height: 350px !important;
            width: auto !important;
        }

        span#jumlahSuara {
            color: red;
            font-size: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #profil .w-25 {
            width: 25% !important;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 3px solid #fff;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="#!">Menu</a></li>
            <li class="sidebar-nav-item"><a href="<?= base_url('/') ?>">Beranda</a></li>
            <li class="sidebar-nav-item"><a href="<?= base_url() ?>welcome/inputdata">Tambah Data</a></li>
            <li class="sidebar-nav-item"><a href="<?= base_url() ?>pdfview/data_masuk">Unduh Laporan</a></li>
            <!-- <li class="sidebar-nav-item"><a href="<?= base_url() ?>auth/login">Login</a></li> -->

        </ul>
    </nav>