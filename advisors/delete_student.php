<?php
include '..\php\dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the student ID from the AJAX request
    $std_id = $_POST['std_id'];

    // Delete the row from the database
    $deleteQuery = "DELETE FROM sinfo WHERE std_id = $std_id";
    mysqli_query($conn, $deleteQuery);

    // You can add additional logic here if needed
    echo "success";
}
?>