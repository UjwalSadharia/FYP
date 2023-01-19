<?php

 

  include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Favicon  -->
        <link rel="icon" href="../myimage/favicon.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LifeTree.com</title>
  <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="../custom code/responsive.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- datatable css  -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
  <!-- Sidenav start  -->
  <div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex align-items-center">
        <img src="../myimage/admin.jpg" alt="image" class="me-3 admin_img rounded-circle img-thumbnail shadow-sm">
        <div class="media-body">
          <h4 class="m-0">Life Tree</h4>
          <p class="fw-normal text-muted mb-0">Admin</p>
        </div>
      </div>
    </div>

    <p class="text-secondary fw-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-items">
        <a href="admin_home.php" class="nav-link text-dark " id="agent">
          <i class="fa fa-th-large me-3 text-primary fa-fw"></i>
          Agent
        </a>
      </li>

      <li class="nav-items">
        <a href="customer.php" class="nav-link text-dark" id="customer">
          <i class="fa fa-address-card me-3 text-primary fa-fw"></i>
          Customer
        </a>
      </li>

      <li class="nav-items">
        <a href="cust_policy.php" class="nav-link text-dark">
          <i class="fa fa-cubes me-3 text-primary fa-fw"></i>
          Cust_policy
        </a>
      </li>

      <li class="nav-items">
        <a href="policy.php" class="nav-link text-dark" id="polic">
          <i class="fa fa-file-text me-3 text-primary fa-fw"></i>
          Policy
        </a>
      </li>
      <li class="nav-items">
        <a href="nominee.php" class="nav-link text-dark">
          <i class="fa fa-users me-3 text-primary fa-fw"></i>
          Nominee
        </a>
      </li>
      
      <li class="nav-items">
        <a href="report.php" style="background-color:#ededed" class="nav-link text-dark">
          <i class="fa fa fa-download me-3 text-primary fa-fw"></i>
          Report
        </a>
      </li>
      <li class="nav-items">
        <a href="admin_logout.php" class="nav-link text-dark">
          <i class="fa fa-lock  me-3 text-primary fa-fw"></i>
          Logout
        </a>
      </li>
    </ul>
  </div>

  <!-- sidenav end  -->

  <div class="page-content p-5" id="content">
    <!-- toggler  -->
    <div class="menu_btn" style="text-align:end;">
      <button class="btn btn-light bg-white rounded shadow-sm px-4 mb-4" id="sidebar_collapse" type="button">
        <i class="fa fa-bars me-2"></i><small class="text-uppercase fw-bold">Menu</small>
      </button>
    </div>
    <div class="dynamic_content">
      <!--content  -->
      <div class="row">
        <h2 class="display-4 text-white col-10">Generate Report</h2>
      </div>
      <p class="lead text-white mb-0">Select fields to generate report</p>
      <div class="separator"></div>
      <div class="date_wrapper container mb-5">
        <div class="row">
          <h3 class="col-12 text-center text-light">Date Wise Report</h3>
          <div class="col-6">
            <label for="from">From</label>
            <input type="date" class="form-control" name="from" id="from">
          </div>
          <div class="col-6">
            <label for="to">To</label>
            <input type="date" class="form-control" name="to" id="to">
          </div>
          <div class="text-center my-3">

            <!-- <input type="button" class="btn btn-primary " value="Search" id='check'> -->
            <button class="btn btn-primary " id='check'> <i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search</button>
            <button class="btn btn-success" id='pdfReport'> <i class="fa fa-download" aria-hidden="true"></i>&nbsp;Report</button>
          </div>
        </div>

        <!-- table  -->
      <div class="table_parent">
          <h5 class="text-center text-success">Select Both Date To Generate Report</h5>
      </div>

        <!-- AGENT WISE REPORT -->
        <div class="row mt-5">
          <h3 class="col-12 text-center text-light">Agent Wise Report</h3>
          <div class="col-6">
          <label for="to">Select Agent</label>
          <select class="form-select" id='a_from' aria-label="Default select example">

            <option selected>Select..</option>
          <?php
            $a_sql= "SELECT * FROM agent";
            $a_query=mysqli_query($conn,$a_sql) or die("Sorry, something went wrong because of --->".mysqli_error($conn));
            while($a_row=mysqli_fetch_assoc($a_query)){


          ?>
               <option value="<?php echo $a_row['agent_id'] ?>"><?php echo $a_row['agent_id']  ?> | <?php echo $a_row['agent_name']  ?></option> 
               
            <?php
               

            }
            ?>
            
          </select>
          </div>
          <div class="col-6">
            <label for="to">Date</label>
            <input type="date" class="form-control" name="a_to" id="a_to">
          </div>
          <div class="text-center my-3">
            <!-- <input type="button" class="btn btn-primary " value="Search" id='a_check'> -->

            <button class="btn btn-primary " id='a_check'> <i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search</button>
            <button class="btn btn-success" id='a_pdfReport'> <i class="fa fa-download" aria-hidden="true"></i>&nbsp;Report</button>
          </div>
        </div>
      </div>
      <!-- table  -->
      <div class="a_table_parent container">
          <h5 class="text-center text-success">Select Agent & Date To Generate Report</h5>
      </div>
      <!-- content end -->
    </div>





  </div>
  <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
  <script src="../jQuery/jquery.js"></script>
  <!-- datatables js  -->
  <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {

      // nav-links on click side bar should hide
      $(".nav-link").click(function () {
        $("#sidebar").toggleClass('active');
        $("#content").toggleClass('active');
      })

      //  menu btn click """"
      $(function () {
        $("#sidebar_collapse").click(function () {
          $("#sidebar").toggleClass('active');
          $("#content").toggleClass('active');
        });
      });

      
      $('#check').on('click', function () {
        var date1 = $('#from').val();
        var date2 = $('#to').val();

        $.ajax({
          url: 'report_ajax/display.php',
          type: 'POST',
          data: { date1: date1, date2: date2 },
          success: function (data) {
            if(date1 == '' || date2 == ''){
              
              alert('Select both date to search')
            }else{
              $('.table_parent').html(data);
            }
          }
        });
      })
     

      // AGENT WISE REPORT  
      $('#a_check').on('click', function () {
        var a_agent = $('#a_from').val();
        var a_date2 = $('#a_to').val();

        $.ajax({
          url: 'report_ajax/agent_display.php',
          type: 'POST',
          data: { a_agent: a_agent, a_date2: a_date2 },
          success: function (data) {
            if(a_agent == '' || a_date2 == ''){
              
              alert('Select Agent & Date To Search');
            }else{
              $('.a_table_parent').html(data);
              

            }
          }
        });
      })

      // Date Wise Download Report 
      $('#pdfReport').on('click',function(){
        
        var d1 = $('#from').val();
        var d2 = $('#to').val();
        
            if(d1 != '' & d2 != ''){
            window.open('report_ajax/download_report.php?d1='+d1+'& d2='+d2);
            }else{
              alert('Select Both Date To Download Report');
            }
      });

      // Agent & Date Wise Download REPORT
      $('#a_pdfReport').on('click',function(){
        var a_d1 = $('#a_from').val();
        var a_d2 = $('#a_to').val();
        
            if(a_d1 != '' & a_d2 != ''){
            window.open('report_ajax/download_report.php?a_d1='+a_d1+'& a_d2='+a_d2);
            }else{
              alert('Select Agent & Date To Download Report');
            }
      });
      


      


      
    });
  </script>
</body>

</html>