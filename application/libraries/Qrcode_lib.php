<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Qrcode_lib {
    public function __construct() {
        // Include the phpqrcode library
        require_once APPPATH . 'libraries/phpqrcode/qrlib.php';
    }

    public function generate($isi_teks, $output_file, $quality = 'H', $ukuran = 5, $padding = 2) {
        // Generate the QR code
        QRcode::png($isi_teks, $output_file, $quality, $ukuran, $padding);
    }
}
?>
