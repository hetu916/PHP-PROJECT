<?php
 $conn=mysqli_connect("localhost","root","","project") or die("conn failed");
 session_start();
 session_unset();
 session_destroy();
 header("Location: http://localhost/hetal/project/index.php");

?>