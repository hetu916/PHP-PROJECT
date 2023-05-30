<?php
$search_value=$_POST["search"];
$conn = mysqli_connect("localhost", "root", "", "project") or die("connection failed");
$sql = "SELECT* FROM user WHERE first_name LIKE '%{$search_value}%' OR last_name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '<table border="1"width="100%"cellspacing="2px"cellpadding="10px class="bg-primary">
<tr class="bg-primary" width="200px">
<th >id
</th>
<th class="bg-primary"  width="350px">first name
</th>
<th width="200px">last name
</th>
<th bg-primary>Delete 
</th>
<th bg-primary>Edite 
</th>
</tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr><td>{$row["user_id"]}</td><td>{$row["first_name"]}</td><td>{$row["last_name"]}</td><td><button class='delete-btn btn btn-secondary' data-id='{$row["user_id"]}'>Delete</button></td><td><button class='edit-btn btn btn-secondary'data-bs-toggle='modal'data-bs-target='#exampleModal' data-eid='{$row["user_id"]}'>edit</button></td></tr>";
    }
    $output .= "</table>";
    mysqli_close($conn);
    echo $output;
} else {
    echo "0";
}


?>