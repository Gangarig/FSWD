
<?php

$conn=mysqli_connect('localhost','root','','ajaxtest');

//query
   $query="SELECT * FROM users";

//Get results
$result= mysqli_query($conn,$query);

//Fetch Data from database
$users=mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);

?>