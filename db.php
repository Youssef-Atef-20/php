<?php


$connection = mysqli_connect('localhost', 'youssef', 'youssef', 'test2');

if (!$connection) {
    echo 'Connection Error ' . mysqli_connect_error();
}


$sql = 'SELECT * FROM ADMIN';


$result = mysqli_query($connection, $sql);




$tables = mysqli_fetch_all($result, MYSQLI_ASSOC);


print_r($table);



?>