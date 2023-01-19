<?php 
    include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- datatable css  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <!-- ALL CUSTOMERS START  -->
    <div class="agent_wrapper  mt-4">
        <!--content  -->
        <h2 class="display-4 text-white">All Customers</h2>
        <p class="lead text-white mb-0">All the detais of customers is listed below.</p>
        <div class="separator my-4"></div>

    </div>

    <div class="customer_wrapper">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Check</th>
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

                </tr>
            </thead>
            <tbody>
                <?php
                            $sql = "SELECT * FROM customer";
                            $query = mysqli_query($conn,$sql) or die("Sorry, something went wrong because of --->".mysqli_error($conn));

                            if(mysqli_num_rows($query) == 0){
                                echo "No data found";
                            }else{
                                while($row=mysqli_fetch_assoc($query)){
                                $imagee = $row['image'];  
      
                        ?>
                <tr>
                    <td class='text-center'>
                        <input type="checkbox" value=<?php echo $row['customer_id']?> data-cbid=
                        <?php echo $row['customer_id']?> name="chk[]" class="checkbox ">
                    </td>
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
                        <?php  echo "<img class='img-fluid  img-thumbnail cust_img' src='../uploaded_image/{$imagee}'>"   ?>
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





                </tr>

                <?php 
        }  }
      ?>
            </tbody>
        </table>
        <!-- <div class="text-center">
            <button class="btn btn-primary" id='merabtn'>Add Nominee</button>
        </div> -->
    </div>

    <!-- ALL CUSTOMERS END  -->


    <!-- ALL POLICIES START -->
    <div class="agent_wrapper  mt-4">
        <!--content  -->
        <h2 class="display-4 text-white">All Policy</h2>
        <p class="lead text-white mb-0">All the detais of Policy is listed below.</p>
        <div class="separator my-4"></div>

    </div>
    <div class="customer_wrapper mt-4">
        <table class="table table-striped add_dt" id="myTable1">
            <thead>
                <tr>
                    <th scope="col">Policy Id</th>
                    <th scope="col">policy Name</th>
                    <th scope="col">Policy Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sum Assured</th>
                    <th scope="col">Premium</th>
                    <th scope="col">Age Limit</th>
                    <th scope="col">Sell Policy</th>
                    <!-- <th scope="col">Delete</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                            $sql = "SELECT * FROM policy";
                            $query = mysqli_query($conn,$sql) or die("Sorry, something went wrong because of --->".mysqli_error($conn));

                            if(mysqli_num_rows($query) == 0){
                                echo "No data found";
                            }else{
                                while($row=mysqli_fetch_assoc($query)){
      
                        ?>
                <tr>
                    <td>
                        <?php echo $row['policy_id']?>
                    </td>
                    <td>
                        <?php echo $row['policy_name']?>
                    </td>
                    <td>
                        <?php echo $row['policy_description']?>
                    </td>
                    <td>
                        <?php echo $row['category']?>
                    </td>
                    <td>
                        <?php echo $row['sum_assured']?>
                    </td>
                    <td>
                        <?php echo $row['premium']?>
                    </td>
                    <td>
                        <?php echo $row['age_limit']?>
                    </td>
                    <td class="table_editbtn">
                        <input type="button" class="btn btn-outline-success" value="Sell" data-pid=<?php echo $row['policy_id']?> id="sellPolicy">



                       
                    </td>

                </tr>

                <?php 
        }  }
      ?>
            </tbody>
        </table>
    </div>

    <!-- ALL POLICIES END   -->



    <!-- ALL MODALS START  -->
     <!-- Modal -->
     <div class="modal fade modal_open" id="sellPolicyModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Sell Policy</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <!-- modal form  -->
                                        <form id="modal_form_body">

                                        </form>


                                    </div>

                                </div>
                            </div>
                        </div>
    <!-- ALL MODALS END  -->


    <!-- JS FILES  -->
    <script src="../jQuery/jquery.js"></script>
    <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
    <!-- datatables js  -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            // Adding data table link 
            $('#myTable').DataTable({
                "scrollX": true,

            });
            // Adding data table link 
            $('#myTable1').DataTable({
                "scrollX": true,
                "bDestroy": true
            });


            // GET CHECKBOX VALUE
            $(document).on('click', '#sellPolicy', function () {
                var policyId = $(this).data('pid');
                // alert(pid);

                if (atLeastOneIsChecked = $('input[name="chk[]"]:checked').length > 0) {

                    $('.checkbox:checked').each(function () {
                        var customerId = $(this).data('cbid');
                        // $('#sellPolicyModal').modal('show');

                        $.ajax({
                            url:'salePolicy.php',
                            type:'POST',
                            data:{
                                policyId:policyId,
                                customerId:customerId
                            },
                            success:function(data){
                                // console.log(data);
                                if(data == 16){
                                    confirm('Nominee not found for this customer, Please add nominee.')
                                }else{
                                    $('#modal_form_body').html(data);
                                    $('#sellPolicyModal').modal('show');
                                }
                            }
                        })

                    })
                } else {
                    alert('Please select customer to sell policy.');
                }
            })


            // SUBMIT SELL PLAN START 

            $('#modal_form_body').on('submit',function(event){
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                url: "salePolicy.php",
                contentType: false,
                data: formData,
                type: "POST",
                processData: false,
                success: function (data) {
                    $('#pl_aadhar').val('');
                    if (data == 1) {
                    alert('ThankYou.');
                    $('#sellPolicyModal').modal('hide');
                    }else{
                    alert('Invalid File Extension');
                    console.log(data);
                    }
                }
                })
            })
            // SUBMIT SELL PLAN END

            // SELECTS ONLY ONE CHECKBOX AT A TIME 
            $('.checkbox').on('change', function () {
                $('.checkbox').not(this).prop('checked', false);
            });
        });
    </script>
</body>

</html>