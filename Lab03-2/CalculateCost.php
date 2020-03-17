<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculate Cost Quote</title>
    </head>
    <body>
        <font size=5 color="blue">Your Estimated Carpet Costs</font>
        <?php
            function carpet_cost($width, $length, $grade) {
                if ($width > 0 && $length > 0) {
                    if ($grade == 1) {
                        $carpet_cost = $width * $length * 4.99;
                        return $carpet_cost;
                    } elseif ($grade == 2 ) {
                        $carpet_cost = $width * $length * 3.99;
                        return $carpet_cost;
                    } else {
                        print "Unknown carpet grade = $grade";
                        return 0;
                    }
                } else { return 0; }
            }
            $width = $_POST["width"]; $length = $_POST["length"]; $grade = $_POST["grade"];
            $install_cost = 0;
            $carpet_cost = carpet_cost($width, $length, $grade);
            if ($carpet_cost) {
                $room_size = $width * $length;
                $total_cost = $carpet_cost + ($carpet_cost * .5);
                print "<br>Total square feet = $room_size";
                print "<br>Carpet grade = $grade";
                print "<br>Carpet cost = $carpet_cost";
                print "<br>Total cost estimated (installed) = $total_cost";
            } else { print "Illegal value received"; }
        ?>
    </body>
</html>
