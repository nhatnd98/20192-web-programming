<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Date Time Function</title>
    </head>
    <body>
        <h1>Date Time Function</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Enter name of first person: </td>
                    <td><input type="text" name="first_name"></td>
                </tr>
                <tr>
                    <td>Enter birthday of first person(dd/mm/yy): </td>
                    <td><input type="text" name="first_dob"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td>Enter name of second person: </td>
                    <td><input type="text" name="second_name"></td>
                </tr>
                <tr>
                    <td>Enter birthday of second person(dd/mm/yy): </td>
                    <td><input type="text" name="second_dob"></td>
                </tr>
            </table>
            <input type="submit" value="Submit"><br>
            <?php
                function date_in_letter($date) {
                    if ($date) {
                        return date_format($date, "l, F d, Y.");
                    } else {
                        return "invalid!";
                    }
                }
                function date_diff_in_days($date1, $date2) {
                    if ($date1 && $date2) {
                        $diff = date_diff($date1, $date2);
                        echo "Difference between two dates is ".$diff->format("%a days.<br><br>");
                    }
                }
                function date_diff_in_years($date1, $date2) {
                    if ($date1 && $date2) {
                        $diff = date_diff($date1, $date2);
                        return $diff->format("%y");
                    }
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $first_name = $_POST['first_name'];
                    $first_dob = $_POST['first_dob'];
                    $second_name = $_POST['second_name'];
                    $second_dob = $_POST['second_dob'];
                    $date1 = date_create_from_format("d/m/Y", $first_dob);
                    $date2 = date_create_from_format("d/m/Y", $second_dob);
                    echo "<br>First person's birthday is ".date_in_letter($date1)."<br>";
                    echo "Second person's birthday is ".date_in_letter($date2)."<br><br>";
                    date_diff_in_days($date1, $date2);
                    if (date_diff_in_years(date_create(), $date1) && date_diff_in_years(date_create(), $date1) > 0) {
                        echo "First person is ".date_diff_in_years(date_create(), $date1)." years old.<br>";
                    }
                    if (date_diff_in_years(date_create(), $date2) && date_diff_in_years(date_create(), $date2) > 0) {
                        echo "Second person is ".date_diff_in_years(date_create(), $date2)." years old.<br><br>";
                    }
                    if (date_diff_in_years($date1, $date2)) {
                        echo "Difference between two dates is ".date_diff_in_years($date1, $date2)." years.";
                    }
                }
            ?>
        </form>
    </body>
</html>
