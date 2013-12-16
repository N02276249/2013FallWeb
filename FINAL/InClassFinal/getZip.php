<?php
$q = intval($_GET['q']);

 $con = mysqli_connect('localhost','plotkinm','FaceBooK','plotkinm_db');
 if (!$con)
   {
   die('Could not connect: ' . mysqli_error($con));
   }

 mysqli_select_db($con,"ajax_demo");
 $sql="SELECT * FROM US_Zip_Codes WHERE id = '".$q."'";

 $result = mysqli_query($con,$sql);

 echo "<table border='1'>
 <tr>
 <th>Zip</th>
 <th>City</th>
 <th>State</th>
 </tr>";

 while($row = mysqli_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['zip'] . "</td>";
   echo "<td>" . $row['city'] . "</td>";
   echo "<td>" . $row['state'] . "</td>";
   echo "</tr>";
   }
 echo "</table>";

 mysqli_close($con);
 ?> 