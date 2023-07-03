<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diinsert
    $kode_buku = $_POST["kode_buku"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    $harga = $_POST["harga"];
    $kategori_kode = $_POST["kategori_kode"];

    // Query INSERT
    $stmt = $conn->prepare("INSERT INTO `buku`(`kode_buku`, `judul`, `pengarang`, `penerbit`, `tahun`, `harga`, `kategori_kode`) VALUES (:kode_buku,:judul,:pengarang,:penerbit,:tahun,:harga,:kategori_kode)");

    // Mengikat parameter dengan nilai
    $stmt->bindParam(':kode_buku', $kode_buku);
    $stmt->bindParam(':judul', $judul);
    $stmt->bindParam(':pengarang', $pengarang);
    $stmt->bindParam(':penerbit', $penerbit);
    $stmt->bindParam(':tahun', $tahun);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':kategori_kode', $kategori_kode);

    // Menjalankan query
    $stmt->execute();

    echo "Data buku berhasil ditambahkan.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
