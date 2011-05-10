<?php

require_once ("iView.php");
require_once ("libs/Smarty.class.php");

$smarty = new Smarty();
$smarty->setTemplateDir("templates");

class View implements IView {

    public function display($pageName) {
        global $smarty;
        $smarty->display($pageName);
    }

    public function assignTemplateVariable($varName, $varValue) {
        global $smarty;
        $smarty->assign($varName, $varValue);
    }

    public function setPageTitle($title) {
        global $smarty;
        $smarty->assign("title", $title);
    }
    
    public function setJavascriptFolder($jsFolder) {
        global $smarty;
        $smarty->assign('javascriptFolder', $jsFolder);
    }
    
    public function addJavascriptFiles($js) {
        global $smarty;
        $smarty->assign('javascriptFiles', $js);
    }
    
    public function setCSSFolder($cssFolder) {
        global $smarty;
        $smarty->assign('cssFolder', $cssFolder);
    }
    
    public function addCSSFiles($css) {
        global $smarty;
        $smarty->assign('cssFiles', $css);
    }

}

?>
