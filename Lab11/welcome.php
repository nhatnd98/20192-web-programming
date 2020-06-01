<?php
    require_once 'check_login.php';
    $username = $_SESSION['username'];
?>
<html>
    <head>
        <title>Welcome Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Welcome <?= $username ?>!</h1>
    </body>
</html>