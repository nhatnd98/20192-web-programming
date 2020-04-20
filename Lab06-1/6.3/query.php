<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Table Output</title>
    </head>
    <body>
        <?php
            $server = 'localhost';
            $user = 'root';
            $pass = 'root';
            $mydb = 'sale';
            $table_name = 'Products';
            $connect = mysqli_connect($server, $user, $pass, $mydb);
            if (!$connect) {
                die ("Cannot connect to $server using $user");
            } else {
                $SQLcmd = "SELECT * FROM $table_name";
                if (mysqli_query($connect, $SQLcmd)){
                    echo "<font size=\"4\" color=\"blue\" >$table_name Data</font>"
                       . "<br>The Query is $SQLcmd";
                    $result = mysqli_query($connect, $SQLcmd);
                    $rows = mysqli_num_rows($result);
                    if ($rows) { 
                        echo "<table border=1>";
                        while ($field = mysqli_fetch_field($result)) {
                            echo "<th>$field->name</th>";
                        }
                        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                            echo "<tr>";
                            foreach ($row as $value) {
                                echo "<td>$value</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                } else {
                    die ("Query Failed SQLcmd=$SQLcmd");
                } 
                mysqli_close($connect);
            }
        ?>
    </body>
</html>