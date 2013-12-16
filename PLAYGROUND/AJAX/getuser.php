<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','n02276249','s768207','n02276249_db');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"ajax_demo");
$sql="	SELECT U.*, K.Name, U.id AS U_id, K.id AS K_id
						FROM 2013NewFall_Users U
							JOIN 2013NewFall_Keywords K ON U.UserType = K.id
						WHERE U.id='".$q."'";

$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Password</th>
<th>Type</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Password'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";	
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?> 