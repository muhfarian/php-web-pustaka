<?php
// Konfigurasi koneksi ke database
include 'connection.php';

$conn = getConnection();

try {
    // Data yang akan diupdate
    $kode_buku = $_POST["kode_buku"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    $harga = $_POST["harga"];
    $kategori_kode = $_POST["kategori_kode"];

    // Query UPDATE
    $stmt =$conn->prepare("UPDATE buku SET judul = :judul, pengarang = :pengarang, penerbit = :penerbit, tahun = :tahun, harga = :harga, kategori_kode = :kategori_kode WHERE kode_buku = :kode_buku");

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

    echo "Buku berhasil diupdate.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
