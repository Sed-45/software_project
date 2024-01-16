<?php
include 'php/dbh.inc.php';

if (isset($_GET['std_id'])) {
    $std_id = $_GET['std_id'];

    // Fetch the file content from the company table
    $fileContentQuery = "SELECT file_content FROM company WHERE std_id = $std_id";
    $fileContentResult = mysqli_query($conn, $fileContentQuery);
    $fileContentRow = mysqli_fetch_assoc($fileContentResult);

    if ($fileContentRow && isset($fileContentRow['file_content'])) {
        // Output the PDF file content
        header('Content-type: application/pdf');
        echo $fileContentRow['file_content'];
        exit();
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}
