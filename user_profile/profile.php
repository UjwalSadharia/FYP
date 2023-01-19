

<?php
include 'db.php';

// UPDATE NOMINEE CHANGE DATA 
if(isset($_POST['updateNid'])){
    extract($_POST);
    $nDate = Date('Y-m-d',strtotime($_POST['n_dob']));
    $nsql = "UPDATE nominee SET name='{$n_name}', email='{$n_email}', address='{$n_address}', relation='{$n_relation}', gender='{$n_gender}', phone={$n_phone}, dob='{$nDate}' WHERE nominee_id={$updateNid}";
    $nquery = mysqli_query($conn,$nsql);
    
    if($nquery){
        echo 1;
    }else{
        echo 2;
    }

    exit;
}

?>


<?php

// UPDATE PROFILE FORM CHANGED DATA 
if(isset($_POST['c_username'])){

    extract($_POST);

    $datee = Date('Y-m-d',strtotime($_POST['c_dob']));

    $usql = "UPDATE customer SET c_name='{$c_name}', email='{$c_email}', username='{$c_username}', phone={$c_phone}, address='{$c_address}', city='{$c_city}', state='{$c_state}', zipcode={$c_zipcode}, marital_status='{$c_marital_status}', dob='{$datee}', gender='{$c_gender}' WHERE customer_id={$cust_id}";

    $uquery = mysqli_query($conn,$usql);

    if($uquery){
        echo 1;
    }else{
        echo 4;
    }

    exit;
}

?>

