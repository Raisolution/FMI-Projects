<!DOCTYPE html>
<?php

?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Намери си другарче</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
    </head>
    <body>
        <div id="container">
            <h1>Добре дошли!</h1>
            
        <form action="login.php" method="POST">
            <table id="login">
                <tr>
                    <td>Username:</td><td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password:</td><td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Log in"></td>
                </tr>
            </table>
        </form>
            <div id="reglinks">
        Регистрация за мъже: <a href="maleregister.php">Register</a><br/><br/>
        Регистрация за жени: <a href="femaleregister.php">Register</a>
            </div>
                <div id="footer">
                    <image src="224.jpg">
                </div>
        </div>
    </body>
</html>
