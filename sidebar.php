<div class=" mt-5 col-4">
    <div class="bg-white mb-4 p-3  position-relative">
        <h5 class=" border-start border-3 border-primary ">SEARCH</h5>
        <form class="search-post" action="search.php" method="GET">
            <label for="exampleDataList" class="form-label"> </label>
            <input type="text" name="search" class="form-control  mt-" list="datalistOptions" id="exampleDataList"
                placeholder="Type to search...">
            <button type="submit"
                class="btn btn-primary me-3 mb-8  position-absolute top-50 end-0 rounded-end">SEARCH</button>
        </form>
    </div>
    <div class="container bg-white ">
        <div class="py-4">
            <h5 class=" border-start border-3 border-primary ">RECENT POSTS</h5>
            <?php
  $conn = mysqli_connect("localhost", "root", "", "project") or die("not run");
  $limit=3;

  
 $sql="SELECT post.post_id,post.title,post.post_date,category.category_name,post.category FROM post
  LEFT JOIN category ON post.category=category.category_id
  ORDER BY post.post_id  LIMIT {$limit}";
  $result=mysqli_query($conn,$sql)or die("unsussesfull");

  if(mysqli_num_rows($result)>0){
     while ($row=mysqli_fetch_assoc($result)) { 

                ?>
            <div class="d-flex align-items-center justify-content-center">
                <div class="d-flex ">
                    <div class="p-2 "><img src="news/images/free.jpg" height="80px" class="border border-3">
                    </div>

                    <div class="p-2">
                        <h4 class="text-primary mb-2 fs-5"><a
                                href="single.php?id=<?php echo $row['post_id'];  ?>"><?php echo $row['title'];  ?></a>
                        </h4>
                        <div>

                            <ul class="d-flex list-unstyled m-0">
                                <li class="text-decoration-none ">
                                    <img src="news/images/tag.png" height="15px">
                                    <span><a
                                            href="category.php.php?cid=<?php echo $row['category'];  ?>"><?php echo $row['category_name'];  ?></a></span>
                                </li>
                                <!-- <li>
                                    <img src="news/images/user.png" height="15px">
                                    <span>admin</span>
                                </li> -->
                                <li>
                                    <img src="news/images/calendar.png" height="15px">
                                    <span><?php echo $row['post_date'];  ?></span>
                                </li>
                            </ul>
                            <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>Read
                                more</a>
                        </div>

                    </div>

                </div>
            </div>
            <?php
     }
    }
           ?>

        </div>

    </div>
</div>