<?php
session_start();
$title ="Профилът на ".$_SESSION['username'];
$rows=0;
if(isset ($_GET['submit'])){
    if(isset ($_GET['heightfrom'], $_GET['heightto'], $_GET['salary']) &&
       !empty($_GET['heightfrom']) && !empty($_GET['heightto']) &&
       !empty($_GET['salary'])){
        
        $submit = $_GET['submit'];
        $heightfrom = $_GET['heightfrom'];
        $heightto = $_GET['heightto'];
        $salary = $_GET['salary'];
        $hair = $_GET['hair'];
        
        if (isset($_GET['owns']) && !empty($_GET['owns'])) {
           $tohave= serialize($_GET['owns']);
        } else {
            $tohave = "NULL";
        }
        
        //open database;
        $connect = mysql_connect("localhost", "root", "password")
                or die(mysql_error());
        mysql_select_db("homework4") or die(mysql_error());
        
        if (is_numeric($heightfrom)!=TRUE || is_numeric($heightto)!=TRUE || is_numeric($salary)!=TRUE){
            echo "Въвели сте невалидни данни!<br/>
                  Моля въведете ги с <strong>цифри</strong>";
        } else {
         
            mysql_query('set names utf8', $connect);
            
            $querysearch=mysql_query("
                    SELECT username, fullname, height, haircolor, salary, owns
                    FROM Men
                    WHERE haircolor='$hair' AND salary>='$salary'
                    AND owns='$tohave' AND height
                    BETWEEN '$heightfrom' AND '$heightto'
            ");
            
            if (isset($querysearch) && !empty ($querysearch)){
                $rows = mysql_num_rows($querysearch);
            } else {
                $rows=0;
            }
            
        }
    } else {
        echo "Моля попълнете <strong>всички</strong> полета!";
    }
}
?>

<html>
     <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
    </head>
    <body>
        <div id="container">
            <div class="search">
            <?php
            
            if($rows==0){
                echo '<h2>Вашето търсене не върна резултат</h2>';
            } else if($rows==1){
                echo'<h2>Вашето търсене върна 1 резултат</h2>';
            }else{
            echo'<h2>Вашето търсене върна'." $rows ".'резултата</h2>';
            }
            if ($rows>0){
                echo
            "<table align='center' cellspacing='0' border='1' class='results'>
                <tr>
                    <th class=\"tdresults\">Username</th><th class=\"tdresults\">Име</th>
                    <th class=\"tdresults\">Височина</th><th class=\"tdresults\">Цвят на косата</th>
                    <th class=\"tdresults\">Заплата</th><th class=\"tdresults\">Притежава</th>
                <tr>";
                while ($row = mysql_fetch_assoc($querysearch)){
                    $username1 = $row['username'];
                    $fullname1 = $row['fullname'];
                    $height1 = $row['height'];
                    $hair1 = $row['haircolor'];
                    $salary1 = $row['salary'];
                    $owns2="Нищо!";
                    $owns1= $row['owns'];
                    if ($owns1!="NULL"){
                        $owns2="";
                        $owns1 = unserialize($owns1);
                        foreach($owns1 as $v){
                            $owns2.= " $v";
                            }
                    }
                    
                    
               echo '<tr>'.'<td class="tdresults">'.$username1.'</td>'.'<td class="tdresults">'.$fullname1.'</td>'.
                           '<td class="tdresults">'.$height1.'</td>'.
                           '<td class="tdresults">'.$hair1.'</td>'.'<td class="tdresults">'.$salary1.'</td>'.
                           '<td class="tdresults">'.$owns2.'</td>'.'</tr>';
                    
                }
             }
                ?>
            </table>
            </div>
            <div class="back">
                <a href="profile.php">Назад</a>
            </div>
        </div>
    </body>    
</html>
