<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $date = $_POST['date'];
            $two = '[[:digit:]]{2}';
            $month = '[0-1][[:digit:]]';
            $day = '[0-3][[:digit:]]';
            $year="2[[:digit:]]$two";
            if (preg_match("#^($month)/($day)/($year)$#", $date)) {
                $date_arr = preg_split('/\//', $date);
                if (checkdate($date_arr[0], $date_arr[1], $date_arr[2])) {
                    print "Got valid date = $date";
                } else {
                    print "Invalid date = $date";
                }
            } else {
                print "Invalid date = $date";
            }
        ?>
    </body>
</html>
