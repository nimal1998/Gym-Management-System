<?php
session_start();
  require_once("db_connect.php");

						$user=$_SESSION['user'];
				$sq="SELECT * FROM members INNER JOIN users ON members.id=users.id WHERE users.username ='$_SESSION[user]'";
                $result = $conn->query($sq);
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
				  $uid=$row['id'];



				  }}
                $id=$_GET['id'];
                $uid=$_GET['uid'];
    $sql="select * from transaction where id='$id' and member_id='$uid'";
    $res=mysqli_query($conn,$sql);

echo $uid;
echo $id;

$html = "
<h1 align='center'><u>Reciept</u></h1>
<table border='1' width='100%' style='border-collapse: collapse;'>
        <tr>
            <th>Transaction ID</th><th>Mode</th><th>Amount</th>
        </tr>";

        while($fi=mysqli_fetch_array($res))
             // printf("%s (%s) %s\n", $fi["date"],$fi["attend_status"],$fi["Name"]);
                       {
                        $html .='
                        <tr>
                        <td>'.$fi["ref"].'</td>
                        <td>'.$fi["mode"].'</td>
                         <td>'.$fi["amount"].'</td>
                        </tr>';
 }
       $html.="</table>";
$filename = "Transaction Receipt";

// include autoloader
require_once 'dompdf/autoload.inc.php';


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename);
