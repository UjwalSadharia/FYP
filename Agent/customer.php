<?php
    session_start();
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
<div class="agent_wrapper  mt-4">
        <!--content  -->
        <h2 class="display-4 text-white">My Customers</h2>
        <p class="lead text-white mb-0">All the detais of customers is listed below.</p>
        <div class="separator my-4"></div>

    </div>
    <div class="customer_wrapper">
        <table class="table table-striped add_dt" id="myTable">
            <thead>
                <tr>

                    <!-- <th scope="col">Check</th> -->
                    <th scope="col">Id</th>
                    <th scope="col">policy Id</th>
                    <th scope="col">policy Name</th>
                    <th scope="col">Customer Id</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Nominee Id</th>
                    <th scope="col">Nominee Name</th>
                    <th scope="col">Aadhar Card</th>
                    <th scope="col">Agent Id</th>
                    <th scope="col">Agent Name</th>
                    <th scope="col">Date&Time</th>
                    <th scope="col">Renew Date</th>
                    <!-- <th scope="col">Update</th>
                    <th scope="col">Delete</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                            $sql = "SELECT cp.id,cp.policy_id,p.policy_name,cp.customer_id,c.c_name,cp.nominee_id,n.name,cp.aadhar_card,cp.agent_id,a.agent_name,cp.date,cp.renew_date FROM `customer_policy` cp LEFT JOIN policy p ON cp.policy_id = p.policy_id LEFT JOIN customer c ON cp.customer_id=c.customer_id LEFT JOIN nominee n ON cp.nominee_id=n.nominee_id LEFT JOIN agent a on cp.agent_id=a.agent_id WHERE cp.agent_id={$_SESSION['agentId']}";
                            $query = mysqli_query($conn,$sql) or die("Sorry, something went wrong because of --->".mysqli_error($conn));

                            if(mysqli_num_rows($query) == 0){
                                echo "No data found";
                            }else{
                                while($row=mysqli_fetch_assoc($query)){
                                  // echo '<pre>';
                                  // print_r($row);
                                  // echo '</pre>';
      
                        ?>
                <tr>
                    <!-- <td class='text-center'>
                        <input type="checkbox" value=<?php echo $row['id']?> data-cbid=<?php echo $row['id']?> name="cb" class="checkbox ">
                    </td> -->
                    <td>
                        <?php echo $row['id']?>
                    </td>
                    <td>
                        <?php echo $row['policy_id']?>
                    </td>
                    <td>
                        <?php echo $row['policy_name']?>
                    </td>
                    <td>
                        <?php echo $row['customer_id']?>
                    </td>
                    <td>
                        <?php echo $row['c_name']?>
                    </td>
                    <td>
                        <?php echo $row['nominee_id']?>
                    </td>
                    <td>
                        <?php echo $row['name']?>
                    </td>
                    <td>
                        <a href="../uploaded_pdf/<?php echo $row['aadhar_card'] ?>" target="_blank">
                            <?php echo $row['c_name'] ?>.pdf
                        </a>
                    </td>
                    <td>
                        <?php echo $row['agent_id']?>
                    </td>
                    <td>
                        <?php echo $row['agent_name']?>
                    </td>
                    <td>
                        <?php echo $row['date']?>
                    </td>
                    <td>
                        <?php echo $row['renew_date']?>
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








<!-- 
                    </td>
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



    </div>

    <!-- <button id='merabtn'>i'am btn</button> -->




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

            // GET CHECKBOX VALUE
            $(document).on('click', '#merabtn', function () {
                $('.checkbox:checked').each(function () {
                    var iddd = $(this).data('cbid');
                    console.log(iddd);
                })

            })

        // SELECTS ONLY ONE CHECKBOX AT A TIME 
        $('.checkbox').on('change',function(){
            $('.checkbox').not(this).prop('checked',false);
        });


        })

    </script>
</body>

</html>