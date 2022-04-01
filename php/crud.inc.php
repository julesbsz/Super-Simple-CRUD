<?php 

    function connect_db() {
        $bd = null;
        $user = 'root';
        $pass = 'root';

        try {
            $bd = new PDO("mysql:host=localhost;port=3306;dbname=super_simple_crud;charset=UTF8;", $user, $pass);
            $bd->query('SET NAMES utf8;');
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        echo '<p style="color: lightgreen;">Connected to database successfully </p>';
        return $bd;
    }

    function disconnect_db($bd) {
        $bd = null;
    }

    function list_db($bd) {
        $req = "SELECT * FROM data";
        try {
            $result = $bd->query($req);
            echo '<table class="list_table">';
            echo '<tr><th>ID</th> <th>Image</th> <th>First Name</th> <th>Last Name</th> <th>Gender</th> <th>Edit</th> <th>Delete</th></tr>';
            foreach($result as $value) {
                echo '<tr>';
                echo '<td>' . $value['id'] . '</td>';
                echo '<td> <img src="' . $value['image'] . '"></td>';
                echo '<td>' . $value['first_name'] . '</td>';
                echo '<td>' . $value['last_name'] . '</td>';
                echo '<td>' . $value['gender'] . '</td>';
                echo '<td><a href="php/edit.php?id='.$value['id'].'">Edit</a></td>';
                echo '<td><a href="php/delete.php?id='.$value['id'].'">Delete</a></td>';
                echo '</tr>';
            } 
            echo '</table>';
        } catch (PDOException $e) {
            echo '<p>Unable to list data : ' . $e->getMessage() . '</p>';
            die();
        }
    }

    function get_info($bd, $id) {
        $req = "SELECT * FROM data WHERE id = $id";
        try {
            $result = $bd->query($req);
            $data = $result->fetch();
        } catch (PDOException $e) {
            echo '<p>Unable to get data : ' . $e->getMessage() . '</p>';
            die();
        }
        return $data;
    }

    function update_info($bd, $id, $first_name, $last_name, $gender, $image) {
        $req = "UPDATE data SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', image = '$image' WHERE id = $id";
        try {
            $result = $bd->query($req);
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
    }

    function delete_info($bd, $id) {
        $req = "DELETE FROM data WHERE id = $id";
        try {
            $result = $bd->query($req);
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
    }

    function add_info($bd, $first_name, $last_name, $gender, $image) {
        $req = "INSERT INTO data (first_name, last_name, gender, image) VALUES ('$first_name', '$last_name', '$gender', '$image')";
        try {
            $result = $bd->query($req);
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
    }
?>