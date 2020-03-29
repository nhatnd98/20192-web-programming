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
        <font size=4 color="blue">
        <?php
            $today = date("1, F d, Y");
            print "Welcome on $today to our huge blowout sale!";
            $month = date('m');
            $year = date('Y');
            $dayofyear = date('z');
            if ($month==12 && $year==2001) {
                $dayleft = (365 - $dayofyear + 10);
                print "<br> There are $dayleft sales days left";
            } else {
                print "<br>Sorry, our sale is over.";
            }
        print "<br>Our Sale Ends January 10, 2002";  
        ?>
        </font>
    </body>
</html>
