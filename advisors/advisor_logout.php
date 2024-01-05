<?php

include '..\php\dbh.inc.php';

session_start();
session_unset();
session_destroy();

header('location:../advisors/advisor_login.php');

?>