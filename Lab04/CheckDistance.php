<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Distance and Time Calculations </title>
    </head>
    <body>
        <?php
            $cities = array ('Dallas' => 803, 'Toronto' => 435, 'Boston' => 848,
                            'Nashville' => 406, 'Las Vegas' => 1526,
                            'San Francisco' => 1835, 'Washington, DC'=> 595,
                            'Miami' => 1189, 'Pittsburgh' => 409);
            $destinations = $_GET['destinations'];
            if (is_array($destinations)) {
                $count = 1;
                $last_destination = $destinations[count($destinations) - 1];
                $distance = $cities[$last_destination];
                $time = round(($distance / 60), 2);
                $walktime = round(($distance / 5), 2);
                echo "The distance between Chicago and <i> $last_destination </i> is $distance miles.";
                echo "<br>Driving at 60 miles per hour it would take $time hours.";
                echo "<br>Walking at 5 miles per hour it would take $walktime hours.";
                echo '<table border="1">';
                echo "<th><strong>No.</strong></th>
                      <th><strong>Destination</strong></th>
                      <th><strong>Distance</strong></th>
                      <th><strong>Driving time</strong></th>
                      <th><strong>Walking time</strong></th>";
                foreach ($destinations as $destination) {
                    $distance = $cities[$destination];
                    $time = round(($distance / 60), 2);
                    $walktime = round(($distance / 5), 2);
                    echo "<tr>";
                    echo "<td>$count</td><td>$destination</td><td>$distance</td><td>$time</td><td>$walktime</td>";
                    echo "</tr>";
                    $count++;
                }
                echo "</table>";
            } else {
                echo "Sorry, do not have destination information for $last_destination.";
            }
        ?>     
    </body>
</html>
