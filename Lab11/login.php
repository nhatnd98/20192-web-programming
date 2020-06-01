<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Login Form</h1>
        <form action="check_login.php" method="POST">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" name="username"/></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" name="password"/></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Login"/>
        </form>
    </body>
</html>
