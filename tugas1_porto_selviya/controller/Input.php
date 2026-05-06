<?php
session_start();
include '../koneksi.php';
include '../models/M_input.php';


// ================= LOGIN =================
if (isset($_POST['action']) && $_POST['action'] == 'login') {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM tb_admin WHERE username='$username'"
    );

    $data = mysqli_fetch_assoc($query);

    if ($data) {

        $_SESSION['admin_id']   = $data['id_admin'];
        $_SESSION['admin_nama'] = $data['nama'];
        $_SESSION['admin_role'] = $data['role'];

        if ($data['role'] == 'admin') {
            header("Location: ../index.php?page=jenis_list");
        } else {
            header("Location: ../index.php?page=home");
        }
        exit();

    } else {
        header("Location: ../index.php?page=login&error=invalid");
        exit();
    }
}


// ================= TAMBAH / UPDATE STUDIES =================
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['action'])) {

    if (!isset($_SESSION['admin_id'])) {
        header("Location: ../index.php?page=login");
        exit();
    }

    $id = intval($_POST['id'] ?? 0);
    $nama = $_POST['nama_sekolah'] ?? '';
    $id_level = intval($_POST['id_level'] ?? 0);
    $tahun_lulus = $_POST['tahun_lulus'] ?? '';
    $keterangan = $_POST['keterangan'] ?? '';
    $foto_sekolah = '';

    // ================= UPLOAD FOTO =================
    if (isset($_FILES['foto_sekolah']) && $_FILES['foto_sekolah']['error'] == 0) {
        $target_dir = '../upload/';
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        $foto_sekolah = basename($_FILES['foto_sekolah']['name']);
        move_uploaded_file($_FILES['foto_sekolah']['tmp_name'], $target_dir . $foto_sekolah);
    }

    // ================= INSERT =================
    if ($id == 0) {
        $result = tambahStudies($conn, $nama, $id_level, $keterangan, $tahun_lulus, $foto_sekolah);
        $msg = 'Data berhasil ditambahkan!';
    } 
    // ================= UPDATE =================
    else {
        $result = updateStudies($conn, $id, $nama, $id_level, $keterangan, $tahun_lulus, $foto_sekolah);
        $msg = 'Data berhasil diperbarui!';
    }

    if ($result) {
        $_SESSION['flash_message'] = $msg;
        $_SESSION['flash_type'] = 'success';
    } else {
        $_SESSION['flash_message'] = 'Error: ' . mysqli_error($conn);
        $_SESSION['flash_type'] = 'danger';
    }

    header("Location: ../index.php?page=jenis_list");
    exit();
}


// ================= DELETE =================
if (isset($_GET['action']) && $_GET['action'] == 'hapus') {

    if (!isset($_SESSION['admin_id'])) {
        header("Location: ../index.php?page=login");
        exit();
    }

    $id = intval($_GET['id'] ?? 0);

    if ($id > 0) {
        $sql = "DELETE FROM tb_input WHERE id_input = $id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['flash_message'] = 'Data berhasil dihapus!';
            $_SESSION['flash_type'] = 'success';
        } else {
            $_SESSION['flash_message'] = 'Error: ' . mysqli_error($conn);
            $_SESSION['flash_type'] = 'danger';
        }
    }

    header("Location: ../index.php?page=jenis_list");
    exit();
}
?>