<?php session_start();

$title ="Профилът на ".$_SESSION['username'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
    </head>
    <body>
        <div id="container">
            <?php
            if($_SESSION['username']){
            echo "<h1>Добре дошъл, ".$_SESSION['username']."!</h1>";
            echo "<br/>";
            ?>
        <h2>Man Finder</h2>
        <form action="malesearch.php" method="GET" class="finder">
            <table>
            <tr>
                <td>
                    Височина в см:  
                </td>
                <td>
                    От:<input type="text" name="heightfrom" size="5" maxlength="3">&nbsp
                    До:<input type="text" name="heightto" size="5" maxlength="3">
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
                    Минимална заплата в евро:  
                </td>
                <td>
                    <input type="text" name="salary"> 
                </td>
            </tr>
            <tr>
                <td>
                    Да има:  
                </td>
                <td>
                    <input type="checkbox" name="owns[]" value="кола" />Кола
                    <input type="checkbox" name="owns[]" value="вила" />Вила
                    <input type="checkbox" name="owns[]" value="яхта" />Яхта
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Search">    
        </form>
        <br/>
        <h2>Woman Finder</h2>
        <form action="femalesearch.php" method="GET" class="finder">
            <table>
            <tr>
                <td>
                    Височина в см:  
                </td>
                <td>
                    От:<input type="text" name="heightfrom" size="5" maxlength="3">&nbsp
                    До:<input type="text" name="heightto" size="5" maxlength="3">
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
                    Минимална гръдна обиколка в см:  
                </td>
                <td>
                    <input type="text" name="bust" maxlength="3"> 
                </td>
            </tr>
            <tr>
                <td>
                    Минимална дължина на краката в см:  
                </td>
                <td>
                    <input type="text" name="legs" maxlength="3"> 
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Search">
        </form>

<?php
echo "<div id=\"logout\"><a href='logout.php'>Logout</a></div></div>";
} else {
    die("Трябва да сте логнат!");
}

?>
    </body>
</html>
