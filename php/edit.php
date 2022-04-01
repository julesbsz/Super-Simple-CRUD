<?php
    session_start();
    require_once('crud.inc.php');  
    $id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit data n°<?php echo $id ?></title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="/css/base.css">
</head>
<body>
    <section class="introduction">
        <h1>Edit data n°<?php echo $id ?></h1>
        <a href="/index.php">Back</a>
    </section>

    <?php
        $bd = connect_db();
        if (isset($_SESSION['error'])) {
            echo '<p class="error">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        $data = get_info($bd, $id);
    ?>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $data['first_name'] ?>" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $data['last_name'] ?>" required>

        <label for="gender">Gender:</label>
        <input type="text" name="gender" value="<?php echo $data['gender'] ?>" required>

        <label for="image">Image link:</label>
        <input type="text" name="image" value="<?php echo $data['image'] ?>" required>

        <input type="submit" value="Send">
    </form>

</body>
</html>