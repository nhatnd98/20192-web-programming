<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Distance from Chicago! </title>
    </head>
    <body>
        <font size=4 color=blue> Welcome to Distance Calculation Page </font>
        <br>The page that calculates the distances from Chicago!
        <br>Select a destination:
        <form action="CheckDistance.php" method="GET">
            <select name="destinations[]" size=5 multiple>
                <option>Boston</option>
                <option>Dallas</option>
                <option>Miami</option>
                <option>Nashville</option>
                <option>Las Vegas</option>
                <option>Pittsburgh</option>
                <option>San Francisco</option>
                <option>Toronto</option>
                <option>Washington, DC</option>
            </select>
            <br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </body>
</html>
