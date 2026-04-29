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

    $stmt = mysqli_prepare($connection, "INSERT INTO Admin (Name, Pass) VALUES (?, ?)");

    mysqli_stmt_bind_param($stmt, "ss", $name, $pass);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Insert Error: " . mysqli_error($connection);
    }
}

/* ====== SELECT ====== */
$sql = "SELECT * FROM Admin";
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
    <title>PHP First Project</title>

    <style>
        body {
            font-family: Arial;
            background: #0f172a;
            color: white;
            margin: 0;
        }

        form {
            width: 300px;
            margin: 30px auto;
            background: #1e293b;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input {
            padding: 10px;
            border-radius: 6px;
            border: none;
        }

        button {
            padding: 10px;
            background: #22c55e;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #1e293b;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background: #22c55e;
        }

        tr:nth-child(even) {
            background: #334155;
        }
    </style>
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
            <td><?= $row['AdminID'] ?></td>
            <td><?= $row['Name'] ?></td>
            <td><?= $row['Pass'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>