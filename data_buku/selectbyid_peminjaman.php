<?php
include 'connection.php';

$conn = getConnection();

try {
    $id_peminjaman = $_GET["id_peminjaman"];

    $statement = $conn->prepare("SELECT * FROM peminjaman_master WHERE id_peminjaman = :id_peminjaman;");
    $statement->bindParam(':id_peminjaman', $id_peminjaman);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result, JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>