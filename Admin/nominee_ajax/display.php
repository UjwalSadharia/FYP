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
</head>

<body>
  <table class="table table-striped add_dt" id="myTable">
    <thead>
      <tr>
        <th scope="col">Nominee Id</th>
        <th scope="col">Name</th>
        <th scope="col">Customer Id</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Relation</th>
        <th scope="col">Gender</th>
        <th scope="col">Contact No</th>
        <th scope="col">DOB</th>
        <!-- <th scope="col">Update</th>
        <th scope="col">Delete</th> -->
      </tr>
    </thead>
    <tbody>
      <?php
                            $sql = "SELECT n.nominee_id,n.name,c.customer_id,c.c_name,n.email,n.address,n.relation,n.gender,n.phone,n.dob FROM nominee n LEFT JOIN customer c on n.customer_id=c.customer_id;";
                            $query = mysqli_query($conn,$sql) or die("Sorry, something went wrong because of --->".mysqli_error($conn));

                            if(mysqli_num_rows($query) == 0){
                                echo "No data found";
                            }else{
                                while($row=mysqli_fetch_assoc($query)){
                                
      
                        ?>
      <tr>
        <td>
          <?php echo $row['nominee_id']?>
        </td>
        <td>
          <?php echo $row['name']?>
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
          <?php echo $row['address']?>
        </td>
        <td>
          <?php echo $row['relation']?>
        </td>
        <td>
          <?php echo $row['gender']?>
        </td>
        <td>
          <?php echo $row['phone']?>
        </td>
        <td>
          <?php echo $row['dob']?>
        </td>
         <!-- <td class="table_editbtn">
          <button type='button' class="edit_btn" data-eid="<?php echo $row['policy_id']?>"><i
              class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->



          <!-- Modal -->
          <!-- <div class="modal fade modal_open" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Policy</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> -->


                  <!-- modal form  -->
                  <!-- <form id="modal_form_body">

                  </form>


                </div>

              </div>
            </div>
          </div> -->









        <!-- </td>
        <td class="table_delbtn">
          <button class="delete_btn" data-id="<?php  echo $row['policy_id']  ?>"><i class="fa fa-trash"
              aria-hidden="true"></i></button>
        </td>  -->
      </tr>

      <?php 
        }  }
      ?>
    </tbody>
  </table>




  <script src="../jQuery/jquery.js"></script>
  <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
  <!-- datatables js  -->
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function () {

      // Adding data table link 
      $('#myTable').DataTable({
        "scrollX":true
      });



      // Delete data 
      $(document).on('click', '.delete_btn', function () {
        var pol_id = $(this).data('id');
        var element = this;

        $.ajax({
          url: 'policy_ajax/ajax_delete.php',
          type: 'POST',
          data: {
            id: pol_id
          },
          success: function (data) {
            if (data == 1) {
              $(element).closest('tr').fadeOut();

            } else {
              alert("Sorry,unable to delete data!!");
            }
          }
        });

      });





      //edit data
      $(document).on('click', '.edit_btn', function () {
        $('#exampleModal').modal('show');

        var poli_id = $(this).data('eid');

        $.ajax({
          url: 'policy_ajax/ajax_update.php',
          type: 'POST',
          data: {
            eid: poli_id
          },
          success: function (data) {
            $("#modal_form_body").html(data)
          }
        });



        // Save updated data 
        $(document).on('click', '#update-btn', function () {
          var pol_id = $("#po_id").val();
          var pol_name = $("#pol_name").val();
          var pol_desc = $("#pol_description").val();
          var pol_cat = $("#polcat").val();
          var pol_sumass = $("#sumass").val();
          var pol_premium = $("#premiumm").val();
          var pol_agelim = $("#agelim").val();


          function xyz() {
            $('#exampleModal').modal('hide');
            // $.ajax({
            //   url: 'policy.php',
            //   type : 'Get',
            //   success : function(data){
            //     var abc = $(data).find('.parent_table');
            //     $('.parent_table').html(abc);
            //   }
            // })
          }

          $.ajax({
            url: "policy_ajax/ajax_updated.php",
            type: "POST",
            data: {
              id: pol_id,
              name: pol_name,
              desc: pol_desc,
              category: pol_cat,
              sumass: pol_sumass,
              premium: pol_premium,
              agelim: pol_agelim
            },
            success: function (data) {
              if (data == 1) {
                // alert("Data updated successfully");
                // loadtable();
                // location.reload();
                $('#exampleModal').modal('hide');
                loadData();
                // xyz();

                // load('policy.php');


              } else {
                alert("Something went wrong");
              }
            }
          });
        });

      });

    });

  </script>

</body>

</html>