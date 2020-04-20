<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert Results</title>
    </head>
    <body>
        <form action="" method="POST">
            <?php
                $message = "";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $item = (string) $_POST['item'];
                    $weight = (int) $_POST['weight'];
                    $cost = (int) $_POST['cost'];
                    $available = (int) $_POST['available'];
                    $server = 'localhost';
                    $user = 'root';
                    $pass = 'root';
                    $mydb = 'sale';
                    $table_name = 'Products';
                    $connect = mysqli_connect($server, $user, $pass, $mydb);
                    if (!$connect) {
                        die ("Cannot connect to $server using $user");
                    } else {
                        $SQLcmd = "INSERT INTO $table_name VALUES('0', '$item', '$weight', '$cost', '$available')";
                        if (mysqli_query($connect, $SQLcmd)){
                            $message = "<font size=\"4\" color=\"blue\" >The Query is $SQLcmd</font>"
                                    . "<br>Insert into $table_name was successful!";
                        } else {
                            $message = ("Insertion Failed SQLcmd=$SQLcmd");
                        } 
                        mysqli_close($connect);
                    }
                    print $message;
                }
            ?>
        </form>
    </body>
</html>