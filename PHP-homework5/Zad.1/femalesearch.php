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
                    if (isset($_GET['heightfrom'], $_GET['heightto'], $_GET['bust'], $_GET['legs']) &&
                            !empty($_GET['heightfrom']) && !empty($_GET['heightto']) &&
                            !empty($_GET['bust']) && !empty($_GET['legs'])) {

                        $submit = $_GET['submit'];
                        $heightfrom = $_GET['heightfrom'];
                        $heightto = $_GET['heightto'];
                        $hair = $_GET['hair'];
                        $bust = $_GET['bust'];
                        $legs = $_GET['legs'];


                        if (is_numeric($heightfrom) != TRUE || is_numeric($heightto) != TRUE
                                || is_numeric($bust) != TRUE || is_numeric($legs) != TRUE) {
                            echo "Въвели сте невалидни данни!<br/>
                              Моля въведете ги с <strong>цифри</strong>";
                        } else {
                            //vsichko e vuvedeno korektno! obhojdame xml faila s jenite

                            $xmlfile = new DOMDocument();
                            $xmlfile->load('femaleUsers.xml');
                            echo '<h2>Вашето търсене върна следните резултати</h2>';
                            echo "<table align='center' cellspacing='0' border='1' class='results'>
                                <tr>
                                    <th class=\"tdresults\">Username</th><th class=\"tdresults\">Име</th>
                                    <th class=\"tdresults\">Височина</th><th class=\"tdresults\">Цвят на косата</th>
                                    <th class=\"tdresults\">Гръдна обиколка</th><th class=\"tdresults\">Дължина на краката</th>
                                <tr>";

                            $usersList = $xmlfile->getElementsByTagName("userinfo");
                            foreach ($usersList as $user) {

                                $fullnames = $user->getElementsByTagName("fullname");
                                $fullname1 = $fullnames->item(0)->nodeValue;

                                $usernames = $user->getElementsByTagName("username");
                                $username1 = $usernames->item(0)->nodeValue;

                                $heights = $user->getElementsByTagName("height");
                                $height1 = $heights->item(0)->nodeValue;

                                $hairs = $user->getElementsByTagName("hair");
                                $hair1 = $hairs->item(0)->nodeValue;

                                $busts = $user->getElementsByTagName("bust");
                                $bust1 = $busts->item(0)->nodeValue;

                                $legsss = $user->getElementsByTagName("legs");
                                $legs1 = $legsss->item(0)->nodeValue;

                                if ($height1 >= $heightfrom && $height1 <= $heightto &&
                                        $hair1 == $hair && $bust1 >= $bust && $legs1 >= $legs) {
                                    
                                 echo '<tr>'.'<td class="tdresults">'.$username1.'</td>'.
                                             '<td class="tdresults">'.$fullname1.'</td>'.
                                             '<td class="tdresults">'.$height1.'</td>'.
                                             '<td class="tdresults">'.$hair1.'</td>'.
                                             '<td class="tdresults">'.$bust1.'</td>'.
                                             '<td class="tdresults">'.$legs1.'</td>'.
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
