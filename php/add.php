<?php 
    session_start();
    require_once('crud.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add data</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="/css/base.css">
</head>
<body>
    <section class="introduction">
        <h1>Add data</h1>
        <?php
            if (isset($_SESSION['error'])) {
                echo '<p class="error">' . $_SESSION['error'] . '</p>';
                unset($_SESSION['error']);
            }
        ?>
        <a href="/index.php">Back</a>
    </section>

    <form action="add_confirm.php" method='POST'>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="gender">Genre:</label>
        <input type="text" name="gender" required>

        <label for="gender">Image link:</label>
        <input type="text" name="image" required>

        <input type="submit" value="Send">
    </form>
</body>
</html>