<?php
include('includes/config.php');
$ret=mysqli_query($con,"select * from rating_group");
$myArray = array();
while ($row=mysqli_fetch_array($ret)) 
{
	$tempArray = $row;
    array_push($myArray, $tempArray);
}
 echo json_encode($myArray);

?>