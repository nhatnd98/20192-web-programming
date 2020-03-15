<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Personal Details</title>
    </head>
    <body>
        <?php
            $fullname = $_POST['fullname'];
            $student_id = $_POST['student-id'];
            $university = $_POST['university'];
            $class = $_POST['class'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $count = 0;
            print ("Hello, $fullname<br>");
            print ("You are studying at class $class, $university<br>");
            print ("Your gender is $gender<br>");
            print ("Your student ID is $student_id<br>");
            print ("Your address is $address<br>");
            print ("Your hobbies are:<br>");
            if (isset($_POST['submit'])) {
                if (!empty($_POST['hobby'])) {
                    foreach ($_POST['hobby'] as $selected) {
                        $count++;
                        echo "$count. ".$selected."<br>";
                    }
                }
            }
        ?>
    </body>
</html>
