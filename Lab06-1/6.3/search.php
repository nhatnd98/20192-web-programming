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
        <form action="" method="POST">
            <?php
                $result = null;
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
                        $SQLcmd = "SELECT * FROM $table_name WHERE(Product_desc = '$item')";
                        if (mysqli_query($connect, $SQLcmd)){
                            echo "<font size=\"4\" color=\"blue\" >$table_name Data</font>"
                               . "<br>The Query is $SQLcmd<br>";
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
                            } else {
                                echo "Product not found!";
                            } 
                            mysqli_close($connect);
                        } else {
                            die ("Query Failed SQLcmd=$SQLcmd");
                        } 
                    }
                }
            ?>
        </form>
    </body>
</html>