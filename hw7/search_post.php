<?php
    // connect database 
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "song";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

    // check connection error 
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        // connect success, do nothing
        //echo "Connect success.";
    }


    if (isset($_POST['kw'])) {
        $kw = $_POST['kw'];
    } else {
        $kw = ' ';
    }
    if (isset($_POST['typ'])) {
        $typ = $_POST['typ'];
    } else {
        $typ = '';
    }

    if($typ !=0){
        $sql = "SELECT *
        FROM song
        WHERE NameAlbum  LIKE '%$typ%'";
    }else{
        $sql = "SELECT *
            FROM song
            WHERE NameSong LIKE '%$kw%' OR NameArtist LIKE '%$kw%'";
    }


    
    $result = $mysqli->query($sql);

    $arr = array();
    
        while($row = $result->fetch_object())
        {
            $arr[] = $row;
        }
    
        echo json_encode($arr,JSON_UNESCAPED_UNICODE);


    // $name = $_POST['name'];
    // $addr = $_POST['addr'];
    // $email = $_POST['email'];
    // $user = $_POST['user'];
    // $pass = $_POST['pass'];
    // $sql = "INSERT INTO registers (id, name, address, email, username, password) 
    //         VALUES (NULL, '$name', '$addr', '$email', '$user', '$pass')";
    // $result = $mysqli->query($sql);