<?php   

    
    session_start();
    if(isset($_SESSION['user_loggedin'])){
        $sql = "SELECT * FROM customer where customer_id={$_SESSION['user_loggedin_id']}";
                            $query = mysqli_query($conn,$sql) or die("Sorry, something went wrong because of --->".mysqli_error($conn));

                            if(mysqli_num_rows($query) == 0){
                                echo "No data found";
                            }else{
                                while($row=mysqli_fetch_assoc($query)){
                                $imagee = $row['image']; 
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
    <!-- Google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <!-- datatable css  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="responsive.css">
</head>

<body>
    <div class="profile_wrapper">
        <div class="container">

            <div class="row container_row">
                <div class="col-12 col-sm-5 profile_left">
                    <div class="row">
                        <div class="col-12 col-sm-2 ">
                            <i class="bi bi-arrow-left-square-fill back_icon"></i>
                        </div>
                        <div class="col-12 col-sm-10">

                            <img src='../uploaded_image/<?php echo $imagee ?>'
                                class='img-fluid img-thumbnail user_image' alt="user's image">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-7 profile_right">
                    <div class="profile_text">
                        <h1 class="">
                            <?php echo $row['c_name'] ?>
                        </h1>
                        <h5 class='m-0'>
                            <?php echo $row['email'] ?>
                        </h5>
                    </div>
                </div>

            </div>
            <div class="profile_details">
                <ul class="nav nav-tabs justify-content-evenly" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Policy</button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Setting</button>
                    </li> -->
                </ul>
                <div class="tab-content m-5 " id="myTabContent">
                    <!-- profile start  -->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h1 class="text-dark my-5">Personal Details</h1>
                        <div class="user_profile_table" id="setUserProfile">
                            <table class="table table-success table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Customer Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Contact No</th>
                                        <th scope="col">Profile</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Zipcode</th>
                                        <th scope="col">Marital Status</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Edit</th>
                                        <!-- <th scope="col">Delete</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['customer_id']?>
                                        </td>
                                        <td>
                                            <?php echo $row['c_name']?>
                                        </td>
                                        <td>
                                            <?php echo $row['email']?>
                                        </td>
                                        <td>
                                            <?php echo $row['username']?>
                                        </td>
                                        <td>
                                            <?php echo $row['password']?>
                                        </td>
                                        <td>
                                            <?php echo $row['phone']?>
                                        </td>
                                        <td>
                                            <?php  echo "<img class='img-fluid rounded-circle img-thumbnail cust_img' src='../uploaded_image/{$imagee}'>"   ?>
                                        </td>
                                        <td>
                                            <?php echo $row['address']?>
                                        </td>
                                        <td>
                                            <?php echo $row['city']?>
                                        </td>
                                        <td>
                                            <?php echo $row['state']?>
                                        </td>
                                        <td>
                                            <?php echo $row['zipcode']?>
                                        </td>
                                        <td>
                                            <?php echo $row['marital_status']?>
                                        </td>
                                        <td>
                                            <?php echo $row['dob']?>
                                        </td>
                                        <td>
                                            <?php echo $row['gender']?>
                                        </td>
                                        <td class="table_editbtn">
                                            <button type='button' class="edit_btn"
                                                data-cid="<?php echo $row['customer_id']?>"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                        </td>



                                        <!-- <td class="table_delbtn">
                                            <button class="delete_btn" data-id="<?php  echo $row['customer_id']  ?>"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td> -->
                                    </tr>
                                    

                                    <!-- USER PROFILE UPDATE -->
                                    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body formBody">
                                            
                                        </div>
                                        <div class="modal-footer justify-content-start">
                                            <button type="button" id='profileUpdate' class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                    <?php 
                                    }  }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- NOMINEE START  -->
                        <h1 class="text-dark my-5">Nominee Details</h1>
                        <div class="user_profile_table">
                            <table class="table table-success table-striped" id="">
                                <thead>
                                    <tr>
                                        <th scope="col">Nominee Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Customer Id</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Relation</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Contact No</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Edit</th>
                                        <!-- <th scope="col">Delete</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $sql1 = "SELECT * FROM nominee WHERE customer_id={$_SESSION['user_loggedin_id']}";
                            $query1 = mysqli_query($conn,$sql1) or die("Sorry, something went wrong because of --->".mysqli_error($conn));

                            if(mysqli_num_rows($query1) == 0){
                                echo "No data found";
                            }else{
                                while($row1=mysqli_fetch_assoc($query1)){
      
                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $row1['nominee_id']?>
                                        </td>
                                        <td>
                                            <?php echo $row1['name']?>
                                        </td>
                                        <td>
                                            <?php echo $row1['customer_id']?>
                                        </td>
                                        <td>
                                            <?php echo $row1['email']?>
                                        </td>
                                        <td>
                                            <?php echo $row1['address']?>
                                        </td>
                                        <td>
                                            <?php echo $row1['relation']?>
                                        </td>
                                        <td>
                                            <?php echo $row1['gender']?>
                                        </td>
                                        <td>
                                            <?php echo $row1['phone']?>
                                        </td>
                                        <td>
                                            <?php echo $row1['dob']?>
                                        </td>
                                        <td class="table_editbtn">
                                            <button type='button' class="nominee_edit_btn"
                                                data-eid="<?php echo $row1['nominee_id']?>"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </td>

                                        <!-- NOMINEE EDIT MODAL START  -->
                                        <div class="modal fade" id="nomineeEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Nominee</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id='nomineeFillForm'>
                                                
                                            </div>
                                            <div class="modal-footer justify-content-start">
                                                <button type="button" class="btn btn-primary" id='saveEditNominee'>Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                         <!-- NOMINEE EDIT MODAL END  -->

                                        <!-- <td class="table_delbtn">
                                            <button class="nominee_delete_btn"
                                                data-id="<?php  echo $row1['nominee_id']  ?>"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        </td> -->
                                    </tr>

                                    <?php 
        }  }
      ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- profile end  -->



                    <!-- policy start  -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h1 class="text-dark my-5">Purchased Policy</h1>
                        <div class="user_profile_table">
                            <table class="table table-success table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">policy Id</th>
                                        <th scope="col">policy Name</th>
                                        <th scope="col">Customer Id</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Nominee Id</th>
                                        <th scope="col">Nominee Name</th>
                                        <th scope="col">Aadhar Card</th>
                                        <th scope="col">Agent Id</th>
                                        <th scope="col">Agent Name</th>
                                        <th scope="col">Date&Time</th>
                                        <th scope="col">Renew Date</th>
                                        <!-- <th scope="col">Update</th>
                            <th scope="col">Delete</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $psql = "SELECT cp.id,cp.policy_id,p.policy_name,cp.customer_id,c.c_name,cp.nominee_id,n.name,cp.aadhar_card,cp.agent_id,a.agent_name,cp.date,cp.renew_date FROM `customer_policy` cp LEFT JOIN policy p ON cp.policy_id = p.policy_id LEFT JOIN customer c ON cp.customer_id=c.customer_id LEFT JOIN nominee n ON cp.nominee_id=n.nominee_id LEFT JOIN agent a on cp.agent_id=a.agent_id WHERE cp.customer_id={$_SESSION['user_loggedin_id']}";
                            $pquery = mysqli_query($conn,$psql) or die('Sorry something went wrong because of-->'.mysqli_error($conn));

                            while($prow=mysqli_fetch_assoc($pquery)){
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $prow['id']?>
                                        </td>
                                        <td>
                                            <?php echo $prow['policy_id']?>
                                        </td>
                                        <td>
                                            <?php echo $prow['policy_name']?>
                                        </td>
                                        <td>
                                            <?php echo $prow['customer_id']?>
                                        </td>
                                        <td>
                                            <?php echo $prow['c_name']?>
                                        </td>
                                        <td>
                                            <?php echo $prow['nominee_id']?>
                                        </td>
                                        <td>
                                            <?php echo $prow['name']?>
                                        </td>
                                        <td>
                                            <a href="../uploaded_pdf/<?php echo $prow['aadhar_card'] ?>"
                                                target="_blank">
                                                <?php echo $prow['c_name'] ?>.pdf
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $prow['agent_id']?>
                                        </td>
                                        <td>
                                            <?php echo $prow['agent_name']?>
                                        </td>
                                        <td>
                                            <?php echo $prow['date']?>
                                        </td>
                                        <td>
                                            <?php echo $prow['renew_date']?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- Policy end  -->
                    <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact</div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="../bootstrap5/js/bootstrap.min.js"></script> -->
    <!-- JS FILES  -->
    <script src="../jQuery/jquery.js"></script>
    <script src="../bootstrap5/js/bootstrap.bundle.js"></script>


    <script>
        $(document).ready(function () {
            // Adding data table link 
            // $('#myTable').DataTable({
            //     "scrollX": true,
            // });

            //   back button 
            $('.back_icon').click(function () {
                location.replace("../index.php");
            })


            // Delete customer 
            $(document).on('click', '.delete_btn', function () {
                var pol_id = $(this).data('id');
                var element = this;

                $.ajax({
                    url: 'customer_ajax/ajax_delete.php',
                    type: 'POST',
                    data: {
                        id: pol_id
                    },
                    success: function (data) {
                        if (data == 1) {
                            $(element).closest('tr').fadeOut();

                        } else {
                            alert("Sorry,unable to delete data!!" + data);
                        }
                    }
                });

            });


            // edit customer 
            $('.edit_btn').click(function () {
                $('#editProfile').modal('show');
                var cid = $(this).data('cid');

                $.ajax({
                    url: 'update.php',
                    data: { cid: cid },
                    type: 'POST',
                    success: function (data) {
                        $('.formBody').html(data);
                        // console.log(data);
                    }
                })
            })

            // UPDATE USER PROFILE 
            $(document).on('click', '#profileUpdate', function (e) {
                e.preventDefault();
                var cust_id = $('#cust_id').val();
                var c_name = $('#c_name').val();
                var c_email = $('#c_email').val();
                var c_username = $('#c_username').val();
                var c_phone = $('#c_phone').val();
                var c_address = $('#c_address').val();
                var c_city = $('#c_city').val();
                var c_state = $('#c_state').val();
                var c_zipcode = $('#c_zipcode').val();
                var c_marital_status = $('#c_marital_status').val();
                var c_dob = $('#c_dob').val();
                var c_gender = $('#c_gender').val();


                $.ajax({
                    type: 'POST',
                    data: {
                        cust_id: cust_id,
                        c_name: c_name,
                        c_email: c_email,
                        c_username: c_username,
                        c_phone: c_phone,
                        c_address: c_address,
                        c_city: c_city,
                        c_state: c_state,
                        c_zipcode: c_zipcode,
                        c_marital_status: c_marital_status,
                        c_dob: c_dob,
                        c_gender: c_gender
                    },
                    success: function (data) {
                        // console.log(data);
                        if (data == 1) {
                            // $('#exampleModal2').modal('hide');
                            $('#editProfile').modal('hide');
                            location.reload();
                        }
                    }
                })

            })


            // NOMINEE EDIT
            $(document).on('click','.nominee_edit_btn',function(e){
                e.preventDefault();
                $('#nomineeEdit').modal('show');
                var nid = $(this).data('eid');

                $.ajax({
                    url:'update.php',
                    type:'POST',
                    data:{nid:nid},
                    success:function(data){
                        // console.log(data);
                        $('#nomineeFillForm').html(data);
                    }
                })
                
            })

            $(document).on('click','#saveEditNominee',function(){

                var updateNid = $('#updateNid').val();
                var n_name = $('#n_name').val();
                var n_email = $('#n_email').val();
                var n_address = $('#n_address').val();
                var n_relation = $('#n_relation').val();
                var n_gender = $('#n_gender').val();
                var n_phone = $('#n_phone').val();
                var n_dob = $('#n_dob').val();

                $.ajax({
                    type:'POST',
                    data:{
                        updateNid:updateNid,
                        n_name:n_name,
                        n_email:n_email,
                        n_address:n_address,
                        n_relation:n_relation,
                        n_gender:n_gender,
                        n_phone:n_phone,
                        n_dob:n_dob
                    },
                    success: function(data){
                        // console.log(data);
                        $('#nomineeEdit').modal('hide');
                        location.reload();
                    }

                })
                
            })




        })

    </script>
</body>

</html>

<?php
}else{
    header('location:../index.php');
}

?>