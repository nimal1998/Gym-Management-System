<?php
// Database Connection file
include('db_connect.php');
?>
<table border="1">
<thead>
<tr>
<th>Sr.</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Gender</th>
<th>Phone Number</th>
<th>Address</th>
<th>Email</th>
</tr>
</thead>
<?php
// File name
$filename="Members";
// Fetching data from data base
$query=mysqli_query($conn,"select * from members where status='1' ");
$cnt=1;
while ($row=mysqli_fetch_array($query)) {
?>
            <tr>
                <td><?php echo $cnt;  ?></td>
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['middlename'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['contact'];?></td>
				<td><?php echo $row['address'];?></td>
                <td><?php echo $row['email'];?></td>

            </tr>
<?php
$cnt++;
// Genrating Execel  filess
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Report.xls");
header("Pragma: no-cache");
header("Expires: 0");
} ?>
</table>
