


<?php   
    include 'db.php';

    $cid = $_POST['cid'];

    $sql = "SELECT * FROM customer WHERE customer_id = {$cid}";
    $query =mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);

    $Date = $row['dob'];
    $newDate = strftime('%Y-%m-%d',strtotime($Date));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <form id="c_submit_form">
                <input type="text" value="<?php echo $row['customer_id']  ?>" id="cust_id" hidden>
                <div class="mb-3">
                    <label for="c_name" class="form-label">Name</label>
                    <input type="text" name="c_name" class="form-control" value="<?php echo $row['c_name']  ?>" id="c_name" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="mb-3">
                    <label for="c_email" class="form-label">Email</label>
                    <input type="email" name="c_email" value="<?php echo $row['email']  ?>" class="form-control" id="c_email" aria-describedby="emailHelp"
                        required>
                </div>
                
                <div class="mb-3">
                    <label for="c_username" class="form-label">Username</label>
                    <input type="text" value="<?php echo $row['username']  ?>" name="c_username" class="form-control" id="c_username" aria-describedby=""
                        required>
                </div>
                <!-- <div class="mb-3">
                    <label for="c_password" class="form-label">Password</label>
                    <input type="text" name="c_password" value="<?php echo $row['password']  ?>" class="form-control" id="c_password" aria-describedby=""
                        required>
                </div> -->
                <div class="mb-3">
                    <label for="c_phone" class="form-label">Contact No</label>
                    <input type="tel" placeholder="" value="<?php echo $row['phone']  ?>" name="c_phone" class="form-control" id="c_phone" aria-describedby=""
                        required>
                </div>
                
                <div class="mb-3">
                    <label for="c_address" class="form-label">Address</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="c_address" placeholder="Leave a address here"
                            id="c_address" required><?php echo $row['address']?></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="c_city" class="form-label">City</label>
                    <input type="text" name="c_city" value="<?php echo $row['city']  ?>" class="form-control" id="c_city" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                    <label for="c_state" class="form-label">State</label>
                    <input type="text" name="c_state" value="<?php echo $row['state']  ?>" class="form-control" id="c_state" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                    <label for="c_zipcode" class="form-label">Zipcode</label>
                    <input type="text" value="<?php echo $row['zipcode']  ?>" name="c_zipcode" class="form-control" id="c_zipcode" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                <label for="c_marital_status" class="form-label">Marital Status</label>
                <select class="form-select" id="c_marital_status" name="c_marital_status" aria-label="Default select example">
                    <option selected>Select..</option>
                    <option value="Married"
                        <?php   
                            if($row['marital_status'] == 'Married'){
                                echo 'selected';
                            }
                        ?>
                    >Married</option>
                    <option value="Unmarried"
                    <?php   
                            if($row['marital_status'] == 'Unmarried'){
                                echo 'selected';
                            }
                        ?>
                    >Unmarried</option>
                    <option value="Widower"
                    <?php   
                            if($row['marital_status'] == 'Widower'){
                                echo 'selected';
                            }
                        ?>
                    >Widower</option>
                    <option value="Widow"
                    <?php   
                            if($row['marital_status'] == 'Widow'){
                                echo 'selected';
                            }
                        ?>
                    >Widow</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="c_dob" class="form-label">Date Of Birth</label>
                    <input type="date" value="<?php echo $newDate ?>" name="c_dob" class="form-control" id="c_dob" aria-describedby=""
                        required>
                </div>
                <div class="mb-3">
                  <label for="c_gender" class="form-label">Gender</label>
                  <select class="form-select" id='c_gender' name='c_gender' aria-label="Default select example">
                    <option selected disabled>Select..</option>
                    <option value="male"
                    <?php   
                            if($row['gender'] == 'male'){
                                echo 'selected';
                            }
                        ?>
                    >Male</option>

                    <option value="female"
                    <?php   
                            if($row['gender'] == 'female'){
                                echo 'selected';
                            }
                        ?>
                    >Female</option>

                    <option value="others"
                    <?php   
                            if($row['gender'] == 'others'){
                                echo 'selected';
                            }
                        ?>
                    >Others</option>
                  </select>
                </div>
                

                <!-- <button type="cbmit" class="btn btn-primary">Add</button> -->
                <input class="btn btn-primary" type="submit" value="Update" id="update_signup">
            </form>


<script src="../jQuery/jquery.js"></script>
<script>

    $(document).ready(function () {
        // UPDATE USER PROFILE 
        $('#c_submit_form').on('submit',function(e){
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
                type:'POST',
                data:{
                    cust_id:cust_id,
                    c_name:c_name,
                    c_email:c_email,
                    c_username:c_username,
                    c_phone:c_phone,
                    c_address:c_address,
                    c_city:c_city,
                    c_state:c_state,
                    c_zipcode:c_zipcode,
                    c_marital_status:c_marital_status,
                    c_dob:c_dob,
                    c_gender:c_gender
                },
                success:function(data){
                    console.log(data);
                    if(data == 1){
                        $('#exampleModal').modal('hide');
                    }
                }
            })
    
          })
    });

</script>
</body>
</html>


 