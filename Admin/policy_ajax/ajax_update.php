<?php
include 'db.php';
$policy_id = $_POST['eid'];

$sql = "SELECT * FROM policy WHERE policy_id = '{$policy_id}'";
$query = mysqli_query($conn,$sql) or die("Sorry unable to get data because of---->".mysqli_error($conn));

$output = "";

if(mysqli_num_rows($query) > 0){

   while($row = mysqli_fetch_assoc($query)){

    $category = $row['category'];
    ?>
    <div class='mb-3'>
    <input type='text' id='po_id' value="<?php echo $row['policy_id'] ?>" hidden>

    <label for='pol_name' class='form-label'>Policy Name</label>
    <input type='text' name='pol_name' class='form-control'
        id='pol_name' value="<?php echo $row['policy_name'] ?>" aria-describedby='emailHelp' required>
</div>
<div class='mb-3'>
    <label for='pol_description'
        class='form-label'>policy_description</label>
    <div class='form-floating'>
        <textarea class='form-control' value="<?php $row['policy_description'] ?>" name='pol_description'
            placeholder='Leave a comment here' id='pol_description'
            required><?php echo $row['policy_description'] ?></textarea>
    </div>
</div>

<!-- <div class='mb-3'>
    <label for='polcat' class='form-label'>Category</label>
    <input type='text'value="{$row['category']}" name='pol_category' class='form-control'
        id='polcat' aria-describedby='' required>
</div> -->


<select class="form-select" name='pol_category' id='polcat' aria-label="Default select example">
  <option>Select..</option>
  <option value='Group' <?php 
            if($category == 'Group'){
                echo 'selected';
            }
        ?>>Group</option>

<option value='individual' <?php 
            if($category == 'individual'){
                echo 'selected';
            }
        ?>>individual</option>
</select>


<div class='mb-3'>
    <label for='sumass' class='form-label'>Sum Assured</label>
    <input type='number' value="<?php echo $row['sum_assured'] ?>" name='pol_sumass' class='form-control'
        id='sumass' aria-describedby='' required>
</div>
<div class='mb-3'>
    <label for='premiumm' class='form-label'>Premium</label>
    <input type='number'  value="<?php echo $row['premium'] ?>" name='pol_premium' class='form-control'
        id='premiumm' aria-describedby='' required>
</div>
<div class='mb-3'>
    <label for='agelim'  class='form-label'>Age Limit</label>
    <input type='number' value="<?php echo $row['age_limit'] ?>" name='pol_agelimit' class='form-control'
        id='agelim' aria-describedby='' required>
</div>
<input class='btn btn-primary' type='button' value='Update' id='update-btn'>


    <?php

//     $output = "
//      <div class='mb-3'>
//     <input type='text' id='po_id' value='{$row['policy_id']}' hidden>

//     <label for='pol_name' class='form-label'>Policy Name</label>
//     <input type='text' name='pol_name' class='form-control'
//         id='pol_name' value='{$row['policy_name']}' aria-describedby='emailHelp' required>
// </div>
// <div class='mb-3'>
//     <label for='pol_description'
//         class='form-label'>policy_description</label>
//     <div class='form-floating'>
//         <textarea class='form-control' value='{$row['policy_description']}' name='pol_description'
//             placeholder='Leave a comment here' id='pol_description'
//             required>{$row['policy_description']}</textarea>
//     </div>
// </div>

// <div class='mb-3'>
//     <label for='polcat' class='form-label'>Category</label>
//     <input type='text'value='{$row['category']}' name='pol_category' class='form-control'
//         id='polcat' aria-describedby='' required>
// </div>

// <div class='mb-3'>
//     <label for='sumass' class='form-label'>Sum Assured</label>
//     <input type='number' value='{$row['sum_assured']}' name='pol_sumass' class='form-control'
//         id='sumass' aria-describedby='' required>
// </div>
// <div class='mb-3'>
//     <label for='premiumm' class='form-label'>Premium</label>
//     <input type='number'  value='{$row['premium']}' name='pol_premium' class='form-control'
//         id='premiumm' aria-describedby='' required>
// </div>
// <div class='mb-3'>
//     <label for='agelim'  class='form-label'>Age Limit</label>
//     <input type='number' value='{$row['age_limit']}' name='pol_agelimit' class='form-control'
//         id='agelim' aria-describedby='' required>
// </div>
// <input class='btn btn-primary' type='button' value='Update' id='update-btn'>
// ";
   }

   echo $output;
}else{
    echo 0;
}



?>

