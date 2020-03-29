<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Date Time Processing</title>
    </head>
    <body>
        <?php
            $begin_year = 2020;
            $end_year = 2100;
            function is_leap_year($year) {
                if ($year % 100 != 0) {
                    if ($year % 4 == 0) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    if ($year % 400 == 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
            function max_day($month, $year) {
                $m30 = [4, 6, 9, 11];
                $m31 = [1, 3, 5, 7, 8, 10, 12];
                if ($month == 2) {
                    if (is_leap_year($year)) {
                        return 29;
                    } else {
                        return 28;
                    }
                } elseif (in_array($month, $m30)) {
                    return 30;
                } elseif (in_array($month, $m31)) {
                    return 31;
                } else {
                    return 0;
                }
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <?php
                $keys_array = array('name', 'day', 'month', 'year', 'hour', 'minute', 'second');
                foreach ($keys_array as $key) {
                    if (array_key_exists($key, $_GET)) {
                        if ($key == 'name') {
                            $$key = $_GET[$key];
                        } else {
                            $$key = (int) $_GET[$key];
                        }
                    } else {
                        if ($key == 'name') {
                            $$key = "";
                        } else {
                            $$key = 0;
                        }
                    }
                }
                $max_day = max_day($month, $year);
            ?>          
            <p>Enter your name and select date and time for the appointment</p>
            <table>
                <tr>
                    <td>Your name: </td>
                    <td><input type="text" name="name"/></td>
                </tr>
                <tr>
                    <td>Date: </td>
                    <td>
                        <select name="day">
                            <?php
                                for ($i=1; $i<=31; $i++) {
                                    if ($end == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }    
                                }
                            ?>
                        </select>
                        <select name="month">
                            <?php
                                for ($i=1; $i<=12; $i++) {
                                    if ($month == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }    
                                }
                            ?>
                        </select>
                        <select name="year">
                            <?php
                                for ($i=$begin_year; $i<=$end_year; $i++) {
                                    if ($year == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }    
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Time: </td>
                    <td>
                        <select name="hour">
                            <?php
                                for ($i=0; $i<=23; $i++) {
                                    if ($hour == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }    
                                }
                            ?>
                        </select>
                        <select name="minute">
                            <?php
                                for ($i=0; $i<=59; $i++) {
                                    if ($minute == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }    
                                }
                            ?>
                        </select>
                        <select name="second">
                            <?php
                                for ($i=0; $i<=59; $i++) {
                                    if ($second == $i) {
                                        print ("<option selected>$i</option>");
                                    } else {
                                        print ("<option>$i</option>");
                                    }    
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" name="submit" value="Submit"/></td>
                    <td align="left"><input type="reset" name="reset" value="Reset"/></td>
                </tr>
            </table>
        </form>
        <?php
            if (array_key_exists("submit", $_GET)) {
                $name = $_GET['name'];
                $datetime = sprintf("%s-%s-%s %s HOURS %s MINUTES %s SECOND", $year, $month, $day, $hour, $minute, $second);
                print "Hi $name!<br>";
                print ("You have choosen to have an appoinment on " . date('H:i:s d/m/Y', strtotime($datetime)) . "<br><br>");
                print "More information<br><br>";
                print "In 12 hours, the time and date is " . date('h:i:s A d/m/Y', strtotime($datetime)) . "<br><br>";
                print "This month has " . max_day($month, $year) . " days!";
            }
        ?>
    </body>
</html>