<?php
    include 'db.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../admin/admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- datatable css  -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
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
        <!-- <th scope="col">Edit</th> -->
        <th scope="col">Delete</th>
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
        <!-- <td class="table_editbtn">
          <button type='button' class="edit_btn" data-cid="<?php echo $row['customer_id']?>"><i
              class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        </td> -->

        <!-- Modal -->
        <div class="modal fade modal_open" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
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

        <td class="table_delbtn">
          <button class="delete_btn" data-id="<?php  echo $row['customer_id']  ?>"><i class="fa fa-trash"
              aria-hidden="true"></i></button>
        </td>
      </tr>

      <?php 
        }  }
      ?>
    </tbody>
  </table>

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


      // Delete customer 
      $(document).on('click', '.delete_btn', function () {
        var pol_id = $(this).data('id');
        var element = this;

        $.ajax({
          url: 'customer_ajax/ajax_delete.php',
          type: 'POST',
          data: {
            id: pol_id
          },
          success: function (data) {
            if (data == 1) {
              $(element).closest('tr').fadeOut();

            } else {
              alert("Sorry,unable to delete data!!" + data);
            }
          }
        });

      });


      // edit customer 
      // $('.edit_btn').click(function () {
      //   $('#exampleModal').modal('show');
      //   var cid = $(this).data('cid');

      //   $.ajax({
      //     url: 'customer_ajax/ajax_update.php',
      //     data: { cid: cid },
      //     type: 'POST',
      //     success: function (data) {
      //       $('#modal_form_body').html(data);
      //       console.log(data);
      //     }
      //   })
      // })

      // $('#c_submit_form').on('submit',function(e){
      //   e.preventDefault();
      //   alert('okay boss');

      // })




    })

  </script>

</body>

</html>