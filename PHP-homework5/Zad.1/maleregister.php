
    
<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['fullname'], $_POST['username'], $_POST['password'],
            $_POST['repeatpassword'], $_POST['height'], $_POST['salary'])
            && !empty($_POST['fullname']) && !empty($_POST['username'])
            && !empty($_POST['password']) && !empty($_POST['repeatpassword'])
            && !empty($_POST['height']) && !empty($_POST['salary'])) {

        $submit = $_POST['submit'];
        $fullname = strip_tags($_POST['fullname']);
        $username = strtolower(strip_tags($_POST['username']));
        $password = strip_tags($_POST['password']);
        $repeatpassword = strip_tags($_POST['repeatpassword']);
        $height = strip_tags($_POST['height']);
        $salary = strip_tags($_POST['salary']);
        $hair = $_POST['hair'];
        
        if (isset($_POST['owns']) && !empty($_POST['owns'])) {
           $have= serialize($_POST['owns']);
        } else {
            $have = "Нищо!";
        }


        if ($password == $repeatpassword) {
            if (is_numeric($height)!=TRUE || is_numeric($salary)!=TRUE) {
                echo "Въвели сте невалидни данни за височина или заплата! Въведете ги с <strong>цифри</strong>!";
            } else if (strlen($username) > 25 || strlen($fullname) > 50) {
                echo "Надвишили сте максималната дължина за \"Име и фамилия\" (50 символа) или  \"Потребителско име\" (25 символа)";
            } else {
                if (strlen($password) > 25 || strlen($password) < 6) {
                    echo "Паролата трябва да е между 6 и 25 букви";
                } else {
                    //register
                    //encrypt password
                    $password = md5($password);
                    $repeatpassword = md5($repeatpassword);


                    $xmlfile = new DOMDocument();
                    //$xmlfile->formatOutput = true;
                    $xmlfile->load('maleUsers.xml');
                    
                    //$us = $xmlfile->createElement("users");
                    //$xmlfile->appendChild($us);
                    $us= $xmlfile->firstChild;
                    $ui = $xmlfile->createElement("userinfo");
                    $us->appendChild($ui);
                    
                    $xmlfn = $xmlfile->createElement("fullname");
                    $xmlfn->appendChild($xmlfile->createTextNode($fullname));
                    $ui->appendChild($xmlfn);
                    
                    $xmlun = $xmlfile->createElement("username");
                    $xmlun->appendChild($xmlfile->createTextNode($username));
                    $ui->appendChild($xmlun);
                    
                    $xmlpw = $xmlfile->createElement("password");
                    $xmlpw->appendChild($xmlfile->createTextNode($password));
                    $ui->appendChild($xmlpw);
                    
                    $xmlht = $xmlfile->createElement("height");
                    $xmlht->appendChild($xmlfile->createTextNode($height));
                    $ui->appendChild($xmlht);
                    
                    $xmlsr = $xmlfile->createElement("salary");
                    $xmlsr->appendChild($xmlfile->createTextNode($salary));
                    $ui->appendChild($xmlsr);
                    
                    $xmlhair = $xmlfile->createElement("hair");
                    $xmlhair->appendChild($xmlfile->createTextNode($hair));
                    $ui->appendChild($xmlhair);
                    
                    $xmlhave = $xmlfile->createElement("have");
                    $xmlhave->appendChild($xmlfile->createTextNode($have));
                    $ui->appendChild($xmlhave);
                    
                    $xmlfile->save("maleUsers.xml");
                    

                    die("Вие се регистрирахте успешно! <a href='index.php'>Излез</a>");
                }
            }
        } else {
            echo "Въвели сте различни пароли";
        }
    } else {
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
            <h1>Форма за регистрация /МЪЖЕ/</h1>
    <form action="maleregister.php" method="POST">
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
                    Заплата в евро:  
                </td>
                <td>
                    <input type="text" name="salary"> 
                </td>
            </tr>
            <tr>
                <td>
                    Вие имате:  
                </td>
                <td>
                    <input type="checkbox" name="owns[]" value="кола" />Кола
                    <input type="checkbox" name="owns[]" value="вила" />Вила
                    <input type="checkbox" name="owns[]" value="яхта" />Яхта
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
