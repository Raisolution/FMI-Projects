<?php

session_start();

$username = strtolower($_POST['username']);
$password = $_POST['password'];

if ($username && $password) {

    $src = new DOMDocument();
    $src->load('maleUsers.xml');
    $maleUsernamesList = $src->getElementsByTagName('username');
    for ($i = 0; $i < $maleUsernamesList->length; $i++) {
        $current = $maleUsernamesList->item($i)->nodeValue;
        if ($username == $current) {
            $src2 = new DOMDocument();
            $src2->load('maleUsers.xml');
            $malePasswordsList = $src2->getElementsByTagName('password');
            $dbpassword = $malePasswordsList->item($i)->nodeValue;
            if (md5($password) == $dbpassword) {
                echo "Добре дошли! <br/>Натиснете <a href='profile.php'>ТУК</a>, за да влезете в профила си ";
                $_SESSION['username'] = $username;
            } else {
                echo "Грешна парола!";
            }
        }
    }

    $src3 = new DOMDocument();
    $src3->load('femaleUsers.xml');
    $femaleUsernamesList = $src3->getElementsByTagName('username');
    for ($i = 0; $i < $femaleUsernamesList->length; $i++) {
        $currentf = $femaleUsernamesList->item($i)->nodeValue;
        if($username == $currentf){
            $src4 = new DOMDocument();
            $src4->load('femaleUsers.xml');
            $femalePasswordsList = $src4->getElementsByTagName('password');
            $dbpassword = $femalePasswordsList->item($i)->nodeValue;
            if(md5($password)==$dbpassword){
                echo "Добре дошли! <br/>Натиснете <a href='profile.php'>ТУК</a>, за да влезете в профила си ";
                $_SESSION['username'] = $username;
            } else {
                echo "Грешна парола!";
            }
        }
    }
} else {
    die("Моля въведете валидни Потребителско име и Парола!");
}
?>
