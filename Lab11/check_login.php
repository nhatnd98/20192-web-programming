<?php
    session_start();
    session_destroy();
    require_once 'DB.php';
    
    $username = 'root';
    $password = 'root';
    $host = 'localhost';
    $database = 'lab11';
    $dbtype = 'mysqli';
    
    # DSN constructed from parameters 
    $dsn = "$dbtype://$username:$password@$host/$database";

    # Establish the connection
    $db = DB::connect($dsn);
    if (DB::isError($db)) {
        die ($db->getMessage());
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = 'SELECT * FROM users WHERE username = ? AND password = ?';
        $params = array($username, $password);
        $query = $db->prepare($sql);
        if (DB::isError($query)) die($query->getMessage());
        $result = $db->execute($query, $params);
        if (DB::isError($result)) die($result->getMessage());
        $row = $result->fetchRow();
        if (empty($row)) {
            print "<span style=\"color: red\">Username or password is not correct</span>";
        } else {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: welcome.php');
        }
    }
?>

