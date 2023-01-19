<?php 
session_start();
include 'db.php';
if(!isset($_SESSION['user'])){
    header("location:../index.php");
}else{
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
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
                $sql = "SELECT * FROM agent WHERE status ='approved'";
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
          <td class="table_editbtn">
            <button class="edit_btn" data-id="<?php echo $row['agent_id']?>"><i class="fa fa-pencil-square-o"
                aria-hidden="true"></i></button>







            <!-- Edit Modal  -->
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn edit_btn" data-bs-toggle="modal"
                    data-eid="<?php echo $row['agent_id']?>" data-bs-target="#exampleModal">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button> -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Agent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">


                    <!-- modal form  -->
                    <form id="modal_form_body">

                    </form>


                  </div>

                </div>
              </div>
            </div>










          </td>
          <td class="table_delbtn">
            <button class="delete_btn" data-aid="<?php  echo $row['agent_id']  ?>"><i class="fa fa-trash"
                aria-hidden="true"></i></button>
          </td>
        </tr>

        <?php 
              }  }

            
            ?>
      </tbody>
    </div>
  </table>




  <!-- JS FILES  -->
  <script src="../jQuery/jquery.js"></script>
  <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
  <!-- datatables js  -->
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>

    $(document).ready(function () {
      // Adding DataTable 
      $("#myTable").DataTable({
        "scrollX": true
      });



      // Edit agent 
      $(document).on('click', '.edit_btn', function () {
        $('#exampleModal').modal('show');
        var id = $(this).data('id');
        $.ajax({
          url: 'agent_ajax/ajax_update.php',
          type: 'POST',
          data: { id: id },
          success: function (data) {
            $('#modal_form_body').html(data);
          }
        })

      })



    })

  </script>
</body>

</html>

<?php   
}
?>