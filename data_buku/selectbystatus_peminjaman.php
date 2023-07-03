<?php
include 'connection.php';

$conn = getConnection();

try {
    $status_peminjaman = $_GET["status_peminjaman"];

    $statement = $conn->prepare("SELECT * FROM peminjaman_master WHERE status_peminjaman = :status_peminjaman;");
    $statement->bindParam(':status_peminjaman', $status_peminjaman);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result, JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>