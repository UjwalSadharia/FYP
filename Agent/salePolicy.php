<?php
    session_start();
    include 'db.php';

    if(isset($_POST['policyId']) && isset($_POST['customerId'])){
        $policy_id = $_POST['policyId'] ;
        $cust_id = $_POST['customerId'];



        // policy sql 
        $pol_sql= "SELECT * FROM policy WHERE policy_id={$policy_id}";
        $pol_query =mysqli_query($conn,$pol_sql) or die('Sorry,Unable to get data because of--->'.mysqli_error($conn));
        $pol_row=mysqli_fetch_assoc($pol_query);

        // Customer sql 
        $csql = "SELECT * FROM customer WHERE customer_id={$cust_id}";
        $cquery = mysqli_query($conn,$csql) or die('something went wrong--->'.mysqli_error($conn));
        $row = mysqli_fetch_assoc($cquery);
        // nominee sql 
        $n_sql = "SELECT * FROM nominee where customer_id={$cust_id}";
        $n_query = mysqli_query($conn,$n_sql) or die('something went wrong--->'.mysqli_error($conn));

        if(mysqli_num_rows($n_query) > 0){
            
       
        $n_row=mysqli_fetch_assoc($n_query);

        ?>

<div class="mb-3">
    <label for="pl_policyid" class="form-label">Policy Name</label>
    <input type="text" value='<?php echo $policy_id  ?>' name="pl_policyid" class="form-control" id="pl_policyid"
        aria-describedby="" readonly required hidden>
    <input type="text" value='<?php echo $pol_row['policy_name'] ?>' name="" class="form-control" id=""
    aria-describedby="" readonly required >
</div>

<div class="mb-3">
    <label for="pl_customerid" class="form-label">Customer Name</label>
    <input class="form-control" value='<?php echo $cust_id?>' name="pl_customerid" type="number" id="pl_customerid" readonly hidden>
    <input class="form-control" value='<?php  echo $row['c_name']  ?>' name="" type="text" id="" readonly>
</div>

<div class="mb-3">
    <label for="pl_nomineeid" class="form-label">Nominee Name</label>
    <input class="form-control" value='<?php echo $n_row['nominee_id'] ?>' name="pl_nomineeid" type="number"
    id="pl_nomineeid" readonly hidden>
    <input class="form-control" value='<?php echo $n_row['name'] ?>' name="" type="text" id="" readonly >
</div>

<div class="mb-3">
    <label for="pl_aadhar" class="form-label">Aadhar Card</label>
    <input class="form-control" name="pl_aadhar" type="file" id="pl_aadhar" required>
    <small>File Format:-PDF</small>
</div>

<div class="mb-3">
    <label for="su_marital_status" class="form-label">Agent Id</label>
    <input type="text" value="<?php echo $_SESSION['agentId'] ?>" class="form-control" id="pl_agentid" name="pl_agentid" readonly>
</div>

<!-- <button type="submit" class="btn btn-primary">Add</button> -->
<input class="btn btn-success" type="submit" value="Confirm" id="pl_purchase">







<?php

        }else{
            echo 16;
            exit;
        }
    }
?>

<?php
    if(isset($_FILES['pl_aadhar']['name'])){
        extract($_POST);
      
        $dt1=date('Y-m-d');
        // renew Date 
        $renew=date('Y-m-d',strtotime(' + 1 years'));
      
        // Managing Aadhar Card
        $aadharPdf = $_FILES['pl_aadhar']['name'];
        $extension = pathinfo($aadharPdf,PATHINFO_EXTENSION);
        $valid_extension = ['pdf'];
      
        if(in_array($extension,$valid_extension)){
          // $newName = $aadharPdf.generateRandomString();
          $new_name = rand() . "." . $extension;
          $path = "../uploaded_pdf/" . $new_name;
      
          if(move_uploaded_file($_FILES['pl_aadhar']['tmp_name'],$path)){
            $p_sql = "INSERT INTO customer_policy(policy_id,customer_id,nominee_id,aadhar_card,agent_id,date,renew_date)VALUES({$pl_policyid},{$pl_customerid},{$pl_nomineeid},'{$new_name}',{$pl_agentid},'{$dt1}','{$renew}')";
            if(mysqli_query($conn,$p_sql)){
              echo 1;
            }else{
              die('error-->'.mysqli_error($conn));
            }
            
          }else{
            echo 4;
          }
      
      
        }else{
          echo 11;
      
        }
        // echo 1; 
      }
?>