<?php 
    session_start();
    require_once('crud.inc.php');

    if(empty($_POST)) {
        $_SESSION['error'] = 'Error: adding data failed';
        header('Location: /index.php');
        exit();
    }

    if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['gender']) || empty($_POST['image'])) {
        $_SESSION['error'] = 'All fields are required';
        header('Location: /php/add.php');
        exit();
    } else {
        $bd = connect_db();
        add_info($bd, $_POST['first_name'], $_POST['last_name'], $_POST['gender'], $_POST['image']);

        $_SESSION['success'] = 'Data added to database';
        header('Location: /index.php');
    }

?>