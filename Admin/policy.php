<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user'])){
    header("location:Admin_login.php");
}else{
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
          <!-- Favicon  -->
  <link rel="icon" href="../myimage/favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeTree.com</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- datatable css  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <!-- Sidenav start  -->
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <img src="../myimage/admin.jpg" alt="image"
                    class="me-3 admin_img rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h4 class="m-0">Life Tree</h4>
                    <p class="fw-normal text-muted mb-0">Admin</p>
                </div>
            </div>
        </div>

        <p class="text-secondary fw-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-items">
                <a href="admin_home.php" class="nav-link text-dark " id="agent">
                    <i class="fa fa-th-large me-3 text-primary fa-fw"></i>
                    Agent
                </a>
            </li>

            <li class="nav-items">
                <a href="customer.php" class="nav-link text-dark" id="customer">
                    <i class="fa fa-address-card me-3 text-primary fa-fw"></i>
                    Customer
                </a>
            </li>

            <li class="nav-items">
                <a href="cust_policy.php" class="nav-link text-dark">
                    <i class="fa fa-cubes me-3 text-primary fa-fw"></i>
                    Cust_policy
                </a>
            </li>

            <li class="nav-items">
                <a href="policy.php" style="background-color:#ededed" class="nav-link  text-dark" id="polic">
                    <i class="fa fa-file-text me-3 text-primary fa-fw"></i>
                    Policy
                </a>
            </li>
            <li class="nav-items">
                <a href="chatbot.php"  class="nav-link text-dark">
                <i class="fa fa-comments-o me-3 text-primary fa-fw"></i>
                Chatbot
                </a>
            </li>
            <li class="nav-items">
                <a href="nominee.php" class="nav-link text-dark">
                    <i class="fa fa-users me-3 text-primary fa-fw"></i>
                    Nominee
                </a>
            </li>
            
            <li class="nav-items">
        <a href="report.php"  class="nav-link text-dark">
          <i class="fa fa fa-download me-3 text-primary fa-fw"></i>
          Report
        </a>
      </li>
            <li class="nav-items">
                <a href="admin_logout.php" class="nav-link text-dark">
                    <i class="fa fa-lock  me-3 text-primary fa-fw"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- sidenav end  -->

    <!-- page content start  -->
    <div class="page-content p-5" id="content">
        <!-- toggler  -->
        <div class="menu_btn" style="text-align:end;">
            <button class="btn btn-light bg-white rounded shadow-sm px-4 mb-4" id="sidebar_collapse" type="button">
                <i class="fa fa-bars me-2"></i><small class="text-uppercase fw-bold">Menu</small>
            </button>
        </div>








        <div class="dynamic_content">
            <!--content  -->
            <h2 class="display-4 text-white">Polciy Details</h2>
            <p class="lead text-white mb-0">All the details of Policies are listed below.</p>
            <div class="separator"></div>
            <!-- table  -->
            <div class="table_parent">

            </div>
            <!-- content end -->
        </div>


        <!-- Add data  -->

        <div class="add_data  pt-5">
            <h2 class="display-4 text-white">Add New Policy</h2>
            <div class="separator"></div>
            <form id='reform'>
                <div class="mb-3">
                    <label for="pol_name" class="form-label">Policy Name</label>
                    <input type="text" name="pol_name" autocomplete='off' class="form-control" id="pol_name" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="mb-3">
                    <label for="pol_description" class="form-label">policy_description</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="pol_description" placeholder="Leave a comment here"
                            id="pol_description" required></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="polcat" class="form-label">Category</label>
                    <!-- <input type="text" name="pol_category" class="form-control" id="polcat" aria-describedby=""
                        required> -->

                        <select class="form-select" id="polcat" name="pol_category" aria-label="Default select example" required>
                            <option selected>Select..</option>
                            <option value="group">Group</option>
                            <option value="individual">individual</option>
                        </select>



                </div>
                <div class="mb-3">
                    <label for="sumass" class="form-label">Sum Assured</label>
                    <input type="number" name="pol_sumass" class="form-control" id="sumass" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                    <label for="premiumm" class="form-label">Premium</label>
                    <input type="number" name="pol_premium" class="form-control" id="premiumm" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                    <label for="agelim" class="form-label">Age Limit</label>
                    <input type="number" name="pol_agelimit" class="form-control" id="agelim" aria-describedby=""
                        required>
                </div>

                <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                <input class="btn btn-primary" type="submit" value="Add Policy" id="save-btn">
            </form>
        </div>
    </div>




    <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
    <script src="../jQuery/jquery.js"></script>
    <!-- datatables js  -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        function loadData() {
            $('.table_parent').load('policy_ajax/display.php');
        }
        loadData();

        $(document).ready(function () {

            


            $(".nav-link").click(function () {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            })

            //  menu btn click """"
            $(function () {
                $("#sidebar_collapse").click(function () {
                    $("#sidebar").toggleClass('active');
                    $("#content").toggleClass('active');
                    
                });
            });




            // data load 
            // function loadtable() {
            //     $.ajax({
            //         url: "policy.php",
            //         type: "GET",
            //         success: function (data) {

            //             var contentt = $(data).find('.table_parent');
            //             $('.add_dt').html(contentt).DataTable().ajax.reload();


            //         }
            //     });
            // }

            // Add data 
            $("#save-btn").click(function (event) {
                event.preventDefault();
                var policy_name = $("#pol_name").val();
                var description = $("#pol_description").val();
                var policy_category = $("#polcat").val();
                var policy_sumass = $("#sumass").val();
                var policy_premium = $("#premiumm").val();
                var policy_agelimit = $("#agelim").val();

                $.ajax({
                    url: "policy_ajax/ajax_insert.php",
                    type: "POST",
                    data: {
                        name: policy_name,
                        desc: description,
                        category: policy_category,
                        sumass: policy_sumass,
                        premium: policy_premium,
                        agelimit: policy_agelimit
                    },
                    success: function (data) {
                        if (data == 1) {
                            
                            loadData();
                            $("#pol_name").val('');
                            $("#pol_description").val('');
                            $("#polcat").val('');
                            $("#sumass").val('');
                            $("#premiumm").val('');
                            $("#agelim").val('');


                            // location.reload();
                            //    var help = $("#mytable").DataTable();
                            //    console.log(help);
                            // loadtable();


                        } else {
                            alert("Unable to save record");
                        }
                    }

                });
            })



            // Delete data 
            // $(document).on('click', '.delete_btn', function () {
            //     var pol_id = $(this).data('id');
            //     var element = this;

            //     $.ajax({
            //         url: 'policy_ajax/ajax_delete.php',
            //         type: 'POST',
            //         data: {
            //             id: pol_id
            //         },
            //         success: function (data) {
            //             if (data == 1) {
            //                 $(element).closest('tr').fadeOut();

            //             } else {
            //                 alert("Sorry,unable to delete data!!");
            //             }
            //         }
            //     });

            // });






            // Save updated data 
            // $(document).on('click', '#update-btn', function () {
            //     var pol_id = $("#po_id").val();
            //     var pol_name = $("#pol_name").val();
            //     var pol_desc = $("#pol_description").val();
            //     var pol_cat = $("#polcat").val();
            //     var pol_sumass = $("#sumass").val();
            //     var pol_premium = $("#premiumm").val();
            //     var pol_agelim = $("#agelim").val();

            //     $.ajax({
            //         url: "policy_ajax/ajax_updated.php",
            //         type: "POST",
            //         data: {
            //             id: pol_id,
            //             name: pol_name,
            //             desc: pol_desc,
            //             category: pol_cat,
            //             sumass: pol_sumass,
            //             premium: pol_premium,
            //             agelim: pol_agelim
            //         },
            //         success: function (data) {
            //             if (data == 1) {
            //                 // alert("Data updated successfully");
            //                 // loadtable();
            //                 location.reload();
            //                 // loadData();  


            //             } else {
            //                 alert("Something went wrong");
            //             }
            //         }
            //     });
            // });

        });

    </script>
</body>

</html>

<?php   } ?>