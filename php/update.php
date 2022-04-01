<?php 
    session_start();
    require_once('crud.inc.php');

    if(empty($_POST)) {
        $_SESSION['error'] = 'Error: update failed';
        header('Location: /index.php');
        exit();
    }

    if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['gender']) || empty($_POST['image'])) {
        $_SESSION['error'] = 'Error: all fields are required';
        header('Location: edit.php?id=' . $_POST['id']);
        exit();
    } else {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $image = $_POST['image'];

        $bd = connect_db();
        update_info($bd, $id, $first_name, $last_name, $gender, $image);
        $_SESSION['success'] = 'Data n°' . $id . ' updated !';
        header('Location: /index.php');
    }
?>