<?php
include 'db.php';
if(isset($_POST['id'])){
$agent_id = $_POST['id'];

$sql = "SELECT * FROM agent WHERE agent_id = '{$agent_id}'";
$query = mysqli_query($conn,$sql) or die("Sorry unable to get data because of---->".mysqli_error($conn));

$output = "";

if(mysqli_num_rows($query) > 0){

   while($row = mysqli_fetch_assoc($query)){

    // making variable for condition checking 
    $gender = $row['gender'];

    // making variable for change in date format
    $Date = $row['dob'];
    $newDate = strftime('%Y-%m-%d',strtotime($Date));



    // $output = "
    ?>
    <input type="text" id="idd" value="<?php echo $row['agent_id']?> " hidden >
    <div class='mb-3'>
        <label for='username' class='form-label'>Username</label>
        <input type='text' name='pol_name' autocomplete="off" value="<?php echo $row['username']?>" class='form-control' id='username' aria-describedby='emailHelp'
            required>
    </div>
    <div class='mb-3'>
        <label for='password' class='form-label'>Password</label>
        <input type='text' name='pol_name' value="<?php echo $row['password'] ?>" class='form-control' id='password' aria-describedby=''
            required>
    </div>
    
    <div class='mb-3'>
        <label for='name' class='form-label'>Name</label>
        <input type='text' name='pol_category' autocomplete="off" value="<?php echo$row['agent_name'] ?>" class='form-control' id='name' aria-describedby=''
            required>
    </div>
    <div class='mb-3'>
        <label for='email' class='form-label'>Email</label>
        <input type='email' name='pol_sumass' value="<?php echo $row['email'] ?>" class='form-control' id='email' aria-describedby=''
            required>
    </div>
    <div class='mb-3'>
        <label for='dob' class='form-label'>DOB</label>
        <input type='date' name='pol_premium'  value= "<?php echo $newDate ?>"  class='form-control' id='dob' aria-describedby=''
            required>
    </div>
    <div class='mb-3'>
        <label for='address' class='form-label'>Address</label>
        <div class='form-floating'>
            <textarea class='form-control' name='pol_description' placeholder='Leave a address here'
                id='address' required> <?php echo $row['address'] ?></textarea>
        </div>
    </div>
    <div class='mb-3'>
        <label for='city' class='form-label'>City</label>
        <input type='text' name='pol_agelimit'  value=" <?php echo $row['city'] ?>" class='form-control' id='city' aria-describedby=''
            required>
    </div>
    <div class='mb-3'>
        <label for='state' class='form-label'>State</label>
        <input type='text' name='pol_agelimit' value=" <?php echo $row['state'] ?>" class='form-control' id='state' aria-describedby=''
            required>
    </div>
    <div class='mb-3'>
        <label for='zipcode' class='form-label'>Zipcode</label>
        <input type='text' name='pol_agelimit' value=" <?php echo $row['zipcode'] ?>" class='form-control' id='zipcode' aria-describedby=''
            required>
    </div>
    <div class='mb-3'>
        <label for='branch' class='form-label'>Branch</label>
        <input type='text' name='pol_agelimit' value=" <?php echo $row['branch'] ?>" class='form-control' id='branch' aria-describedby=''
            required>
    </div>
    <div class='mb-3'>
      <label for='gender' class='form-label'>Gender</label>
      <select class='form-select' id='gender'>
        <option>Select..</option>
        
        <option value='male' <?php 
            if($gender == 'male'){
                echo 'selected';
            }
        ?>>Male</option>

        <option value='female' <?php 
            if($gender == 'female'){
                echo 'selected';
            }
        ?>>Female</option>

        <option value='others'
        <?php 
            if($gender == 'others'){
                echo 'selected';
            }
        ?>
        >others</option>


      </select>
      
    </div>
    <div class='mb-3'>
        <label for='phone' class='form-label'>Contact No</label>
        <input type='tel' name='pol_agelimit' value=" <?php echo $row['phone'] ?>" class='form-control' id='phone' aria-describedby=''
            required>
    </div>
  
    <!-- <button type='submit' class='btn btn-primary'>Add</button> -->
    <input class='btn btn-primary' type='button' value='Update' id='update_btn'>

    <?php
//   ";
   }

//    echo $output;        
}else{
    echo 0;
}
}




// ajax updated 


?>


<?php   
if(isset($_POST['idd'])){
    $idd=$_POST['idd'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $dob=date('Y-m-d',strtotime($_POST['dob']));
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $branch=$_POST['branch'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];

    $sql = "UPDATE agent SET username='{$username}',password='{$password}',agent_name='{$name}',email='{$email}',dob='{$dob}',address='{$address}',city='{$city}',state='{$state}',zipcode={$zipcode},branch='{$branch}',gender='{$gender}',phone='{$phone}' WHERE agent_id={$idd}";

    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 0;
    }
}
?>