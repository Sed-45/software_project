<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header>

    <div id="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="dashboard.php">Home</a>
        <a href="advisor_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
    </div>

</header>