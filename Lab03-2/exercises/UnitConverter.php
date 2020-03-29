<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unit Converter</title>
    </head>
    <body>
        <form action="" method="POST">
            <?php
                define("PI", "3.14");
                $converted_value = 0;
                function rad_to_deg($rad) {
                    return $rad * 180/PI;
                }
                function deg_to_rad($deg) {
                    return $deg * PI/180;
                }
                $units = array('Radian', 'Degree');
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $from_unit = $_POST['from_unit'];
                    $to_unit = $_POST['to_unit'];
                    $initial_value = (float) $_POST['initial_value'];
                }
                if ($from_unit == $to_unit) {
                    $converted_value = $initial_value;
                } elseif ($from_unit == "Radian" && $to_unit == "Degree") {
                    $converted_value = rad_to_deg($initial_value);
                } elseif ($from_unit == "Degree" && $to_unit == "Radian") {
                    $converted_value = deg_to_rad($initial_value);
                }
            ?>
            <h1>Unit Converter</h1>
            <table>
                <tr><td>From</td></tr>
                <tr>
                    <td>
                        <select name="from_unit">
                            <?php 
                                foreach ($units as $unit) {
                                    if ($from_unit == $unit) {
                                        echo "<option selected>$unit</option>";
                                    } else {
                                        echo "<option>$unit</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
                    <td><input type="text" name="initial_value" value="<?php echo (!empty($initial_value)) ? $initial_value : '' ?>"></td>
                </tr>
                <tr><td>To</td></tr>
                <tr>
                    <td>
                        <select name="to_unit">
                            <?php 
                                foreach ($units as $unit) {
                                    if ($to_unit == $unit) {
                                        echo "<option selected>$unit</option>";
                                    } else {
                                        echo "<option>$unit</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
                    <td><input type="text" value="<?php echo (!empty($converted_value)) ? $converted_value : '' ?>"></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Convert"><br>
        </form>
    </body>
</html>
