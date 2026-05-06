<?php
// models/M_input.php

function getSemuaStudies($conn) {
    $sql = "SELECT i.*, s.nama_sekolah AS level_nama
            FROM tb_input i
            LEFT JOIN tb_sekolah s ON i.id_level = s.id_sekolah
            ORDER BY i.id_input ASC";
    return mysqli_query($conn, $sql);
}

function getStudiesById($conn, $id) {
    $id = intval($id);
    $sql = "SELECT i.*, s.nama_sekolah AS level_nama
            FROM tb_input i
            LEFT JOIN tb_sekolah s ON i.id_level = s.id_sekolah
            WHERE i.id_input = $id LIMIT 1";
    $res = mysqli_query($conn, $sql);
    return $res ? mysqli_fetch_assoc($res) : null;
}

function getSemuaLevel($conn) {
    $sql = "SELECT * FROM tb_sekolah ORDER BY id_sekolah ASC";
    return mysqli_query($conn, $sql);
}

function tambahStudies($conn, $nama, $id_level, $keterangan, $tahun_lulus, $foto_sekolah = '') {

    $nama = mysqli_real_escape_string($conn, $nama);
    $id_level = intval($id_level);
    $keterangan = mysqli_real_escape_string($conn, $keterangan);
    $tahun_lulus = mysqli_real_escape_string($conn, $tahun_lulus);
    $foto_sekolah = mysqli_real_escape_string($conn, $foto_sekolah);

    $sql = "INSERT INTO tb_input 
            (nama_sekolah, id_level, keterangan, tahun_lulus, foto_sekolah)
            VALUES 
            ('$nama', $id_level, '$keterangan', '$tahun_lulus', '$foto_sekolah')";

    return mysqli_query($conn, $sql);
}

function updateStudies($conn, $id, $nama, $id_level, $keterangan, $tahun_lulus, $foto_sekolah = '') {

    $id = intval($id);
    $nama = mysqli_real_escape_string($conn, $nama);
    $id_level = intval($id_level);
    $keterangan = mysqli_real_escape_string($conn, $keterangan);
    $tahun_lulus = mysqli_real_escape_string($conn, $tahun_lulus);
    $foto_sekolah = mysqli_real_escape_string($conn, $foto_sekolah);

    if (!empty($foto_sekolah)) {
        $sql = "UPDATE tb_input SET 
                nama_sekolah='$nama',
                id_level=$id_level,
                keterangan='$keterangan',
                tahun_lulus='$tahun_lulus',
                foto_sekolah='$foto_sekolah'
                WHERE id_input = $id";
    } else {
        $sql = "UPDATE tb_input SET 
                nama_sekolah='$nama',
                id_level=$id_level,
                keterangan='$keterangan',
                tahun_lulus='$tahun_lulus'
                WHERE id_input = $id";
    }

    return mysqli_query($conn, $sql);
}

function hapusStudies($conn, $id) {
    $id = intval($id);
    $sql = "DELETE FROM tb_input WHERE id_input = $id";
    return mysqli_query($conn, $sql);
}
?>