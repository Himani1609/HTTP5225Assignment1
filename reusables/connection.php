<?php
$connect = mysqli_connect('localhost','u384574077_phphimani','Manik140769$','u384574077_phpdatabase');
if(!$connect){
    echo "Error occured.";
    echo "Error code: " . mysqli_connect_errno();
    echo "Error: " . mysqli_connect_error();
    exit;
}
?>
