<?php
    session_start();
    include 'db.php';


    // Individual Plans
    $sql="SELECT * FROM policy WHERE category='individual'";
    $query=mysqli_query($conn,$sql) or die("Sorry unable to execute query because of---->".mysqli_error($conn));

    // Group Plans 
    $sql1="SELECT * FROM policy WHERE category='Group'";
    $query1=mysqli_query($conn,$sql1) or die("Sorry unable to execute query because of---->".mysqli_error($conn));

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeTree.com</title>

    <!-- Favicon  -->
    <link rel="icon" href="myimage/favicon.png">

    <!-- Bootstrap 5 css  -->
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- custom code links -->
    <link rel="stylesheet" href="user_profile/user.css">
    <link rel="stylesheet" href="custom code/responsive.css">
    <link rel="stylesheet" href="custom code/style.css">
</head>

<body>
    <div class="allplans_wrapper">
        <div class="container">
        <i class="bi bi-arrow-left-square-fill back_icon"></i>
            <div class="row container_row1 mb-5">
                <h1 class="mt-5 mb-3 text-center text-light">Pick Your Plan</h1>
                <hr>
            </div>
            <div class="row container_row2">
                <div class="allplan_section">
                    <ul class="nav nav-tabs justify-content-evenly" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Individual</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Group</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- INDIVIDUAL SECTION  -->
                        <div class="tab-pane fade show active features_wrapper" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <!-- <div class="row px-3 py-5 p-sm-5 mx-lg-5 justify-content-evenly"> -->
                            <div class="row my-5 px-3  justify-content-evenly">

                                <?php 
                                if(mysqli_num_rows($query) > 0){
                                while($row = mysqli_fetch_array($query)){
                                ?>
                                <!-- <div class="col-sm-12 col-lg-6 col-xl-6 mb-5"> -->
                                <div class="col-12 col-md-5 mb-5">
                                    <div class="ft-1 ">
                                        <h5 class="card_polid text-end">
                                            <?php  echo $row['policy_id']  ?>
                                        </h5>
                                        <h3>
                                            <?php echo $row["policy_name"] ?>
                                        </h3>
                                        <div class="card_inndiv">
                                            <p class="card_sumass text-center m-0">
                                                <?php  echo $row['sum_assured']  ?>
                                            </p>
                                            <div class="card_txtsumass text-center pb-2">Sum Assured</div>
                                            <p class="features_text">
                                                <?php  echo $row["policy_description"] ?>
                                            </p>
                                            <p class="card_polcat m-0 card_sumass" data-plcat='<?php  echo $row['
                                                category'] ?>'>
                                                <?php  echo $row['category']  ?>
                                            </p>
                                            <div class="card_txtsumass text-center">category</div>
                                            <div class="row pb-2">
                                                <div class="col-6">
                                                    <p class="card_premium text-center m-0 card_sumass">
                                                        <?php  echo $row['premium']  ?>
                                                    </p>
                                                    <div class="card_txtsumass text-center">Premium</div>
                                                </div>
                                                <div class="col-6">
                                                    <p class="card_premium text-center m-0 card_agelimit">
                                                        <?php  echo $row['age_limit']  ?>
                                                    </p>
                                                    <div class="card_txtsumass text-center">Age Limit</div>
                                                </div>
                                            </div>



                                            <p class="card_link text-center"><button class="btn btn-primary"
                                                    data-policyid='<?php echo $row['policy_id'] ?>'
                                                    id="apply_plan">Apply
                                                    <i class="bi bi-arrow-right"></i></button></p>
                                        </div>
                                    </div>
                                </div>

                                <?php } } ?>
                            </div>
                        </div>

                        <!-- GROUP SECTION  -->
                        <div class="tab-pane fade features_wrapper" id="profile" role="tabpanel"
                         aria-labelledby="profile-tab">
                                
                                   <div class="row my-5 px-3  justify-content-evenly">

                                <?php 
                                if(mysqli_num_rows($query1) > 0){
                                while($row1 = mysqli_fetch_array($query1)){
                                ?>
                                <!-- <div class="col-sm-12 col-lg-6 col-xl-6 mb-5"> -->
                                <div class="col-12 col-md-5 mb-5">
                                    <div class="ft-1 ">
                                        <h5 class="card_polid text-end">
                                            <?php  echo $row1['policy_id']  ?>
                                        </h5>
                                        <h3>
                                            <?php echo $row1["policy_name"] ?>
                                        </h3>
                                        <div class="card_inndiv">
                                            <p class="card_sumass text-center m-0">
                                                <?php  echo $row1['sum_assured']  ?>
                                            </p>
                                            <div class="card_txtsumass text-center pb-2">Sum Assured</div>
                                            <p class="features_text">
                                                <?php  echo $row1["policy_description"] ?>
                                            </p>
                                            <p class="card_polcat m-0 card_sumass" data-plcat='<?php  echo $row1['
                                                category'] ?>'>
                                                <?php  echo $row1['category']  ?>
                                            </p>
                                            <div class="card_txtsumass text-center">category</div>
                                            <div class="row pb-2">
                                                <div class="col-6">
                                                    <p class="card_premium text-center m-0 card_sumass">
                                                        <?php  echo $row1['premium']  ?>
                                                    </p>
                                                    <div class="card_txtsumass text-center">Premium</div>
                                                </div>
                                                <div class="col-6">
                                                    <p class="card_premium text-center m-0 card_agelimit">
                                                        <?php  echo $row1['age_limit']  ?>
                                                    </p>
                                                    <div class="card_txtsumass text-center">Age Limit</div>
                                                </div>
                                            </div>



                                            <p class="card_link text-center"><button class="btn btn-primary"
                                                    data-policyid='<?php echo $row1['policy_id'] ?>'
                                                    id="apply_plan">Apply
                                                    <i class="bi bi-arrow-right"></i></button></p>
                                        </div>
                                    </div>
                                </div>

                                <?php } } ?>
                            </div>
                            
                        </div>
                    </div>
                                    <!-- apply policy modal  -->
    <div class="modal fade" id="apply_policy_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="add_data">
              <h2 class="display-4 text-dark pb-5">Apply Policy</h2>
              <div class="separator">

              </div>
              <form id="plan_submit_form">
              
              </form>
            </div>
          </div>

          <!-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
        </div>
      </div>
    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- jQuery  -->
    <script src="jQuery/jquery.js"></script>

    <!-- Bootstrap js  -->
    <script src="bootstrap5/js/bootstrap.bundle.js"></script>
    <script>
        var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
        triggerTabList.forEach(function (triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function (event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })


        $(document).ready(function(){
            
            // Apply for plan 
            $(document).on('click', '#apply_plan', function () {
            <?php if(isset($_SESSION['user_loggedin'])):?>
            
            $("#apply_policy_modal").modal('show');
            var policy_id = $(this).data('policyid');
            console.log(policy_id);
            $.ajax({
                url: 'purchase_plan.php',
                type: 'POST',
                data: { idddd: policy_id },
                success: function (data) {
                $('#plan_submit_form').html(data);
                console.log(data);
                }
            })

            <?php else:?>
            alert('Sign-Up Or LogIn To Apply')
            <?php endif;?>
            })

            $('#plan_submit_form').on('submit',function(event){
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                url: "purchase_plan.php",
                contentType: false,
                data: formData,
                type: "POST",
                processData: false,
                success: function (data) {
                    $('#pl_aadhar').val('');
                    if (data == 1) {
                    alert('ThankYou.');
                    $('#apply_policy_modal').modal('hide');
                    }else{
                    alert('Invalid File Extension');
                    // alert(data);
                    }
                }
                })
            })

             //   back button 
             $('.back_icon').click(function () {
                location.replace("index.php");
            })
        })
    </script>
</body>

</html>