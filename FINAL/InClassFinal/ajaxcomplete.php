<?php 

$q=$_GET['q']; 

$my_data=mysql_real_escape_string($q); 

$mysqli=mysqli_connect('localhost','plotkinm','FaceBooK','plotkinm_db') or die("Database Error"); 

$sql="SELECT * FROM US_Zip_Codes WHERE zip LIKE '%$my_data%' ORDER BY zip LIMIT 10"; 

$result = mysqli_query($mysqli,$sql) or die(mysqli_error()); 


if($result) 

{ 

while($row=mysqli_fetch_array($result)) 

{ 

echo $row['zip']."\n"; 

} 

} 

?> 