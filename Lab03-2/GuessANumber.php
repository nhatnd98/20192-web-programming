<?php
    session_start();
    if (!isset($_POST["guess"])) {
         $_SESSION["count"] = 0;
         $message = "Welcome to the guessing game!";
         $_POST["secret_number"] = mt_rand(0, 100);
    } elseif (!is_numeric($_POST["guess"])) {
        $message = "You must enter a number!";
    } elseif ($_POST["guess"] > $_POST["secret_number"]) {
        $_SESSION["count"]++;
        if ($_SESSION["count"] == 1) {
            $message = "Wrong! Please try a smaller number. You have guessed ".$_SESSION["count"]." time!";
        } else {
            $message = "Wrong! Please try a smaller number. You have guessed ".$_SESSION["count"]." times!";
        }

    } elseif ($_POST["guess"] < $_POST["secret_number"]) {
        $_SESSION["count"]++;
        if ($_SESSION["count"] == 1) {
            $message = "Wrong! Please try a higher number. You have guessed ".$_SESSION["count"]." time!";
        } else {
            $message = "Wrong! Please try a higher number. You have guessed ".$_SESSION["count"]." times!";
        }

    } else {
        $_SESSION["count"]++;
        if ($_SESSION["count"] == 1) {
            $message = "Congratulations! You guessed the right number in ".$_SESSION["count"]." attempt!";
        } else {
            $message = "Congratulations! You guessed the right number in ".$_SESSION["count"]." attempts!";
        }
        unset($_SESSION["count"]);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>A simple guessing game</title>
    </head>
    <body>
        <p><strong><?php echo $message; ?></strong></p>
        <form action="" method="POST">
            <p>Enter your guess: </p>
            <input type="text" name="guess">
            <input type="hidden" name="secret_number" value="<?php echo $_POST["secret_number"]; ?>" ></p>
            <p><input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>