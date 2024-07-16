<?php
$id = $_GET['id'];

include ('koneksi.php');

$sql = "DELETE FROM artikel WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: kelola_artikel.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
