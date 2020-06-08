<?php
    header('Content-Type: text/xml');
    header("Cache-Control: no-cache, must-revalidate");
    $q=$_GET["q"];

    $con = mysqli_connect('localhost', 'root', 'root');
    if (!$con) {
      die('Could not connect: ' . mysqli_error());
    }

    mysqli_select_db($con, "ajax_demo");

    $sql="SELECT * FROM user WHERE id = '".$q."'";

    $result = mysqli_query($con, $sql);

    echo '<?xml version="1.0" encoding="ISO-8859-1"?>
    <person>';

    while($row = mysqli_fetch_array($result)) {
        echo "<firstname>" . $row['FirstName'] . "</firstname>";
        echo "<lastname>" . $row['LastName'] . "</lastname>";
        echo "<age>" . $row['Age'] . "</age>";
        echo "<hometown>" . $row['Hometown'] . "</hometown>";
        echo "<job>" . $row['Job'] . "</job>";
    }
    echo "</person>";

    mysqli_close($con);
?> 