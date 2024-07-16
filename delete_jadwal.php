<?php
$id = $_GET['id'];

include ('koneksi.php');

$sql = "DELETE FROM jadwal_kajian WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: kelola_jadwal.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
