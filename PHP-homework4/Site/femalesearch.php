<?php
session_start();
$title ="Профилът на ".$_SESSION['username'];
$rows=0;
if(isset ($_GET['submit'])){
    if(isset ($_GET['heightfrom'], $_GET['heightto'], $_GET['bust'], $_GET['legs']) &&
       !empty($_GET['heightfrom']) && !empty($_GET['heightto']) &&
       !empty($_GET['bust']) && !empty($_GET['legs'])){
        
        $submit = $_GET['submit'];
        $heightfrom = $_GET['heightfrom'];
        $heightto = $_GET['heightto'];
        $hair = $_GET['hair'];
        $bust = $_GET['bust'];
        $legs = $_GET['legs'];
        
        //open database;
        $connect = mysql_connect("localhost", "root", "password")
                or die(mysql_error());
        mysql_select_db("homework4") or die(mysql_error());
        
        if (is_numeric($heightfrom)!=TRUE || is_numeric($heightto)!=TRUE
                || is_numeric($bust)!=TRUE || is_numeric($legs)!=TRUE){
            echo "Въвели сте невалидни данни!<br/>
                  Моля въведете ги с <strong>цифри</strong>";
        } else {
         
            mysql_query('set names utf8', $connect);
            
            $querysearch=mysql_query("
                    SELECT username, fullname, height, haircolor, bust, legs
                    FROM Women
                    WHERE haircolor='$hair' AND bust>='$bust'
                    AND legs>='$legs' AND height
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
                    <th class=\"tdresults\">Гръдна обиколка</th><th class=\"tdresults\">Дължина на краката</th>
                <tr>";
                while ($row = mysql_fetch_assoc($querysearch)){
                    $username1 = $row['username'];
                    $fullname1 = $row['fullname'];
                    $height1 = $row['height'];
                    $hair1 = $row['haircolor'];
                    $bust1 = $row['bust'];
                    $legs1 = $row['legs'];
                    
               echo '<tr>'.'<td class="tdresults">'.$username1.'</td>'.'<td class="tdresults">'.$fullname1.'</td>'.'<td class="tdresults">'.$height1.'</td>'.
                    '<td class="tdresults">'.$hair1.'</td>'.'<td class="tdresults">'.$bust1.'</td>'.'<td class="tdresults">'.$legs1.'</td>'.'</tr>';
                    
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
