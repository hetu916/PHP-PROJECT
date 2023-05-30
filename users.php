<?php
include'header2.php';
?>
<div class="row d-flex justify-content-around  " >
    <h3 class="col-1 m-4">All Users </h3>
    <a  href='add-user.php' type="button" class="col-1 d-flex justify-content-center align-items-center  btn btn-primary m-4">Add Users</a>
</div>
<?php
$conn=mysqli_connect("localhost","root","","project") or die("conn failed");
 $limit=3;

 if(isset($_GET['page'])){
   $page=$_GET['page'];
 }else{
   $page=1;
 }
$offset=($page-1)*$limit;
$sql="SELECT* FROM user ORDER BY user_id LIMIT {$offset},{$limit}";
 $result=mysqli_query($conn,$sql)or die("unsussesfull");

if(mysqli_num_rows($result)>0){
 
?>
<!-- </div> -->
<table class="table container"cellpadding="7px">
  <thead class="table-primary">
    <tr>
      <th scope="col ">SR.NO</th>
      <th scope="col"> FIRST NAME</th>
      <th scope="col">LAST NAME</th>
      <th scope="col">USERNAME</th>
      <th scope="col">ROLE</th>
      <th scope="col">ACTION</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
while ($row=mysqli_fetch_assoc($result)) {
   

    ?>
    <tr>
      <th scope="row"><?php echo $row['user_id'] ;  ?></th>
      <td><?php echo $row['first_name'] ;  ?></td>
      <td><?php echo $row['last_name'] ;  ?></td>
      <td><?php echo $row['username'] ;  ?></td>
      <td><?php if($row['role']==1){
        echo"Admin";
     }else{
      echo"Normal";
     }


    ?></td>
      <td><a  href="update-user.php?id=<?php echo $row['user_id'] ;?>" type="button" class="btn btn-primary">Edite</a></td>
      <td><a  href="delete-user.php?id=<?php echo $row['user_id'] ;?>" type="button" class="btn btn-primary">Delete</a></td>
    </tr>
   <?php
}

?>
  </tbody>
</table> 
<?php
}


  $sql1="SELECT* FROM user";
 $result1=mysqli_query($conn,$sql1);

 if(mysqli_num_rows($result1)>0){
  
   $total_records=mysqli_num_rows($result1);
   
 
 $total_page=ceil($total_records/$limit);
 echo' <ul class="pagination justify-content-center">';
 if($page>1){
  echo' <li class="page-item ">
  <a class="page-link" href="users.php?page='.($page-1).'" tabindex="-1" aria-disabled="true">Previous</a>
  </li>';
 }
 
   for($i=1;$i<=$total_page;$i++){

    if($i==$page){

    }
 echo' <li class="page-item"><a class="page-link" href="users.php?page='.$i.'">'.$i.'</a></li>';
  }
  if($total_page>$page){
    echo'<li class="page-item">
    <a class="page-link" href="users.php?page='.($page+1).'">Next</a>
  </li>';
  }
 
 echo'</ul>';
 }



?>
<!-- <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  
</nav>
 -->

</body>
</html>