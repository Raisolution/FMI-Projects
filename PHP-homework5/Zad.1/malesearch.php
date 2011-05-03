<?php
session_start();
$title = "Профилът на " . $_SESSION['username'];
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
                if (isset($_GET['submit'])) {
                    if (isset($_GET['heightfrom'], $_GET['heightto'], $_GET['salary']) &&
                            !empty($_GET['heightfrom']) && !empty($_GET['heightto']) &&
                            !empty($_GET['salary'])) {

                        $submit = $_GET['submit'];
                        $heightfrom = $_GET['heightfrom'];
                        $heightto = $_GET['heightto'];
                        $salary = $_GET['salary'];
                        $hair = $_GET['hair'];

                        if (isset($_GET['owns']) && !empty($_GET['owns'])) {
                            $tohave = serialize($_GET['owns']);
                        } else {
                            $tohave = "Нищо!";
                        }

                        if (is_numeric($heightfrom) != TRUE || is_numeric($heightto) != TRUE || is_numeric($salary) != TRUE) {
                            echo "Въвели сте невалидни данни!<br/>
                              Моля въведете ги с <strong>цифри</strong>";
                        } else {
                            //vsichko e vuvedeno korektno! obhojdame xml faila s mujete

                            $xmlfile = new DOMDocument();
                            $xmlfile->load('maleUsers.xml');
                            echo '<h2>Вашето търсене върна следните резултати</h2>';
                            echo "<table align='center' cellspacing='0' border='1' class='results'>
                                <tr>
                                    <th class=\"tdresults\">Username</th><th class=\"tdresults\">Име</th>
                                    <th class=\"tdresults\">Височина</th><th class=\"tdresults\">Цвят на косата</th>
                                    <th class=\"tdresults\">Заплата</th><th class=\"tdresults\">Притежава</th>
                                <tr>";

                            $usersList = $xmlfile->getElementsByTagName("userinfo");
                            foreach ($usersList as $user) {

                                $fullnames = $user->getElementsByTagName("fullname");
                                $fullname1 = $fullnames->item(0)->nodeValue;

                                $usernames = $user->getElementsByTagName("username");
                                $username1 = $usernames->item(0)->nodeValue;

                                $heights = $user->getElementsByTagName("height");
                                $height1 = $heights->item(0)->nodeValue;

                                $salarys = $user->getElementsByTagName("salary");
                                $salary1 = $salarys->item(0)->nodeValue;

                                $hairs = $user->getElementsByTagName("hair");
                                $hair1 = $hairs->item(0)->nodeValue;

                                $haves = $user->getElementsByTagName("have");
                                $have1 = $haves->item(0)->nodeValue;

                                if ($height1 >= $heightfrom && $height1 <= $heightto &&
                                    $salary1 >= $salary && $hair1 == $hair && $have1==$tohave) {
                                    
                                    $owns2="Нищо!";
                                    if ($tohave!="Нищо!"){
                                        $owns2="";
                                        $have1 = unserialize($have1);
                                        foreach($have1 as $v){
                                            $owns2.= " $v";
                                            }
                                    }
                                    
                                    echo '<tr>' . '<td class="tdresults">' . $username1 . '</td>' .
                                                  '<td class="tdresults">' . $fullname1 . '</td>' .
                                                  '<td class="tdresults">' . $height1 . '</td>' .
                                                  '<td class="tdresults">' . $hair1 . '</td>' .
                                                  '<td class="tdresults">' . $salary1 . '</td>' .
                                                  '<td class="tdresults">' . $owns2 . '</td>' .
                                        '</tr>';
                                    
                                }
                            }
                        }
                    } else {
                        echo "Моля попълнете <strong>всички</strong> полета!";
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
