<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/* ====== DB CONNECTION ====== */
$connection = mysqli_connect(
    'sql203.infinityfree.com',
    'if0_41784483',
    'Yousefatef1212',
    'if0_41784483_php'
);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

/* ====== INSERT (Prepared Statement 🔒) ====== */
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $stmt = mysqli_prepare($connection, "INSERT INTO admin (Name, Pass) VALUES (?, ?)");

    mysqli_stmt_bind_param($stmt, "ss", $name, $pass);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Insert Error: " . mysqli_error($connection);
    }
}

/* ====== SELECT ====== */
$sql = "SELECT * FROM admin";
$result = mysqli_query($connection, $sql);

if (!$result) {
    die("Query Error: " . mysqli_error($connection));
}

$tables = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP First Project</title>

  
</head>

<body>
    

        <!-- ====== FORM ====== -->
        <form method="POST">
            <input type="text" name="name" placeholder="Enter Name" required>
            <input type="password" name="pass" placeholder="Enter Password" required>
            <button type="submit" name="submit">Add Admin</button>
        </form>

        <!-- ====== TABLE ====== -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
            </tr>

            <?php foreach ($tables as $row): ?>
                <tr>
                    <td>
                        <?= $row['AdminID'] ?>
                    </td>
                    <td>
                        <?= $row['Name'] ?>
                    </td>
                    <td>
                        <?= $row['Pass'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>



</body>

</html>