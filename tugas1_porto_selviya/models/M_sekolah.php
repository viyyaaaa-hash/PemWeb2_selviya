<?php
// models/M_sekolah.php - Model untuk tb_sekolah (Level)
// Field sesuai tugas: id, nama

function getSemuaSekolah($conn) {
    return mysqli_query($conn, "SELECT * FROM tb_sekolah ORDER BY id_sekolah ASC");
}

function getSekolahById($conn, $id) {
    $id = intval($id);
    $res = mysqli_query($conn, "SELECT * FROM tb_sekolah WHERE id_sekolah = $id LIMIT 1");
    return $res ? mysqli_fetch_assoc($res) : null;
}
