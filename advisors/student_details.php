<?php
include '..\php\dbh.inc.php';

session_start();

$admin_id = $_SESSION['advisor_id'];

if(!isset($admin_id)){
   header('location:advisor_login.php');
}

if (isset($_GET['std_id'])) {
    $std_id = $_GET['std_id'];

    // Fetch data from other tables based on std_id
    $companyQuery = "SELECT * FROM company WHERE std_id = $std_id";
    $logbookQuery = "SELECT * FROM logbook WHERE std_id = $std_id";
    $presentationQuery = "SELECT * FROM presentation WHERE std_id = $std_id";

    $companyResult = mysqli_query($conn, $companyQuery);
    $logbookResult = mysqli_query($conn, $logbookQuery);
    $presentationResult = mysqli_query($conn, $presentationQuery);

    // Display the details as needed
    // ... submission for edit student


        // Fetch student information
        $studentQuery = "SELECT * FROM sinfo WHERE std_id = $std_id";
        $studentResult = mysqli_query($conn, $studentQuery);
        $student = mysqli_fetch_assoc($studentResult);
    
        // Handle form submissions student
        if (isset($_POST['confirm0'])) {
            // Retrieve form data
            $stdname = mysqli_real_escape_string($conn, $_POST['stdname']);
            $stdnumber = mysqli_real_escape_string($conn, $_POST['stdnumber']);
            $department = mysqli_real_escape_string($conn, $_POST['department']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
    
            // Update student info in the database
            $updateStudentQuery = "UPDATE sinfo SET stdname='$stdname', stdnumber='$stdnumber', department='$department', email='$email' WHERE std_id=$std_id";
    
            if (mysqli_query($conn, $updateStudentQuery)) {
                // Query executed successfully
                // Add additional handling if needed
                // ...
                echo "<script>alert('Student information updated successfully!');</script>";
            } else {
                // Query failed
                echo "Error: " . mysqli_error($conn);
            }
        }


    // ... submission for edit company

        // Handle form submissions for Company section
        if (isset($_POST['confirm1'])) {
            // Retrieve form data
            $CompanyName = mysqli_real_escape_string($conn, $_POST['CompanyName']);
            $InternshipStartDate = mysqli_real_escape_string($conn, $_POST['InternshipStartDate']);
            $InternshipEndDate = mysqli_real_escape_string($conn, $_POST['InternshipEndDate']);
            $internshipType = mysqli_real_escape_string($conn, $_POST['internshipType']);
            $Country = mysqli_real_escape_string($conn, $_POST['Country']);
            $CIFile = mysqli_real_escape_string($conn, $_POST['CIFile']);

    
            // Update company info in the database
            $updateCompanyQuery = "UPDATE company SET CompanyName='$CompanyName', InternshipStartDate='$InternshipStartDate', InternshipEndDate='$InternshipEndDate', internshipType='$internshipType', Country='$Country', CIFile='$CIFile' " ;
    
            if (mysqli_query($conn, $updateCompanyQuery)) {
                // Query executed successfully
                // Add additional handling if needed
                // ...
                echo "<script>alert('Company information updated successfully!');</script>";
            } else {
                // Query failed
                echo "Error: " . mysqli_error($conn);
            }
        }

        // Handle form submissions for Logbook section
if (isset($_POST['confirm2'])) {
    // Retrieve form data
    $logbookstatus = mysqli_real_escape_string($conn, $_POST['logbookstatus']);
    $logbookremark = mysqli_real_escape_string($conn, $_POST['logbookremark']);
    $logbookclaimed = mysqli_real_escape_string($conn, $_POST['logbookclaimed']);
    $logbooksigned = mysqli_real_escape_string($conn, $_POST['logbooksigned']);
    $logbooksubmissiondate = mysqli_real_escape_string($conn, $_POST['logbooksubmissiondate']);

    // Update logbook info in the database
    $updateLogbookQuery = "UPDATE logbook SET logbookstatus='$logbookstatus', logbookremark='$logbookremark', logbookclaimed='$logbookclaimed', logbooksigned='$logbooksigned', logbooksubmissiondate='$logbooksubmissiondate' WHERE std_id=$std_id";

    if (mysqli_query($conn, $updateLogbookQuery)) {
        // Query executed successfully
        // Add additional handling if needed
        // ...
        echo "<script>alert('Logbook information updated successfully!');</script>";
    } else {
        // Query failed
        echo "Error: " . mysqli_error($conn);
    }
}

// Handle form submissions for Presentation section
if (isset($_POST['confirm3'])) {
    // Retrieve form data
    $Oralexamstatus = mysqli_real_escape_string($conn, $_POST['Oralexamstatus']);
    $Oralremarks = mysqli_real_escape_string($conn, $_POST['Oralremarks']);
    $Oraledate = mysqli_real_escape_string($conn, $_POST['Oraledate']);

    // Update presentation info in the database
    $updatePresentationQuery = "UPDATE presentation SET Oralexamstatus='$Oralexamstatus', Oralremarks='$Oralremarks', Oraledate='$Oraledate' WHERE std_id=$std_id";

    if (mysqli_query($conn, $updatePresentationQuery)) {
        // Query executed successfully
        // Add additional handling if needed
        // ...
        echo "<script>alert('Presentation information updated successfully!');</script>";
    } else {
        // Query failed
        echo "Error: " . mysqli_error($conn);
    }
}


    

} else {
    header('location:dashboard.php'); // Redirect if std_id is not provided
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Admin Dashboard</title>
</head>
<body>

<?php include 'sidebar.php' ?>

    <div id="main">

        <h2>Dashboard</h2>

        <div class="detail-table">
            <div class="table-content">

                <?php
                if (isset($_GET['std_id'])) {
                    $std_id = $_GET['std_id'];

                    // Fetch student information
                    $studentQuery = "SELECT * FROM sinfo WHERE std_id = $std_id";
                    $studentResult = mysqli_query($conn, $studentQuery);
                    $student = mysqli_fetch_assoc($studentResult);

                    // Display student information
                    echo "<div class='detail-row'>";
                    echo "<button type='button' class='collapsible'>Student info</button>";
                    echo "<div class='content'>";
                    echo "<div class='normal-text'>Name: {$student['stdname']}</div>";
                    echo "<div class='normal-text'>Student Number: {$student['stdnumber']}</div>";
                    echo "<div class='normal-text'>Department: {$student['department']}</div>";
                    echo "<div class='normal-text'>Email: {$student['email']}</div>";

                    echo "<button class='edit-btn' onclick='openPopup0()'>Edit</button>";


                    echo "</div>";
                    echo "</div>";

                    // Fetch and display company information
                    $companyQuery = "SELECT * FROM company WHERE std_id = $std_id";
                    $companyResult = mysqli_query($conn, $companyQuery);
                    $company = mysqli_fetch_assoc($companyResult);
                    
                    echo "<div class='detail-row'>";
                    echo "<button type='button' class='collapsible'>Company info</button>";
                    echo "<div class='content'>";
                    echo "<div class='normal-text'>Company Name: {$company['CompanyName']}</div>";
                    echo "<div class='normal-text'>Internship Start Date: {$company['InternshipStartDate']}</div>";
                    echo "<div class='normal-text'>Internship End Date: {$company['InternshipEndDate']}</div>";
                    echo "<div class='normal-text'>Internship Type: {$company['internshipType']}</div>";
                    echo "<div class='normal-text'>Country: {$company['Country']}</div>";
                    echo "<div class='normal-text'>File: <a href='{$company['CIFile']}' target='_blank'>View File</a></div>";

                    echo "<button class='edit-btn' onclick='openPopup()'>Edit</button>";

                    echo "</div>";
                    echo "</div>";

                    // Fetch and display logbook information
                    $logbookQuery = "SELECT * FROM logbook WHERE std_id = $std_id";
                    $logbookResult = mysqli_query($conn, $logbookQuery);
                    $logbook = mysqli_fetch_assoc($logbookResult);

                    echo "<div class='detail-row'>";
                    echo "<button type='button' class='collapsible'>Logbook info</button>";
                    echo "<div class='content'>";
                    echo "<div class='normal-text'>Status: {$logbook['logbookstatus']}</div>";
                    echo "<div class='normal-text'>Remark: {$logbook['logbookremark']}</div>";
                    echo "<div class='normal-text'>Claimed: {$logbook['logbookclaimed']}</div>";
                    echo "<div class='normal-text'>Signed: {$logbook['logbooksigned']}</div>";
                    echo "<div class='normal-text'>Submission Date: {$logbook['logbooksubmissiondate']}</div>";

                    echo "<button class='edit-btn' onclick='openPopup1()'>Edit</button>";

                    echo "</div>";
                    echo "</div>";

                    // Fetch and display presentation information
                    $presentationQuery = "SELECT * FROM presentation WHERE std_id = $std_id";
                    $presentationResult = mysqli_query($conn, $presentationQuery);
                    $presentation = mysqli_fetch_assoc($presentationResult);

                    echo "<div class='detail-row'>";
                    echo "<button type='button' class='collapsible'>Presentation info</button>";
                    echo "<div class='content'>";
                    echo "<div class='normal-text'>Status: {$presentation['Oralexamstatus']}</div>";
                    echo "<div class='normal-text'>Remarks: {$presentation['Oralremarks']}</div>";
                    echo "<div class='normal-text'>Date: {$presentation['Oraledate']}</div>";

                    echo "<button class='edit-btn' onclick='openPopup2()'>Edit</button>";

                    echo "</div>";
                    echo "</div>";
                } else {
                    header('location:dashboard.php'); // Redirect if std_id is not provided
                }
                ?>


<div class="popup-overlay0" id="popupOverlay0">
    <div class="popup-content">

    <form method="post" action="" >
    <label for="stdname">Student Name:</label>
    <input type="text" name="stdname" value="<?php echo $student['stdname']; ?>" required><br>

    <label for="stdnumber">Student Number:</label>
    <input type="text" name="stdnumber" value="<?php echo $student['stdnumber']; ?>" required><br>

    <label for="department">Department:</label>
    <input type="text" name="department" value="<?php echo $student['department']; ?>" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br>

    <input type="submit" value="confirm" name="confirm0">
</form>

    <button onclick="closePopup0()">Close</button>
    
  </div>
</div>


<div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">

    <form method="post" action="">
    <label for="CompanyName">Company Name:</label>
    <input type="text" name="CompanyName" value="<?php echo $company['CompanyName']; ?>" required><br>

    <label for="InternshipStartDate">Internship Start Date:</label>
    <input type="date" name="InternshipStartDate" value="<?php echo $company['InternshipStartDate']; ?>" required><br>

    <label for="InternshipEndDate">Internship End Date:</label>
    <input type="date" name="InternshipEndDate" value="<?php echo $company['InternshipEndDate']; ?>" required><br>

    <label for="internshipType">Internship Type:</label>
    <input type="text" name="internshipType" value="<?php echo $company['internshipType']; ?>" required><br>

    <label for="Country">Country:</label>
    <input type="text" name="Country" value="<?php echo $company['Country']; ?>" required><br>

    <label for="CIFile">CIF:</label>
    <input type="file" name="CIFile" accept="image/png, image/jpeg, .doc, .docx, .pdf"><br>

    <input type="submit" value="confirm" name="confirm1">
</form>

    <button onclick="closePopup()">Close</button>

  </div>
</div>

<div class="popup-overlay1" id="popupOverlay1">
    <div class="popup-content">

    <form method="post" action="">
    <label for="logbookstatus">Status</label>
    <input type="text" name="logbookstatus" value="<?php echo $logbook['logbookstatus']; ?>" required><br>

    <label for="logbookremark">Remark</label>
    <input type="text" name="logbookremark" value="<?php echo $logbook['logbookremark']; ?>" required><br>

    <label for="logbookclaimed">Claimed</label>
    <input type="date" name="logbookclaimed" value="<?php echo $logbook['logbookclaimed']; ?>" required><br>

    <label for="logbooksigned">Signed</label>
    <input type="date" name="logbooksigned" value="<?php echo $logbook['logbooksigned']; ?>" required><br>

    <label for="logbooksubmissiondate">Submission Date</label>
    <input type="date" name="logbooksubmissiondate" value="<?php echo $logbook['logbooksubmissiondate']; ?>" required><br>

    <input type="submit" value="confirm" name="confirm2">
</form>

    <button onclick="closePopup1()">Close</button>
    
  </div>
</div>

<div class="popup-overlay2" id="popupOverlay2">
    <div class="popup-content">

    <form method="post" action="">
    <label for="Oralexamstatus">Status</label>
    <input type="text" name="Oralexamstatus" value="<?php echo $presentation['Oralexamstatus']; ?>" required><br>

    <label for="Oralremarks">Remarks</label>
    <input type="text" name="Oralremarks" value="<?php echo $presentation['Oralremarks']; ?>" required><br>

    <label for="Oraledate">Date</label>
    <input type="date" name="Oraledate" value="<?php echo $presentation['Oraledate']; ?>" required><br>

    <input type="submit" value="confirm" name="confirm3">
</form>

    <button onclick="closePopup2()">Close</button>
    
  </div>
</div>

            </div>
        </div>

    </div>
    
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;
        
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
        }

        
    function openPopup0() {
      document.getElementById("popupOverlay0").style.display = "flex";
    }

    function closePopup0() {
      document.getElementById("popupOverlay0").style.display = "none";
    }

        function openPopup() {
      document.getElementById("popupOverlay").style.display = "flex";
    }

    function closePopup() {
      document.getElementById("popupOverlay").style.display = "none";
    }

    function openPopup1() {
      document.getElementById("popupOverlay1").style.display = "flex";
    }

    function closePopup1() {
      document.getElementById("popupOverlay1").style.display = "none";
    }

    function openPopup2() {
      document.getElementById("popupOverlay2").style.display = "flex";
    }

    function closePopup2() {
      document.getElementById("popupOverlay2").style.display = "none";
    }

    </script>
</body>
</html>
