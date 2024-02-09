<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('format_angka')) {
    function format_angka($angka)
    {
        return number_format($angka, 0, ',', '.');
    }
}
