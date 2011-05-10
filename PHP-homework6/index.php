<?php

    require_once ("abstractViewClass.php");
    
    //izpolzva se v sluchai, che ne sa vkliucheni nikakvi css ili js failove
    $emptyarr = array();
    $smarty->assign('cssFiles', $emptyarr);
    $smarty->assign('javascriptFiles', $emptyarr);
    
    //izpolzva se v sluchai, che ne e zadadeno zaglavie
    $smarty->assign('title', "Default page title");
    
    //izpolzva se v sluchai, che ne e zadadena stoinost na place holdera {$test}
    $smarty->assign('test', ' ');

    $v = new View();
    $v->setPageTitle("My index page");

    $v->setCSSFolder("styles");
    $v->setJavascriptFolder("js");

    $v->addCSSFiles(array("jquery.css", "custom.css"));
    $v->addJavascriptFiles(array("jquery.js", "custom.js"));

    $v->assignTemplateVariable("test", "Hello World!");

    $v->display("templates/index.tpl");
?>

