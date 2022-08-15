<?php 
$conn = mysqli_connect('localhost','root','','r5classdatabase');

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    return $result;
}

?>