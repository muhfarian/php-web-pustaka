<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diinsert
    $id_peminjaman_master = $_POST["id_peminjaman_master"];
    $kode_buku = $_POST["kode_buku"];


    // Query INSERT
    $stmt = $conn->prepare("INSERT INTO `peminjaman_detail`(`id_peminjaman_master`, `kode_buku`) VALUES (:id_peminjaman_master,:kode_buku)");

    // Mengikat parameter dengan nilai
    $stmt->bindParam(':id_peminjaman_master', $id_peminjaman_master);
    $stmt->bindParam(':kode_buku', $kode_buku);

    // Menjalankan query
    $stmt->execute();

    echo "Data peminjaman berhasil ditambahkan.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
