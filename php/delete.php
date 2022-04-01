<?php 
    session_start();
    require_once('crud.inc.php');

    $id = $_GET['id'];
    if(empty($id)) {
        $_SESSION['error'] = 'Error: id is required';
        header('Location: /index.php');
        exit();
    }

    $bd = connect_db();
    delete_info($bd, $id);

    $_SESSION['success'] = 'Data n°' . $id . ' deleted !';
    header('Location: /index.php');
?>