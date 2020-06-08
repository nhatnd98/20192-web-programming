<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
            function validateUsername() {
                const username = document.getElementById('username').value;
                const usernameCheck = new RegExp("^(?!\s*$).+");
                if (usernameCheck.test(username)) {
                    return true;
                }
                alert("Invalid username!");
                return false;
            }
            function validateEmail() {
                const email = document.getElementById('email').value;
                const emailCheck = new RegExp("^[A-Za-z0-9_]+@[A-Za-z0-9.]+\.[A-Za-z]{2,}$");
                if (emailCheck.test(email)) {
                    return true;
                }
                alert("Invalid email!");
                return false;
            }
            function validatePhoneNumber() {
                const phone = document.getElementById('phone').value;
                const phoneCheck = new RegExp("^[0|+84]+[0-9]{9}$");
                if (phoneCheck.test(phone)) {
                    return true;
                }
                alert("Invalid phone number!");
                return false;
            }
            function validateRegister() {
                if (validateUsername() && validateEmail() && validatePhoneNumber()){
                    alert("All information is valid.");
                    return true;
                }
                return false;
            }
        </script>
    </head>
    <body>
        <form action="" onsubmit="return validateRegister()" method="POST">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username"/></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="text" id="email"/></td>
                </tr>
                <tr>
                    <td><label for="phone">Phone Number:</label></td>
                    <td><input type="text" id="phone"/></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Register"/>
        </form>
    </body>
</html>