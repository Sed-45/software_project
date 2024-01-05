<?php

include '..\php\dbh.inc.php';

session_start();

$advisor_id = $_SESSION['advisor_id'];

if (!isset($advisor_id)) {
    header('location:advisor_login.php');
}

$query = "SELECT * FROM sinfo";
$result = mysqli_query($conn, $query);

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the form fields have names 'stdname', 'stdnumber', 'department', and 'email'
    $stdname = $_POST['stdname'];
    $stdnumber = $_POST['stdnumber'];
    $department = $_POST['department'];
    $email = $_POST['email'];

    // Insert the new student data into the sinfo table
    $insertQuery = "INSERT INTO sinfo (stdname, stdnumber, department, email) VALUES ('$stdname', '$stdnumber', '$department', '$email')";
    mysqli_query($conn, $insertQuery);

    // Get the std_id of the newly inserted student
    $std_id = mysqli_insert_id($conn);

    // Insert a row into the 'company' table
    $insertCompanyQuery = "INSERT INTO company (std_id, CompanyName, InternshipStartDate, InternshipEndDate, internshipType, Country, CIFile) 
                           VALUES ('$std_id', 'n/a', NULL, NULL, 'n/a', 'n/a', 'n/a')";
    mysqli_query($conn, $insertCompanyQuery);

    // Insert a row into the 'logbook' table
    $insertLogbookQuery = "INSERT INTO logbook (std_id, logbookstatus, logbookremark, logbookclaimed, logbooksigned, logbooksubmissiondate) 
                           VALUES ('$std_id', 'n/a', 'n/a', NULL, NULL, NULL)";
    mysqli_query($conn, $insertLogbookQuery);

    // Insert a row into the 'presentation' table
    $insertPresentationQuery = "INSERT INTO presentation (std_id, Oralexamstatus, Oralremarks, Oraledate) 
                                VALUES ('$std_id', 'n/a', 'n/a', NULL)";
    mysqli_query($conn, $insertPresentationQuery);

    // Redirect to prevent form resubmission
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advisor Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'sidebar.php' ?>

<!-- <div id="sidebar">
  <a href="#" onclick="showContent('profile')">Profile</a>
  <a href="#" onclick="showContent('student')">Student</a>
  <a href="advisor_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>

</div> -->

<div id="main">
  <h1>Student List</h1>

  
  <button id="addStudentButton" class="popup-button" onclick="openPopup()"> Add Student</button>

  <!-- Modal for adding a new student -->
<!-- <div id="myModal" class="modal"> -->

<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">

    <form method="post" action="">
        <label for="stdname">Student Name:</label>
        <input type="text" name="stdname" required><br>

        <label for="stdnumber">Student Number:</label>
        <input type="text" name="stdnumber" required><br>

        <label for="department">Department:</label>
        <input type="text" name="department" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Add Student">
    </form>
    <button onclick="closePopup()">Close</button>
<!-- </div> -->
  </div>
</div>


  <table>
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student Number</th>
        <th>Department</th>
      </tr>
    </thead>
    <tbody>

      <?php
          // Fetch and display data from the database
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr id='row_{$row['std_id']}'>";
            echo "<td><a href='student_details.php?std_id={$row['std_id']}'>{$row['stdname']}</a></td>";
            echo "<td>{$row['stdnumber']}</td>";
            echo "<td>{$row['department']}</td>";
            echo "<td><button onclick='deleteStudent({$row['std_id']})'>Delete</button></td>";
            echo "</tr>";
        }
          ?>
      
      
    </tbody>
  </table>
</div>

<script>
    // document.addEventListener('DOMContentLoaded', function () {
    //     var addButton = document.getElementById('addStudentButton');
    //     var modal = document.getElementById('myModal');

    //     addButton.addEventListener('click', function () {
    //         modal.style.display = 'block';
    //     });

    //     window.onclick = function(event) {
    //         if (event.target === modal) {
    //             modal.style.display = 'none';
    //         }
    //     };
    // });

    // function closeModal() {
    //     document.getElementById('myModal').style.display = 'none';
    // }

    // function showContent(content) {
    //     // You can implement logic to load different content based on the button clicked
    //     console.log(`Showing ${content} content`);
    // }
    function openPopup() {
      document.getElementById("popupOverlay").style.display = "flex";
    }

    function closePopup() {
      document.getElementById("popupOverlay").style.display = "none";
    }

    function deleteStudent(std_id) {
    var confirmation = confirm("Are you sure you want to delete this student?");
    if (confirmation) {
      // Send an AJAX request to delete the row from the database
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "delete_student.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // If the delete operation is successful, remove the row from the table
          var row = document.getElementById('row_' + std_id);
          row.parentNode.removeChild(row);
        }
      };
      xhr.send("std_id=" + std_id);
    }
  }

    



</script>


</body>
</html>
