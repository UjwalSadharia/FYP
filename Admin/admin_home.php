<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user'])){
    header("location:../index.php");
}else{
  if(isset($_POST['reload'])){
  $rqe_sql = "SELECT COUNT(*) FROM agent WHERE STATUS='pending'";
  $req_result = mysqli_query($conn,$rqe_sql) or die ('sorry, somethig went wrong because of-->'.mysqli_query($conn));
  $req_output=mysqli_fetch_array($req_result);
  echo $req_output[0];
  exit;
  }
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
  <link rel="stylesheet" href="../custom code/responsive.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- datatable css  -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>

  <!-- Sidenav start  -->
  <div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex align-items-center">
        <img src="../myimage/admin.jpg" alt="image" class="me-3 admin_img rounded-circle img-thumbnail shadow-sm">
        <div class="media-body">
          <h4 class="m-0">Life Tree</h4>
          <p class="fw-normal text-muted mb-0">Admin</p>
        </div>
      </div>
    </div>

    <p class="text-secondary fw-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-items">
      <div class="row">
          <div class="col-8" style="background-color:#ededed; height: 40px;border-radius: 30px;">
            <a href="admin_home.php" class="nav-link text-dark" id="agent">
              <i class="fa fa-th-large me-3 text-primary fa-fw"></i>
              Agent
            </a>
          </div>
          &nbsp;
          <div class="col-3 my-auto" style='position: relative;'>
          
          <h3 class="col-2 m-0 noti_bell"><i class="fa fa-bell-o text-dark" aria-hidden="true"></i><span id="agent_request"></span></h3>
          </div>
        </div>
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
        <a href="policy.php" class="nav-link text-dark" id="polic">
          <i class="fa fa-file-text me-3 text-primary fa-fw"></i>
          Policy
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
        <a href="chatbot.php"  class="nav-link text-dark">
          <i class="fa fa-comments-o me-3 text-primary fa-fw"></i>
          Chatbot
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
      <div class="row">
        <h2 class="display-4 text-white col-10">Agent Details</h2>
       
        
      </div>
      <p class="lead text-white mb-0">All the details of agent are listed below.</p>
      <div class="separator"></div>
      <!-- table  -->
      <div class="table_parent">
      
      </div>
      <!-- content end -->
    </div>

    
      <!-- Add New agent  -->
      <div class="add_data  pt-5">
            <h2 class="display-4 text-white">Add New Agent</h2>
            <div class="separator"></div>
            <form id ='addAgent'>
                <div class="mb-3">
                    <label for="username"  class="form-label">Username</label>
                    <input type="text" name="pol_name" class="form-control" id="username" pattern="[a-zA-Z0-9-]+" title="Only Alphabets & Numbers allowed" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="pol_name" class="form-control" id="password" pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{0,15}$' title='Include Upper case,lower case,number & special character.'  aria-describedby="emailHelp"
                        required>
                </div>
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="pol_category" pattern="^[A-Za-z -]+$" title="Only Alphabets allowed" class="form-control" id="name" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="pol_sumass" class="form-control" id="email" aria-describedby=""
                        required>
                    <small>Format: anyone@gmail.com</small>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">DOB</label>
                    <input type="date" name="pol_premium" class="form-control" id="dob" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="pol_description" placeholder="Leave a address here"
                            id="address" required></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="pol_agelimit" class="form-control" id="city" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" name="pol_agelimit" class="form-control" id="state" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                    <label for="zipcode" class="form-label">Zipcode</label>
                    <input type="text" name="pol_agelimit" class="form-control" id="zipcode" pattern='^[1-9][0-9]{5}$'  title='Zipcode is of 6 number letters'  aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                    <label for="branch" class="form-label">Branch</label>
                    <input type="text" name="pol_agelimit" class="form-control" id="branch" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select" id='gender' aria-label="Default select example">
                    <option selected disabled>Select..</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Contact No</label>
                    <input type="tel" name="pol_agelimit" class="form-control" id="phone" pattern='[0-9]+' title='Only Phone Number Allowed'  aria-describedby=""
                        required>
                </div>

                <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                <input class="btn btn-primary" type="submit" value="Add Agent" id="save-btn">
            </form>
        </div>


  </div>



  <!-- page content end  -->











  <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
  <script src="../jQuery/jquery.js"></script>
  <!-- datatables js  -->
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


  <script>
    function agent_bell_reload(){
    $.ajax({
      url:'admin_home.php',
      type:'POST',
      data:{reload:true},
      success:function(data){
        // alert(data);
        $('#agent_request').html(data);
      }
    })
    }
    agent_bell_reload();
     

    // nav-links on click side bar should hide
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












    $(document).ready(function () {

     function loadData(){
      $('.table_parent').load('agent_ajax/display.php');
     }
     loadData();




    //  Add New Data 
    $('#addAgent').on('submit',function(event){
      event.preventDefault();
      var username = $('#username').val();
      var password = $('#password').val();
      var name = $('#name').val();
      var email = $('#email').val();
      var dob = $('#dob').val();
      var address = $('#address').val();
      var city = $('#city').val();
      var state = $('#state').val();
      var zipcode = $('#zipcode').val();
      var branch = $('#branch').val();
      var gender = $('#gender').val();
      var phone = $('#phone').val();

      $.ajax({
        url: 'agent_ajax/ajax_insert.php',
        type : 'POST',
        data : {
          username:username,
          password:password,
          name:name,
          email:email,
          dob:dob,
          address:address,
          city:city,
          state:state,
          zipcode:zipcode,
          branch:branch,
          gender:gender,
          phone:phone
        },
        success : function(data){
            if(data == 1){
              loadData();
              $('form').trigger('reset');
            }else{
              alert("Sorry, Unable to insert data");
            }
        }
      })


    })

      // Delete data ajax 
      $(document).on('click', '.delete_btn', function () {
        var id = $(this).data('aid');
        var element = this;

        $.ajax({
          url: 'agent_ajax/ajax_delete.php',
          type: 'post',
          data: { aid: id },
          success: function (data) {
            // console.log(data);
            if (data == 1) {
              $(element).closest('tr').fadeOut();
            } else {
              alert("Sorry, unable to delete");
            }
          }
        })

      });



       // Update agent 
       $(document).on('click','#update_btn',function(){
              var idd = $('#idd').val()
              var username = $('#username').val();
              var password = $('#password').val();
              var name = $('#name').val();
              var email = $('#email').val();
              var dob = $('#dob').val();
              var address = $('#address').val();
              var city = $('#city').val();
              var state = $('#state').val();
              var zipcode = $('#zipcode').val();
              var branch = $('#branch').val();
              var gender = $('#gender').val();
              var phone = $('#phone').val();

              $.ajax({
                url: 'agent_ajax/ajax_update.php',
                type :'POST',
                data : {
                  idd:idd,
                  username:username,
                  password:password,
                  name:name,
                  email:email,
                  dob:dob,
                  address:address,
                  city:city,
                  state:state,
                  zipcode:zipcode,
                  branch:branch,
                  gender:gender,
                  phone:phone
                },
                success : function(data) {
                  if(data == 1){
                    loadData();
                    $('#exampleModal').modal('hide');
                  }else{
                    console.log('Sorry,Unable to update');
                  }
                }

              })
            });


          // agent request table
          $(document).on('click','.noti_bell',function(){
            // alert('ok');
            $('.table_parent').load('agent_ajax/agent_request.php');
          })



      

    });

  </script>
</body>

</html>


<?php
}

?>