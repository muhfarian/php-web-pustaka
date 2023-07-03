<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diinsert
    $nomor_anggota = $_POST["nomor_anggota"];
    $status_peminjaman = $_POST["status_peminjaman"];
    $tanggal_pengembalian = $_POST["tanggal_pengembalian"];
    $durasi_keterlambatan = $_POST["durasi_keterlambatan"];


    // Query INSERT
    $stmt = $conn->prepare("INSERT INTO `peminjaman_master`(`nomor_anggota`, `status_peminjaman`, `tanggal_pengembalian`, `durasi_keterlambatan`) VALUES (:nomor_anggota,:status_peminjaman,:tanggal_pengembalian, :durasi_keterlambatan)");

    // Mengikat parameter dengan nilai
    $stmt->bindParam(':nomor_anggota', $nomor_anggota);
    $stmt->bindParam(':status_peminjaman', $status_peminjaman);
    $stmt->bindParam(':tanggal_pengembalian', $tanggal_pengembalian);
    $stmt->bindParam(':durasi_keterlambatan', $durasi_keterlambatan);

    // Menjalankan query
    $stmt->execute();

    echo "Data peminjaman berhasil ditambahkan.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
