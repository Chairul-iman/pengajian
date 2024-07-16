<?php
$id = $_GET['id'];

include ('koneksi.php');

$sql = "DELETE FROM dokumentasi WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: kelola_dokumentasi.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
