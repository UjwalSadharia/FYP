<?php   
    include 'db.php';


    if(isset($_POST['cid'])){

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
    <title>LifeTree.com</title>
</head>

<body>
    <input type="text" value="<?php echo $row['customer_id']  ?>" id="cust_id" hidden>
    <div class="mb-3">
        <label for="c_name" class="form-label">Name</label>
        <input type="text" name="c_name" class="form-control" value="<?php echo $row['c_name']  ?>" id="c_name"
            aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="c_email" class="form-label">Email</label>
        <input type="email" name="c_email" value="<?php echo $row['email']  ?>" class="form-control" id="c_email"
            aria-describedby="emailHelp" required>
    </div>

    <div class="mb-3">
        <label for="c_username" class="form-label">Username</label>
        <input type="text" value="<?php echo $row['username']  ?>" name="c_username" class="form-control"
            id="c_username" aria-describedby="" required>
    </div>
    <!-- <div class="mb-3">
                    <label for="c_password" class="form-label">Password</label>
                    <input type="text" name="c_password" value="" class="form-control" id="c_password" aria-describedby=""
                        required>
                </div> -->
    <div class="mb-3">
        <label for="c_phone" class="form-label">Contact No</label>
        <input type="tel" placeholder="" value="<?php echo $row['phone']  ?>" name="c_phone" class="form-control"
            id="c_phone" aria-describedby="" required>
    </div>

    <div class="mb-3">
        <label for="c_address" class="form-label">Address</label>
        <div class="form-floating">
            <textarea class="form-control" name="c_address" placeholder="Leave a address here" id="c_address"
                required><?php echo $row['address']?></textarea>
        </div>
    </div>
    <div class="mb-3">
        <label for="c_city" class="form-label">City</label>
        <input type="text" name="c_city" value="<?php echo $row['city']  ?>" class="form-control" id="c_city"
            aria-describedby="" required>
    </div>
    <div class="mb-3">
        <label for="c_state" class="form-label">State</label>
        <input type="text" name="c_state" value="<?php echo $row['state']  ?>" class="form-control" id="c_state"
            aria-describedby="" required>
    </div>
    <div class="mb-3">
        <label for="c_zipcode" class="form-label">Zipcode</label>
        <input type="text" value="<?php echo $row['zipcode']  ?>" name="c_zipcode" class="form-control" id="c_zipcode"
            aria-describedby="" required>
    </div>
    <div class="mb-3">
        <label for="c_marital_status" class="form-label">Marital Status</label>
        <select class="form-select" id="c_marital_status" name="c_marital_status" aria-label="Default select example">
            <option selected>Select..</option>
            <option value="Married" <?php if($row['marital_status']=='Married' ){ echo 'selected' ; } ?>
                >Married</option>
            <option value="Unmarried" <?php if($row['marital_status']=='Unmarried' ){ echo 'selected' ; } ?>
                >Unmarried</option>
            <option value="Widower" <?php if($row['marital_status']=='Widower' ){ echo 'selected' ; } ?>
                >Widower</option>
            <option value="Widow" <?php if($row['marital_status']=='Widow' ){ echo 'selected' ; } ?>
                >Widow</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="c_dob" class="form-label">Date Of Birth</label>
        <input type="date" value="<?php echo $newDate ?>" name="c_dob" class="form-control" id="c_dob"
            aria-describedby="" required>
    </div>
    <div class="mb-3">
        <label for="c_gender" class="form-label">Gender</label>
        <select class="form-select" id='c_gender' name='c_gender' aria-label="Default select example">
            <option selected disabled>Select..</option>
            <option value="male" <?php if($row['gender']=='male' ){ echo 'selected' ; } ?>
                >Male</option>

            <option value="female" <?php if($row['gender']=='female' ){ echo 'selected' ; } ?>
                >Female</option>

            <option value="others" <?php if($row['gender']=='others' ){ echo 'selected' ; } ?>
                >Others</option>
        </select>
    </div>


    <!-- <button type="cbmit" class="btn btn-primary">Add</button> -->
    <!-- <input class="btn btn-primary" type="submit" value="Update" id="update_signup"> -->





</body>

</html>
<?php
}
?>



<!-- NOMINEE EDIT  -->
<?php
    if(isset($_POST['nid'])){
    //    echo 1;
    $nomineeId = $_POST['nid'];
    $nsql = "SELECT * FROM nominee WHERE nominee_id={$nomineeId}";
    $nquery = mysqli_query($conn,$nsql) or die('sorry something went wronr because of--->'.mysqli_error($conn));

    if(mysqli_num_rows($nquery) > 0){
        $nrow = mysqli_fetch_assoc($nquery);
        // echo $nrow['name'];

    


?>

<!-- NOMINEE FORM START  -->

<form id="nomineeSetUpdate">
    <input type="text" value="<?php  echo $_POST['nid'] ?>" id="updateNid" hidden>
    <div class="mb-3">
        <label for="n_name" class="form-label">Name</label>
        <input type="text" class="form-control" value="<?php echo $nrow['name'] ?>" id="n_name" aria-describedby=""
            required>
    </div>

    <div class="mb-3">
        <label for="n_email" class="form-label">Email</label>
        <input type="text" class="form-control" value="<?php echo $nrow['email'] ?>" id="n_email" aria-describedby=""
            required>
    </div>
    <div class="mb-3">
        <label for="n_address" class="form-label">Address</label>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a address here" id="n_address"
                required><?php echo $nrow['address'] ?></textarea>
        </div>
    </div>
    <div class="mb-3">
        <label for="n_relation" class="form-label">Relation</label>
        <select class="form-select" id="n_relation" aria-label="Default select example">
            <option>Select..</option>
            <option value="Father" <?php if( $nrow['relation'] == 'Father' ){ echo 'selected' ; } ?> >Father</option>
            <option value="Mother" <?php if( $nrow['relation'] == 'Mother'){  echo 'selected' ; }  ?>>Mother</option>
            <option value="Brother" <?php if($nrow['relation'] == 'Brother'){ echo 'selected' ; }  ?> >Brother</option>
            <option value="Wife"  <?php if($nrow['relation'] == 'Wife') { echo 'selected' ; } ?>  >Wife</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="n_gender" class="form-label">Gender</label>
        <select class="form-select" id='n_gender' aria-label="Default select example">
            <option>Select..</option>
            <option value="Male" <?php if($nrow['gender'] == 'Male'){ echo 'selected' ; } ?> >Male</option>
            <option value="Female" <?php if($nrow['gender'] == 'Female'){ echo 'selected' ; } ?> > Female</option>
            <option value="Others" <?php if($nrow['gender'] == 'Others'){ echo 'selected' ; } ?> >Others</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="n_phone" class="form-label">Contact No</label>
        <input type="tel" placeholder="" value="<?php echo $nrow['phone'] ?>" class="form-control" id="n_phone" aria-describedby="" required>
    </div>

    <div class="mb-3">
        <label for="n_dob" class="form-label">Date Of Birth</label>
        <input type="date" name="su_dob" value="<?php echo $nrow['dob'] ?>" class="form-control" id="n_dob" aria-describedby="" required>
    </div>
</form>
<!-- FORM END  -->
<?php

        }else{
            echo 'No Record Found';
        }
    }
?>