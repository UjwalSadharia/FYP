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
    <!-- ADD CUSTOMER START  -->
    
    <div class="agent_wrapper">
        <!--content  -->
        <h2 class="display-4 text-white">Add New Customer</h2>
        <p class="lead text-white mb-0">Fill form to add new customer.</p>
        <div class="separator my-4"></div>

    </div>
    <div class="addcustomer_form ">

        <form id="su_submit_form" class="text-start">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="su_name" class="form-label">Name</label>
                        <input type="text" pattern="^[A-Za-z -]+$" title="Only Alphabets allowed" name="su_name"
                            class="form-control" id="su_name" aria-describedby="emailHelp" autocomplete="of" required>
                        <small id="namecheck"></small>
                    </div>
                    <div class="mb-3">
                        <label for="su_email" class="form-label">Email</label>
                        <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="su_email" class="form-control"
                            id="su_email" aria-describedby="emailHelp" autocomplete="off" required>
                        <small>Format: anyone@gmail.com</small>
                    </div>

                    <div class="mb-3">
                        <label for="su_username" class="form-label">Username</label>
                        <input type="text" pattern="[a-zA-Z0-9-]+" title="Only Alphabets & Numbers allowed"
                            name="su_username" autocomplete="of" class="form-control" id="su_username"
                            aria-describedby="" required>
                    </div>
                    <div class="mb-3">
                        <label for="su_password" class="form-label">Password</label>
                        <input type="text" pattern='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{0,15}$'
                            title='Include Upper case,lower case,number & special character.' name="su_password"
                            autocomplete="of" class="form-control" id="su_password" aria-describedby="" required>

                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="su_phone" class="form-label">Contact No</label>
                        <input type="tel" pattern='[0-9]+' title='Only Phone Number Allowed' placeholder=""
                            name="su_phone" autocomplete="of" class="form-control" id="su_phone" aria-describedby=""
                            required>

                    </div>
                    <div class="mb-3">
                        <label for="su_profilepic" class="form-label">User Image</label>
                        <input class="form-control" name="su_profilepic" autocomplete="of" type="file"
                            id="su_profilepic" required>

                    </div>
                    <div class="mb-3">
                        <label for="su_address" class="form-label">Address</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="su_address" autocomplete="of"
                                placeholder="Leave a address here" id="su_address" required></textarea>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="su_city" class="form-label">City</label>
                        <input type="text" name="su_city" class="form-control" autocomplete="of" id="su_city"
                            aria-describedby="" required>

                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                        <label for="su_state" class="form-label">State</label>
                        <input type="text" name="su_state" class="form-control" autocomplete="of" id="su_state"
                            aria-describedby="" required>

                    </div>
                    <div class="mb-3">
                        <label for="su_zipcode" class="form-label">Zipcode</label>
                        <input type="text" pattern='^[1-9][0-9]{5}$' title='Zipcode is of 6 number letters'
                            name="su_zipcode" autocomplete="of" class="form-control" id="su_zipcode" aria-describedby=""
                            required>

                    </div>
                    <div class="mb-3">
                        <label for="su_marital_status" class="form-label">Marital Status</label>
                        <select class="form-select" id="su_marital_status" name="su_marital_status"
                            aria-label="Default select example" required>
                            <option value="">Select..</option>
                            <option value="Married">Married</option>
                            <option value="Unmarried">Unmarried</option>
                            <option value="Widower">Widower</option>
                            <option value="Widow">Widow</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="su_dob" class="form-label">Date Of Birth</label>
                        <input type="date" name="su_dob" class="form-control" autocomplete="of" id="su_dob"
                            aria-describedby="" required>

                    </div>
                    <div class="mb-3">
                        <label for="su_gender" class="form-label">Gender</label>
                        <select class="form-select" id='su_gender' name='su_gender' aria-label="Default select example"
                            required>
                            <option value="">Select..</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>

                    </div>
                </div>
            </div>





            <!-- <button type="submit" class="btn btn-primary">Add</button> -->
            <input class="btn btn-primary" type="submit" value="Add Customer" id="add_signup">
            <input type="reset" class="btn btn-danger">
        </form>
    </div>
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
        <div class="text-center">
            <button class="btn btn-primary" id='merabtn'>Add Nominee</button>
        </div>
    </div>

    <!-- ALL CUSTOMERS END  -->

    



    <!-- *****************ALL THE MODALS ARE LISTED HERE BELOW******************* -->
    <!-- Nominee Modal start -->

    <div class="modal fade" id="nominee_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="">
                        <h2 class="display-4 text-dark pb-3">Add Nominee</h2>
                        <!-- <div class="separator">

                        </div> -->
                        <form id="addNominee">
                            <div class="mb-3">
                                <label for="n_name" class="form-label">Name</label>
                                <input type="text" pattern="^[A-Za-z -]+$" title="Only Alphabets allowed" class="form-control" id="n_name" aria-describedby="" required>
                            </div>
                            <div class="mb-3">
                                <label for="n_customer" class="form-label">Customer Id</label>
                                <input type="number" class="form-control" id="n_customer"  aria-describedby="" required readonly>
                            </div>

                            <div class="mb-3">
                                <label for="n_email" class="form-label">Email</label>
                                <input type="text" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" class="form-control" id="n_email" aria-describedby="" required>
                                <small>Format:- anyone@gmail.com</small>
                            </div>
                            <div class="mb-3">
                                <label for="n_address" class="form-label">Address</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a address here" id="n_address"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="n_relation" class="form-label">Relation</label>
                                <select class="form-select" id="n_relation" aria-label="Default select example" required>
                                    <option value="">Select..</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Wife">Wife</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="n_gender" class="form-label">Gender</label>
                                <select class="form-select" id='n_gender' aria-label="Default select example" required>
                                    <option value="" >Select..</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="n_phone" class="form-label">Contact No</label>
                                <input type="tel" placeholder="" pattern='[0-9]+' title='Only Phone Number Allowed' class="form-control" id="n_phone" aria-describedby=""
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="n_dob" class="form-label">Date Of Birth</label>
                                <input type="date" name="su_dob" class="form-control" id="n_dob" aria-describedby=""
                                    required>
                            </div>



                            <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                            <input class="btn btn-primary" type="submit" value="Add Nominee" id="nominee">
                            
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


    <!-- Nominee Modal end -->





    <!-- JS FILES  -->
    <script src="../jQuery/jquery.js"></script>
    <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
    <!-- datatables js  -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {

            // ADD NEW CUSTOMER 
            $('#su_submit_form').on("submit", function (event) {
                event.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "../sign_up.php",
                    contentType: false,
                    data: formData,
                    type: "POST",
                    processData: false,
                    success: function (data) {
                        $('#su_profilepic').val('');
                        if (data == 1) {
                            alert('ThankYou For Signing Up,Kindly Add Your Nominee Below');
                            $("#su_submit_form").trigger('reset');
                            // $(".customer_wrapper").load(location.href+" .customer_wrapper>*","");
                            $('.dynamic_content').load('addCustomer.php');
                        }
                    }
                })
            })





            // Adding data table link 
            $('#myTable').DataTable({
                "scrollX": true,

            });


            // GET CHECKBOX VALUE
            $(document).on('click', '#merabtn', function () {

                if (atLeastOneIsChecked = $('input[name="chk[]"]:checked').length > 0) {

                    $('.checkbox:checked').each(function () {
                        var iddd = $(this).data('cbid');
                        // alert(iddd);
                        $('#n_customer').val(iddd);
                        $('#nominee_modal').modal('show');
                    })
                } else {
                    alert('Please select customer to add nominee.');
                }



            })

            // SELECTS ONLY ONE CHECKBOX AT A TIME 
            $('.checkbox').on('change', function () {
                $('.checkbox').not(this).prop('checked', false);
            });


            // ADD NOMINEE START 
            $('#addNominee').on('submit', function(e) {
                e.preventDefault();
                var n_name = $('#n_name').val();
                var n_customer = $('#n_customer').val();
                var n_email = $('#n_email').val();
                var n_address = $('#n_address').val();
                var n_relation = $('#n_relation').val();
                var n_gender = $('#n_gender').val();
                var n_phone = $('#n_phone').val();
                var n_dob = $('#n_dob').val();

                $.ajax({
                url: '../Admin/agent_ajax/ajax_insert.php',
                type: 'POST',
                data: {
                    n_name: n_name,
                    n_customer: n_customer,
                    n_email: n_email,
                    n_address: n_address,
                    n_relation: n_relation,
                    n_gender: n_gender,
                    n_phone: n_phone,
                    n_dob: n_dob
                },
                success: function (data) {
                    $('#nominee_modal').modal('hide');
                    alert('Nominee Added successfully.');
                }
                })
            })

        }); 
    </script>
</body>

</html>