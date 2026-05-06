<?php
session_start();
require_once '../koneksi.php';
require_once '../models/M_sekolah.php';

// Cek login
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../index.php?page=login");
    exit();
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {

    case 'simpan':

        $id   = intval($_POST['id'] ?? 0);
        $nama = trim($_POST['nama_sekolah'] ?? '');

        // Validasi
        if (empty($nama)) {
            $_SESSION['flash_message'] = 'Nama level tidak boleh kosong!';
            $_SESSION['flash_type']    = 'danger';
            header("Location: ../index.php?page=sekolah_list");
            exit();
        }

        // Escape
        $nama = mysqli_real_escape_string($conn, $nama);

        if ($id > 0) {
            // UPDATE
            $sql = "UPDATE tb_sekolah SET nama_sekolah='$nama' WHERE id_sekolah=$id";
            $msg = 'Data level berhasil diperbarui!';
        } else {
            // INSERT
            $sql = "INSERT INTO tb_sekolah (nama_sekolah) VALUES ('$nama')";
            $msg = 'Data level berhasil ditambahkan!';
        }

        mysqli_query($conn, $sql);

        $_SESSION['flash_message'] = $msg;
        $_SESSION['flash_type']    = 'success';

        header("Location: ../index.php?page=sekolah_list");
        exit();


    case 'hapus':

        $id = intval($_GET['id'] ?? 0);

        if ($id > 0) {
            mysqli_query($conn, "DELETE FROM tb_sekolah WHERE id_sekolah=$id");

            $_SESSION['flash_message'] = 'Data level berhasil dihapus!';
            $_SESSION['flash_type']    = 'warning';
        }

        header("Location: ../index.php?page=sekolah_list");
        exit();


    default:
        header("Location: ../index.php?page=sekolah_list");
        exit();
}