<?php
$id = $_GET['id'];

include ('koneksi.php');

$sql = "DELETE FROM rangkuman_ceramah WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: kelola_rangkuman.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
