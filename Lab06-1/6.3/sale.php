<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert data to Products</title>
    </head>
    <body>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $item = $_POST['item'];
                $server = 'localhost';
                $user = 'root';
                $pass = 'root';
                $mydb = 'sale';
                $table_name = 'Products';
                $connect = mysqli_connect($server, $user, $pass, $mydb);
                if (!$connect) {
                    die ("Cannot connect to $server using $user");
                } else {
                    $SQLcmd = "UPDATE $table_name SET Numb = Numb-1 WHERE (Product_desc = '$item')";
                    if (mysqli_query($connect, $SQLcmd)){
                        echo "<font size=\"4\" color=\"blue\" >Update Results for Table $table_name</font>"
                           . "<br>The Query is $SQLcmd<br>";
                        $SQLcmd = "SELECT * FROM $table_name";
                        $result = mysqli_query($connect, $SQLcmd);
                        $rows = mysqli_num_rows($result);
                        if ($rows) { 
                            echo "<br><table border=1>";
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
            }
        ?>
    </body>
</html>