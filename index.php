<?php

$connection = mysqli_connect('localhost', 'youssef', 'youssef', 'test2');

if (!$connection) {
    echo 'Connection Error ' . mysqli_connect_error();
}

// لما المستخدم يضغط submit
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $pass = $_POST['pass'];



    $sql = "INSERT INTO Admin (Name, Pass) VALUES ('$name', '$pass')";

    if (mysqli_query($connection, $sql)) {
        echo "Data inserted successfully 🔥";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

?>


<?php


$connection = mysqli_connect('sql203.infinityfree.com', 'if0_41784483', 'Yousefatef1212', 'test2');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 


$sql = 'SELECT * FROM ADMIN';


$result = mysqli_query($connection, $sql);




$tables = mysqli_fetch_all($result, MYSQLI_ASSOC);






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <title>PHP First Project</title>
</head>


<body>





    <form action="" method="POST">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="password" name="pass" placeholder="Enter Password" required>
        <button type="submit" name="submit">Add Admin</button>
    </form>


    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Password</th>
        </tr>

        <?php foreach ($tables as $table): ?>
            <tr>
                <td><?= $table['AdminID'] ?></td>
                <td><?= $table['Name'] ?></td>
                <td><?= $table['Pass'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>