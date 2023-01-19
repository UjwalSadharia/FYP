<?php
include 'db.php';
    session_start();
    if(isset($_SESSION['agentId'])){

    
//  $query = "SELECT date, count(*) as number FROM customer_policy GROUP BY date WHERE agent_id={$_SESSION['agentId']}";  
//  $result = mysqli_query($conn, $query); 

// Policy sold today 
$date=Date('Y-m-d');

$sql = "SELECT * FROM customer_policy WHERE date='{$date}'";
$query= mysqli_query($conn,$sql) or die('sorry something went wrong--->'.mysqli_error($conn));
$row=mysqli_num_rows($query);


// MONTHLY POLICY 
$msql = "SELECT *FROM customer_policy WHERE MONTH(date) = MONTH(NOW()) AND agent_id={$_SESSION['agentId']}";
$mquery= mysqli_query($conn,$msql) or die('sorry something went wrong--->'.mysqli_error($conn));
$mrow=mysqli_num_rows($mquery);

// TOTAL POLICY 
$tsql = "SELECT *FROM policy";
$tquery= mysqli_query($conn,$tsql) or die('sorry something went wrong--->'.mysqli_error($conn));
$trow=mysqli_num_rows($tquery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Favicon  -->
    <link rel="icon" href="../myimage/favicon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Pannel</title>

    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">

    <!-- Font awesome cdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- datatable css  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- CUSTOM CODE  -->
    <link rel="stylesheet" href="../Admin/admin.css">
    <link rel="stylesheet" href="../custom code/responsive.css">
    <link rel="stylesheet" href="agent.css">

</head>

<body>
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center justify-content-center">
                <a href="index.php" class="text-center">
                <img src="../myimage/darkLogo5.png" alt="image"
                    class="admin_img rounded-circle img-thumbnail shadow-sm"></a>
                <div class="media-body">
                    <!-- <h4 class="m-0">LifeTree</h4> -->


                </div>

            </div>
            <div class="row">
                <div class="col12 agentName">
                    <?php  echo $_SESSION['agentName'] ;  ?>
                </div>
                <p class="fw-normal text-muted mb-0 text-center">Agent</p>
            </div>
        </div>

        <p class="text-secondary fw-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-items">
                <a class="nav-link text-dark" id="customer">
                    <i class="fa fa-address-card me-3 text-primary fa-fw"></i>
                    Customer
                </a>
            </li>
            <li class="nav-items" id='agent_link'>
                <a class="nav-link text-dark " id="addCustomer">
                    <i class="fa fa-th-large me-3 text-primary fa-fw"></i>
                    Add Customer
                </a>
            </li>



            <!-- <li class="nav-items">
                <a href="cust_policy.php" class="nav-link text-dark">
                    <i class="fa fa-cubes me-3 text-primary fa-fw"></i>
                    Cust_policy
                </a>
            </li> -->

            <li class="nav-items">
                <a class="nav-link  text-dark" id="policy">
                    <i class="fa fa-file-text me-3 text-primary fa-fw"></i>
                    Policy
                </a>
            </li>
            <!-- <li class="nav-items">
                <a href="nominee.php" class="nav-link text-dark">
                    <i class="fa fa-users me-3 text-primary fa-fw"></i>
                    Nominee
                </a>
            </li> -->

            <!-- <li class="nav-items">
                <a href="report.php" class="nav-link text-dark">
                    <i class="fa fa fa-download me-3 text-primary fa-fw"></i>
                    Report
                </a>
            </li> -->
            <li class="nav-items">
                <a href="agentLogout.php" class="nav-link text-dark">
                    <i class="fa fa-lock  me-3 text-primary fa-fw"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>

    <div class="page-content p-5" id="content">
        <!-- toggler  -->
        <div class="menu_btn" style="text-align:end;">
            <button class="btn btn-light bg-white rounded shadow-sm px-4 mb-4" id="sidebar_collapse" type="button">
                <i class="fa fa-bars me-2"></i><small class="text-uppercase fw-bold">Menu</small>
            </button>
        </div>
        <div class="dynamic_content">


            <div class="row gap-1 justify-content-evenly text-center">
                <div class="col-12 col-md-4 col-lg-3 card1">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div><i class="fa fa-user" aria-hidden="true"></i></div>
                        </div>
                        <div class="col-12 col-lg-7">
                            <h3>
                                <?php echo $row . "<br>";  ?>
                            </h3>
                            <small>Policy Sold Today</small>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-4 col-lg-3 card1">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div><i class="fa fa-users" id="logo2" aria-hidden="true"></i></div>
                        </div>
                        <div class="col-12 col-lg-7">
                        <h3>
                            <?php echo $mrow . "<br>";  ?>
                        </h3>
                        <small>Policy Sold In Month</small>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-4 col-lg-3 card1">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div><i class="fa fa-file-text" id="logo3" aria-hidden="true"></i></div>
                        </div>
                        <div class="col-12 col-lg-7">
                        <h3>
                            <?php echo $trow . "<br>";  ?>
                        </h3>
                        <small>Policies Available</small>
                        </div>
                    </div>
                </div>




                
                

            </div>



            <!-- <div class="row justify-content-around" style="gap: 15px;">
                <div class="col-12 col-md-6 col-lg-3">

                    <div class="row card1">
                        <div class="col-12 col-sm-6 col-lg-4 m-auto">
                            <h1><i class="fa fa-user" aria-hidden="true"></i></h1>
                        </div>
                        <div class="col-8 m-auto">
                        <h3><?php echo $row . "<br>";  ?></h3>
                        <small>Policy Sold Today</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">

                    <div class="row card1">
                        <div class="col-12 col-sm-6 col-lg-4  m-auto">
                            <h1><i class="fa fa-user" aria-hidden="true"></i></h1>
                        </div>
                        <div class="col-8 m-auto">
                        <h3><?php echo $row . "<br>";  ?></h3>
                        <small>Policy Sold Today</small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">

                    <div class="row card1">
                        <div class="col-12 col-sm-6 col-lg-4  m-auto">
                            <h1><i class="fa fa-user" aria-hidden="true"></i></h1>
                        </div>
                        <div class="col-8 m-auto">
                        <h3><?php echo $row . "<br>";  ?></h3>
                        <small>Policy Sold Today</small>
                        </div>
                    </div>
                </div>
                
            </div> -->















            <!-- <div id="piechart" ></div>   -->










        </div>
    </div>

    <!-- sidenav end  -->






    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../bootstrap5/js/bootstrap.bundle.js"></script>
    <script src="../jQuery/jquery.js"></script>
    <!-- datatables js  -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {

            // addCustomer Page
            function addCustomerPage() {
                $('.dynamic_content').load('addCustomer.php');
            }

            $(document).on('click', '#addCustomer', function () {
                addCustomerPage();
                $('#addCustomer').css('background-color', '#ededed');
                $('#customer').css('background-color', '');
                $('#policy').css('background-color', '');
            })






            // CUSTOMER PAGE 
            function customerPage() {
                $('.dynamic_content').load('customer.php');
            }
            $(document).on('click', '#customer', function () {
                customerPage();
                $('#customer').css('background-color', '#ededed');
                $('#addCustomer').css('background-color', '');
                $('#policy').css('background-color', '');
            })


            // policy PAGE 
            function policyPage() {
                $('.dynamic_content').load('policy.php');
            }
            $(document).on('click', '#policy', function () {
                policyPage();
                $('#policy').css('background-color', '#ededed');
                $('#addCustomer').css('background-color', '');
                $('#customer').css('background-color', '');
            })





            // MENU TOGGLE 
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





            // PIE CHART 
            //    google.charts.load('current', {'packages':['corechart']});  
            //    google.charts.setOnLoadCallback(drawChart);  
            //    function drawChart()  
            //    {  
            //         var data = google.visualization.arrayToDataTable([  
            //                   ['date', 'Number'],  
            //                   <?php  
            //                   while($row = mysqli_fetch_array($result))  
            //                   {  
            //                        echo "['".$row["id"]."', ".$row["number"]."],";  
            //                   }  
            //                   ?>  
            //              ]);  
            //         var options = {  
            //               title: 'Percentage of Male and Female Customer', 
            //             //   is3D:true,  
            //               pieHole: 0.4,
            //               backgroundColor:'transparent',
            //             //   legend: { position: 'bottom' },
            //              };  
            //         var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
            //         chart.draw(data, options);  
            //    } 



        })
    </script>
</body>

</html>

<?php
    }else{
        header('location:../index.php');
    }
?>