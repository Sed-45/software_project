<?php
include('..\php\dbh.inc.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentNumber = $_POST["studentNumber"];

    // Perform the database query here and fetch the student information
    $query = "SELECT s.stdname, s.stdnumber, c.CompanyName, c.InternshipStartDate, c.InternshipEndDate, 
                    l.logbookstatus, l.logbookremark, p.Oralexamstatus, p.Oralremarks, p.Oraledate
              FROM sinfo s
              LEFT JOIN company c ON s.std_id = c.std_id
              LEFT JOIN logbook l ON s.std_id = l.std_id
              LEFT JOIN presentation p ON s.std_id = p.std_id
              WHERE s.stdnumber = ?";
    
    $stmt = $conn1->prepare($query);
    $stmt->execute([$studentNumber]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        // Display the student information
        echo "<div class='output-container'>";
        echo "<p><strong>Name:</strong> " . $student['stdname'] . "</p>";
        echo "<p><strong>Student Number:</strong> " . $student['stdnumber'] . "</p>";
        echo "<p><strong>Internship Company Name:</strong> " . $student['CompanyName'] . "</p>";
        echo "<p><strong>Internship Start Date:</strong> " . $student['InternshipStartDate'] . "</p>";
        echo "<p><strong>Internship End Date:</strong> " . $student['InternshipEndDate'] . "</p>";
        echo "<p><strong>Logbook Status:</strong> " . $student['logbookstatus'] . "</p>";
        echo "<p><strong>Logbook Remark:</strong> " . $student['logbookremark'] . "</p>";
        echo "<p><strong>Presentation Status:</strong> " . $student['Oralexamstatus'] . "</p>";
        echo "<p><strong>Presentation Remark:</strong> " . $student['Oralremarks'] . "</p>";
        echo "<p><strong>Presentation Date:</strong> " . $student['Oraledate'] . "</p>";
        echo "</div>";
    } else {
        echo "Student not found";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Lookup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="studentNumber">Enter Student Number:</label>
            <input type="text" id="studentNumber" name="studentNumber" required>
            <button type="submit">Confirm</button>
        </form>
    </div>
</body>
</html>
