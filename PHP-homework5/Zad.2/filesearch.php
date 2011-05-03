<?php
if (isset($_POST['submit']) && isset($_POST['fileName']) && !empty($_POST['fileName'])) {
    $path = realpath('.');

    $files = new RecursiveIteratorIterator(
                   new RecursiveDirectoryIterator($path), 
                   RecursiveIteratorIterator::SELF_FIRST);

    foreach($files as $name => $file){
        if($file->getFilename() === $_POST['fileName']) {
            die($file->getPathname());
        }
    }
    die("OMG A BEAR! FILE NOT FOUND!");
}

?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>File Search</title>
    </head>
    <body>
        <form action="filesearch.php" method="POST">
            Въведете име на файл:<input type="text" name="fileName" />
            <br />
            <input type="submit" name="submit" value="Search" />
        </form>
    </body>
</html>