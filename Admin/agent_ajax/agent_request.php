<?php
    include 'db.php';

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- datatable css  -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">  
</head>
<body>
    <!-- <div class="row"> -->
        <div class=""><h5 id='back'><i class="fa fa-arrow-left" aria-hidden="true"></i></h5></div>
        <h3 class="text-center text-danger">New Agent Request</h3>
    <!-- </div> -->
    
    <table class="table table-striped" id="myTable">
    <div id="load-data">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">DOB</th>
          <th scope="col">Address</th>
          <th scope="col">City</th>
          <th scope="col">State</th>
          <th scope="col">Zipcode</th>
          <th scope="col">Branch</th>
          <th scope="col">Gender</th>
          <th scope="col">Phone</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>

          <!-- <th scope="col">Update</th>
          <th scope="col">Delete</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
                $sql = "SELECT * FROM agent where status='pending'";
                $query = mysqli_query($conn,$sql) or die("Sorry, something went wrong because of --->".mysqli_error($conn));

                if(mysqli_num_rows($query) == 0){
                  echo "No data found";
                }else{
                  while($row=mysqli_fetch_assoc($query)){
                 ?>
        <tr>
          <td>
            <?php echo $row['agent_id']?>
          </td>
          <td>
            <?php echo $row['username']?>
          </td>
          <td>
            <?php echo $row['password']?>
          </td>
          <td>
            <?php echo $row['agent_name']?>
          </td>
          <td>
            <?php echo $row['email']?>
          </td>
          <td>
            <?php echo $row['dob']?>
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
            <?php echo $row['branch']?>
          </td>
          <td>
            <?php echo $row['gender']?>
          </td>
          <td>
            <?php echo $row['phone']?>
          </td>
          <td>
            <?php echo $row['status']?>
          </td>
          <td class="">
              <div class="row justify-content-evenly">
                <button type="button" data-idd='<?php echo $row['agent_id'] ?>' class=" p-2 col-5 btn btn-outline-primary a_approve"><i class="fa fa-check" aria-hidden="true"></i></button>
                  <button type="button"  data-reject='<?php echo $row['agent_id'] ?>' class=" p-2 col-5 btn btn-outline-danger a_reject"><i class="fa fa-times" aria-hidden="true"></i></button>
              </div>
                    <!-- <div><i class="fa fa-check" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></div> -->
          </td>
          
        </tr>

        <?php 
              }  }

            
            ?>
      </tbody>
    </div>
  </table>



    <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
  <script src="../jQuery/jquery.js"></script>
  <!-- datatables js  -->
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script>
      $(document).ready(function(){

        function agent_request(){
            $('.table_parent').load('agent_ajax/agent_request.php');
        }

        // Adding DataTable 
        $("#myTable").DataTable({
            "scrollX": true
        });

        // back button 
          $('#back').click(function(){
            $('.table_parent').load('agent_ajax/display.php');
          })

        // approved 
        $(document).on('click','.a_approve',function(){
            var a_id = $(this).data('idd');
            $.ajax({
                url:'agent_ajax/agent_action.php',
                type:'POST',
                data:{approve:a_id},
                success:function(data){
                    if(data == 1){
                        agent_request();
                        agent_bell_reload();
                    }else{
                        console.log(data);
                    }
                }
            });
        })


        // Reject 
        $(document).on('click','.a_reject',function(){
            var reject = $(this).data('reject');
            $.ajax({
                url:'agent_ajax/agent_action.php',
                type:'POST',
                data:{reject:reject},
                success:function(data){
                    if(data == 1){
                        agent_request();
                        agent_bell_reload();
                    }else{
                        console.log(data);
                    }
                }
            });
        })
      })
  </script>
</body>
</html>