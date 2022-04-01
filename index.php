<!-- By Jules Bousrez -->

<?php session_start(); require_once('php/crud.inc.php'); ?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <title>Super Simple CRUD</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="/css/base.css">

</head>
<body>
    <section class="introduction">
        <h1>Super Simple CRUD</h1>
        <p>CRUD of a database using PHP</p>
        <a href="php/add.php">Add data</a>
        <?php 
            if (isset($_SESSION['error'])) {
                echo '<p class="error">' . $_SESSION['error'] . '</p>';
                unset($_SESSION['error']);
            }
            elseif (isset($_SESSION['success'])) {
                echo '<p class="success">' . $_SESSION['success'] . '</p>';
                unset($_SESSION['success']);
            }
        ?>
    </section>

    <?php 
        $bd = connect_db();
        list_db($bd);
    ?>
</body>
</html>