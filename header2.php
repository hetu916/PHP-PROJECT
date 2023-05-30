<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <title>PROJECT</title>
</head>

<body>

    <div class="navbar navbar-dark bg-primary justify-content-between secondary ps-4  ">
        <div class="py-1"><img src="images/news.jpg" style="width:150px ; height:50px"></div>
        <a href="logout.php" class="btn btn-primary me-4 fw-bold" type="button"> LOGOUT</a>
    </div>

    <nav class="navbar navbar-light " style="background-color: #e3f2fd;">


        <div class="d-grid gap-2 d-md-block">
            <a href="post.php" class="btn btn-primary mx-4" type="button">POST</a>
            <a href="#" class="btn btn-primary me-4" type="button">CATEGORY</a>
            <a href="users.php " class="btn btn-primary me-4" type="button">USERS</a>



            <!-- <a  href="#"class="btn btn-primary ms-" type="button">POLITICS</a> -->
        </div>
        <div class="col-2 d-flex me-4"><label for="exampleDataList" class="form-label m-0 pt-1 fs-5 fw-bold"> Search:</label>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
        </div>


    </nav>