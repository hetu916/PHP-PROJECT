<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>ajax </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'> -->
    <!-- <script src='main.js'></script> -->
    <script type="text/javascript" src="JS/jquary.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>

<body>
    <?php



    include 'header2.php';

    ?>

    <table id="main" border="0" cellspacing="0" class="table-primary">
        <tr>
            <td id="table-load" class=" d-flex justify-content-center mt-3 aling">
                <!-- <input type="button" id="load-button" value="Load Data" class="bg-secondary fs-5 fw-bold"> -->
                <form id="add-form" class="row gx-3 gy-2 align-items-center 
    justify-content-end">
                    <input type="button" id="load-button" value="Load Data"
                        class="col-sm-2 d-flex bg-secondary fs-5 fw-bold" style="width-50px">

                    <div class="col-sm-4">
                        <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-text">first name</div>
                            <input type="text" id="fname" class="form-control" id="specificSizeInputGroupUsername"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-text">last name</div>
                            <input type="text" id="lname" class="form-control" id="specificSizeInputGroupUsername"
                                placeholder="">
                        </div>
                    </div>

                    <div class="col-auto">
                        <button type="submit" id="submit-button" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </td>
        </tr>
        <table class="d-flex justify-content-center mt-3" cellspacing="2px" cellpadding="10px">
            <tr class>

                <td id="table-data" width="1000px" class="mt-7">

                </td>
            </tr>
        </table>

        <div id="error-message"></div>
        <div id="success-message"></div>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="exampleModalLabel">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edite Form </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <table>
                    </table>

                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            function loadTable() {
                $.ajax({
                    url: "ajax-load.php",
                    type: "POST",
                    success: function(data) {
                        $("#table-data").html(data);
                    }
                });
            }



            $(document).ready(function() {
                $("#load-button").on("click", function(e) {
                    // console.log(Document);
                    $.ajax({
                        url: "ajax-load.php",
                        type: "POST",
                        success: function(data) {
                            $("#table-data").html(data);

                        }
                    });
                });
                loadTable();

                $("#submit-button").on("click", function(e) {
                    e.preventDefault();
                    var fname = $("#fname").val();
                    var lname = $("#lname").val();
                    if (fname == "" || lname == "") {
                        $("#error-message").html("allfields are required.").slideDown();
                        $("#success-message").slideDown();
                    }
                    $.ajax({
                        url: "ajax-insert.php",
                        type: "POST",
                        data: {
                            first_name: fname,
                            last_name: lname
                        },
                        success: function(data) {
                            if (data == 1) {
                                loadTable();
                                $("#add-form").trigger("reset");
                            } else {
                                alert("cant save");
                            }

                        }

                    });
                });
                $(document).on("click", ".delete-btn", function() {
                    if (confirm("do you went to really delete this messge?")) {
                        var userId = $(this).data("id");
                        var element = this;
                        console.log(userId, this);
                        $.ajax({
                            url: "ajax-delete.php",
                            type: "POST",
                            data: {
                                id: userId
                            },
                            success: function(data) {
                                console.log(data);
                                if (data == 1) {
                                    $(element).closest("tr").fadeOut();

                                } else {
                                    $("#error-message").html(
                                        "CANT DELETE RECORDS .").slideDown();
                                }
                                loadTable();
                            }

                        });

                    }


                });
                $(document).on("click", ".edit-btn", function() {
                    $("#exampleModal").show();
                    var userId = $(this).data("eid");
                    console.log(userId, this)
                    alert(userId);
                    $.ajax({
                        url: "update-form.php",
                        type: "POST",
                        data: {
                            id: userId
                        },
                        success: function(data) {
                            $("#exampleModal table").html(data);
                        }

                    });

                });
                $(document).on("click", "#edit-submit", function() {
                    var uId = $("#edit-id").val();
                    var fname = $("#edit-fname").val();
                    var lname = $("#edit-lname").val();
                    $.ajax({
                        url: "ajax-update-form.php",
                        type: "POST",
                        data: {
                            id: uId,
                            first_name: fname,
                            last_name: lname
                        },
                        success: function(data) {
                            if (data == 1) {

                                $("modal").hide();

                            }
                            loadTable();
                        }

                    });
                });

                $("#exampleDataList").on("keyup", function() {
                    var search_term = $(this).val();
                    $.ajax({
                        url: "ajax-search.php",
                        type: "POST",
                        data: {
                            search: search_term
                        },
                        success: function(data) {
                            $("#table-data").html(data);
                        }
                       
                    });
                });
            });



        });
        </script>



</body>


</html>