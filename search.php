<?php
include'header3.php';
?>
<?php
 $conn = mysqli_connect("localhost", "root", "", "project") or die("not run");
 if(isset($_GET['search'])){
  $search_term = mysqli_real_escape_string($conn,$_GET['search']);


?>
<h2 class="border-bottom border-4  border-dark d-inline">search: <?php echo $search_term;  ?></h2>
  <div>
<?php
 
    $limit=3;

 if(isset($_GET['page'])){
   $page=$_GET['page'];
 }else{
   $page=1;
 }
$offset=($page-1)*$limit;
 $sql="SELECT post.post_id,post.title,post.description,post.post_date,post.author,category.category_name,user.username,post.category FROM post
  LEFT JOIN category ON post.category=category.category_id
  LEFT JOIN user ON post.author=user.user_id 
WHERE post.title LIKE '%{$search_term}%'OR post.description LIKE '%{$search_term}%' 
 ORDER BY post.post_id  LIMIT {$offset},{$limit}";

  $result=mysqli_query($conn,$sql)or die("unsussesfull");

  if(mysqli_num_rows($result)>0){
     while ($row=mysqli_fetch_assoc($result)) { 

                ?>

<h4 class="text-primary"><a href="single.php?id=<?php echo $row['post_id'];  ?>"><?php echo $row['title'];  ?></a></h4>
        <div>
            <ul class="d-flex list-unstyled m-0">
                <li class="text-decoration-none">
                    <img src="news/images/tag.png" height="15px">
                    <span><?php echo $row['category_name'];  ?></span>
                </li>
                <li class="ps-2">
                    <img src="news/images/user.png" height="15px">
                    <span><a href='author.php?aid=<?php echo $row['author']; ?>'><?php echo $row['username'];  ?></a></span>
                </li>
                <li class="ps-2">
                    <img src="news/images/calendar.png" height="15px">
                    <span><?php echo  $row['post_date']?></span>
                </li>
            </ul>
        </div>
    <div class="p-3 "><img src="news/images/free.jpg" height="150px" class="border border-3"></div>

    <div class="p-3">
       
        <p><?php echo $row['description']; ?></p>
        <a class='read-more pull-right'href='single.php'>Read more</a>
    </div>
    <?php
    }
}
 }else{
    echo"NO RECORD FOUND";
 }
 

$sql1="SELECT * FROM post WHERE post.title LIKE '%{$search_term}%'";
$result1=mysqli_query($conn,$sql1);

$row1=mysqli_fetch_assoc($result1);
if(mysqli_num_rows($result1) >0){
 
  $total_records=mysqli_num_rows($result1);
//   $total_records=$row1 ['post'];

$total_page=ceil($total_records/$limit);
echo' <ul class="pagination justify-content-center">';
if($page>1){
 echo' <li class="page-item ">
 <a class="page-link" href="index2.php?search='.$search_term.'&page='.($page-1).'" tabindex="-1" aria-disabled="true">Previous</a>
 </li>';
}

  for($i=1;$i<=$total_page;$i++){

   if($i==$page){

   }
echo' <li class="page-item"><a class="page-link" href="index2.php?search='.$search_term.'&page='.$i.'">'.$i.'</a></li>';
 }
 if($total_page>$page){
   echo'<li class="page-item">
   <a class="page-link" href="index2.php?search='.$search_term.'&page='.($page+1).'">Next</a>
 </li>';
 }

echo'</ul>';
}
?>
