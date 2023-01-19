
<?php
include 'db.php';
require_once '../../makePdf/vendor/autoload.php';
use Dompdf\Dompdf;

if(isset($_GET['d1'])){
    $date1 = $_GET['d1'];
    $date2 = $_GET['d2'];

    // $sql = "SELECT * FROM agent WHERE agent_id={$myData}";
    $sql = "SELECT cp.id,cp.policy_id,p.policy_name,cp.customer_id,c.c_name,cp.nominee_id,n.name,cp.aadhar_card,cp.agent_id,a.agent_name,cp.date,cp.renew_date FROM `customer_policy` cp LEFT JOIN policy p ON cp.policy_id = p.policy_id LEFT JOIN customer c ON cp.customer_id=c.customer_id LEFT JOIN nominee n ON cp.nominee_id=n.nominee_id LEFT JOIN agent a on cp.agent_id=a.agent_id WHERE date BETWEEN '$date1' AND '$date2'";
    $query=mysqli_query($conn,$sql) or die('error'.mysqli_error($conn));
    // $row=mysqli_fetch_assoc($query);

    // echo '<pre>';
    // print_r($row);
    // echo '</pre>';
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <style>
            h1{
                margin-bottom: 20px;
                text-align:center;
            }
            table{
                border-collapse: collapse;
            }
            td,th{
                border: 1px solid black;
                padding: 2px;
                text-align:center;
            }
        </style>
    
    </head>
    <body>
            <h1>Report From Date '.Date('d-m-Y',strtotime($date1)).' & Date '.Date('d-m-Y',strtotime($date2)).'</h1>
        <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>policy Id</th>
            <th>policy Name</th>
            <th>Customer Id</th>
            <th>Customer Name</th>
            <th>Nominee Id</th>
            <th>Nominee Name</th>
            <th>Aadhar Card</th>
            <th>Agent Id</th>
            <th>Agent Name</th>
            <th>Date</th>
            <th>Renew Date</th>
           
          </tr>
        </thead>
        <tbody>';

        while($row=mysqli_fetch_assoc($query)){
            $html.='
                <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['policy_id'].'</td>
                <td>'.$row['policy_name'].'</td>
                <td>'.$row['customer_id'].'</td>
                <td>'.$row['c_name'].'</td>
                <td>'.$row['nominee_id'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['c_name'].'.pdf </td>
                <td>'.$row['agent_id'].'</td>
                <td>'.$row['agent_name'].'</td>
                <td>'.$row['date'].'</td>
                <td >'.$row['renew_date'].'</td>
                </tr>
            ';
        }
        $html .='
        </tbody>
        </table>
    </body>
    </html>
        ';

}
// else{
//     header('location:../report.php');
// }

if(isset($_GET['a_d1'])){
    $a_agent = $_GET['a_d1'];
    $a_date2 = $_GET['a_d2'];

    $a_sql = "SELECT cp.id,cp.policy_id,p.policy_name,cp.customer_id,c.c_name,cp.nominee_id,n.name,cp.aadhar_card,cp.agent_id,a.agent_name,cp.date,cp.renew_date FROM `customer_policy` cp LEFT JOIN policy p ON cp.policy_id = p.policy_id LEFT JOIN customer c ON cp.customer_id=c.customer_id LEFT JOIN nominee n ON cp.nominee_id=n.nominee_id LEFT JOIN agent a on cp.agent_id=a.agent_id WHERE cp.agent_id=$a_agent AND cp.date='$a_date2'";
    $a_query = mysqli_query($conn,$a_sql) or die("Sorry, something went wrong because of --->".mysqli_error($conn));

    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <style>
            h1{
                margin-bottom: 20px;
                text-align:center;
            }
            table{
                border-collapse: collapse;
            }
            td,th{
                border: 1px solid black;
                padding: 2px;
                text-align:center;
            }
        </style>
    
    </head>
    <body>
    <h1>Report From Agent Id '.$a_agent.' & Date '.Date('d-m-Y',strtotime($a_date2)).'</h1>
        <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>policy Id</th>
            <th>policy Name</th>
            <th>Customer Id</th>
            <th>Customer Name</th>
            <th>Nominee Id</th>
            <th>Nominee Name</th>
            <th>Aadhar Card</th>
            <th>Agent Id</th>
            <th>Agent Name</th>
            <th>Date</th>
            <th>Renew Date</th>
           
          </tr>
        </thead>
        <tbody>';

        while($a_row=mysqli_fetch_assoc($a_query)){
            $html.='
                <tr>
                <td>'.$a_row['id'].'</td>
                <td>'.$a_row['policy_id'].'</td>
                <td>'.$a_row['policy_name'].'</td>
                <td>'.$a_row['customer_id'].'</td>
                <td>'.$a_row['c_name'].'</td>
                <td>'.$a_row['nominee_id'].'</td>
                <td>'.$a_row['name'].'</td>
                <td>'.$a_row['c_name'].'.pdf </td>
                <td>'.$a_row['agent_id'].'</td>
                <td>'.$a_row['agent_name'].'</td>
                <td>'.$a_row['date'].'</td>
                <td >'.$a_row['renew_date'].'</td>
                </tr>
            ';
        }

}


$datee = Date('d-m-Y');

$dompdf = new Dompdf;
$dompdf->loadHtml($html);
// $dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream($datee,array("Attachment"=>0));
// $dompdf->stream('abc.pdf');


?>

