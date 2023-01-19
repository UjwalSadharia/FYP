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
<?php 

include 'db.php';

if(isset($_POST['date1']) && isset($_POST['date2'])){
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];

$d1 = Date('d-m-Y',strtotime($date1));
$d2 = Date('d-m-Y',strtotime($date2));

?>



<body>
<h5 class="text-center text-success"><?php echo "Report From Date <b>{$d1}</b> To <b>{$d2}</b>." ?></h5>
  <table class="table table-striped add_dt" id="myTable">
    <thead>
      <tr>
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
                            $sql = "SELECT cp.id,cp.policy_id,p.policy_name,cp.customer_id,c.c_name,cp.nominee_id,n.name,cp.aadhar_card,cp.agent_id,a.agent_name,cp.date,cp.renew_date FROM `customer_policy` cp LEFT JOIN policy p ON cp.policy_id = p.policy_id LEFT JOIN customer c ON cp.customer_id=c.customer_id LEFT JOIN nominee n ON cp.nominee_id=n.nominee_id LEFT JOIN agent a on cp.agent_id=a.agent_id WHERE date BETWEEN '$date1' AND '$date2'";
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
          <a href="../uploaded_pdf/<?php echo $row['aadhar_card'] ?>" target="_blank"><?php echo $row['c_name'] ?>.pdf</a>
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
      </tr>

      <?php 
      

      } 
    
    } 
      ?>
    </tbody>
  </table>
  <?php
}
  ?>




  






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
      

    });

  </script>

</body>

</html>







