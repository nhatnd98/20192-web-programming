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
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Email address:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>URL address:</td>
                    <td><input type="text" name="url"></td>
                </tr>
                <tr>
                    <td>Phone number:</td>
                    <td><input type="text" name="phone"></td>
                </tr>
            </table>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $url = $_POST['url'];
                $phone = $_POST['phone'];
                if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
                   print "Valid email address = $email<br>"; 
                } else {
                    print "Invalid email address = $email<br>"; 
                }
                if (preg_match("/^(http(s)?:\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
                   print "Valid URL address = $url<br>"; 
                } else {
                    print "Invalid URL address = $url<br>"; 
                }
                if (preg_match("/^[0|84][0-9]{9}$/i", $phone)) {
                   print "Valid phone number = $phone<br>"; 
                } else {
                    print "Invalid phone number = $phone<br>"; 
                }
            }
        ?>
    </body>
</html>
