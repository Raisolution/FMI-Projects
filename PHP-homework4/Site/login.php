<?php

session_start();

$username=strtolower($_POST['username']);
$password=$_POST['password'];

if($username && $password){
    
    $connect=mysql_connect("localhost","root","password")
        or die ("Грешка при свързването със сървъра!");
    mysql_select_db("homework4")
        or die ("Базата данни не беше намерена!");
    
    $query = mysql_query("
             SELECT username, password
             FROM Men
             WHERE username='$username'
             UNION
             SELECT username, password
             FROM Women
             WHERE username='$username'
             ");
    
    $numrows= mysql_num_rows($query);
    
    if ($numrows != 0){
        
        while($row = mysql_fetch_assoc($query)){
            $dbusername=$row['username'];
            $dbpassword=$row['password'];
        }
        
        if ($username==$dbusername && md5($password)==$dbpassword){
            echo "Добре дошли! <br/>Натиснете <a href='profile.php'>ТУК</a>, за да влезете в профила си ";
            $_SESSION['username']=$dbusername;
            
        } else { echo "Грешна парола!"; }
        
    } else {
        die("Потребителското име не съществува!");
    }
    
    
} else {
    die("Моля въведете валидни Потребителско име и Парола!");
}

?>
