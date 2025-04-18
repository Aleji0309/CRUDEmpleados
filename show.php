<?php 
include 'db.php';
include 'create.php';
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Empleados</title>
</head>
<body>

    <h1>Información de Empleados</h1>



    Welcome <?php echo $_POST["nombre_emp"]; ?><br>
    Your Email is: <?php echo $_POST["email"] ?>

</body>
</html>

