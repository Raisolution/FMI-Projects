<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['fullname'], $_POST['username'], $_POST['password'],
            $_POST['repeatpassword'], $_POST['height'], $_POST['bust'], $_POST['legs'])
            && !empty($_POST['fullname']) && !empty($_POST['username'])
            && !empty($_POST['password']) && !empty($_POST['repeatpassword'])
            && !empty($_POST['height']) && !empty($_POST['bust']) && !empty($_POST['legs'])) {
        
        $submit = $_POST['submit'];
        $fullname = strip_tags($_POST['fullname']);
        $username = strtolower(strip_tags($_POST['username']));
        $password = strip_tags($_POST['password']);
        $repeatpassword = strip_tags($_POST['repeatpassword']);
        $height = strip_tags($_POST['height']);
        $hair = $_POST['hair'];
        $bust = strip_tags($_POST['bust']);
        $legs = strip_tags($_POST['legs']);
        
        //open database;
        $connect = mysql_connect("localhost", "root", "password")
                or die(mysql_error());
        mysql_select_db("homework4") or die(mysql_error());

        //proverka dali vuvedenia username e svoboden
        $namecheck = mysql_query("
                SELECT username
                FROM Women
                Where username='$username'
                UNION
                SELECT username
                FROM Men
                Where username='$username'
                ");
        $count = mysql_num_rows($namecheck);
        
        if($count!=0) {
            die("Потребителското име е заето! Моля изберете ново Потребителско име!");
        }
        
        if ($password == $repeatpassword) {
            if (is_numeric($height)!=TRUE || is_numeric($bust)!=TRUE || is_numeric($legs)!=TRUE) {
                echo "Въвели сте невалидни данни за височина, гръдна обиколка или дължина на краката!<br/>
                    Въведете ги с <strong>цифри</strong>!";
            }  else if (strlen($username) > 25 || strlen($fullname) > 50) {
                echo "Надвишили сте максималната дължина за \"Име и фамилия\" (50 символа) или  \"Потребителско име\" (25 символа)";
            } else {
                if (strlen($password) > 25 || strlen($password) < 6) {
                    echo "Паролата трябва да е между 6 и 25 букви";
                } else {
                    //register
                    //encrypt password
                    $password = md5($password);
                    $repeatpassword = md5($repeatpassword);

                    mysql_query('set names utf8', $connect);
                    
                    $queryreg = mysql_query(" 
                        INSERT INTO women(fullname, username, password, height, haircolor, bust, legs)
                        VALUES ('$fullname', '$username', '$password', '$height', '$hair', '$bust', '$legs' );  
                        ");

                    die("Вие се регистрирахте успешно!<br/>
                         Моля върнете се на заглавната страница <a href='index.php'>Излез</a>");
                      
                }
            }     
        }else {
            echo "Въвели сте различни пароли";
        }       
    }  else {
        echo "Моля попълнете <strong>всички</strong> полета!";
    }
}

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Регистрация</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
    </head>
    <body>
        <div id="container">
    <h1>Форма за регистрация /ЖЕНИ/</h1>
    <form action="femaleregister.php" method="POST">
        <table class="regform">
            <tr>
                <td>
                    Име и фамилия (до 50 символа):  
                </td>
                <td>
                    <input type="text" name="fullname" > 
                </td>
            </tr>
            <tr>
                <td>
                    Потребителско име (до 25 символа):  
                </td>
                <td>
                    <input type="text" name="username" > 
                </td>
            </tr>
            <tr>
                <td>
                    Парола (между 6 и 25 символа):  
                </td>
                <td>
                    <input type="password" name="password"> 
                </td>
            </tr>
            <tr>
                <td>
                    Повторете паролата:  
                </td>
                <td>
                    <input type="password" name="repeatpassword"> 
                </td>
            </tr>
            <tr>
                <td>
                    Височина в см:  
                </td>
                <td>
                    <input type="text" name="height" maxlength="3"> 
                </td>
            </tr>
            <tr>
                <td>
                    Цвят на косата:  
                </td>
                <td>
                    <select name="hair">
                        <option value="черен">черен</option>
                        <option value="кафяв">кафяв</option>
                        <option value="рус">рус</option>
                        <option value="червен">червен</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Гръдна обиколка в см:  
                </td>
                <td>
                    <input type="text" name="bust" maxlength="3"> 
                </td>
            </tr>
            <tr>
                <td>
                    Дължина на краката в см:  
                </td>
                <td>
                    <input type="text" name="legs" maxlength="3"> 
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Register">
                </td>
            </tr>
        </table>
    </form>
        <div id="footer">
            <image src="224.jpg">
        </div>
        </div>
</html>
