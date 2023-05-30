<?php
$user_Id = $_POST["id"];

print_r($user_Id);
$conn = mysqli_connect("localhost", "root", "", "project") or die("connection failed");
 $sql = "DELETE FROM user WHERE user_id={$user_Id}";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

?>