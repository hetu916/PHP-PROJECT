<?php
echo $user_Id = $_POST["id"];
echo $firstname = $_POST["first_name"];
echo $lastname = $_POST["last_name"];


echo $conn = mysqli_connect("localhost", "root", "", "project") or die("connection failed");
echo $sql = "UPDATE user SET first_name='{$firstname}',last_name='{$lastname}'WHERE user_id='{$user_Id}'";


if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

?>