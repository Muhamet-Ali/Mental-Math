<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>
    <?php
    //DELETE FROM car WHERE id='$id'
    include('conn.php');
    $id=$_GET['id'];
    $delete = $connection->query("DELETE FROM question WHERE id='$id'");
    header("Location: admin.php");
    exit();
    ?>  
</body>

</html>