<?php /* Smarty version Smarty-3.0.7, created on 2011-05-09 03:06:55
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134844dc73e2f354e34-82199427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1304903190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134844dc73e2f354e34-82199427',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
        
        <?php  $_smarty_tpl->tpl_vars['cssFile'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cssFiles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cssFile']->key => $_smarty_tpl->tpl_vars['cssFile']->value){
?>
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('cssFolder')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['cssFile']->value;?>
" type="text/css" media="screen">
        <?php }} ?>
              
        <?php  $_smarty_tpl->tpl_vars['jsFile'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('javascriptFiles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['jsFile']->key => $_smarty_tpl->tpl_vars['jsFile']->value){
?>
            <script src="<?php echo $_smarty_tpl->getVariable('javascriptFolder')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['jsFile']->value;?>
" type="text/javascript" language="javascript" charset="utf-8"></script>
        <?php }} ?>
    </head>
    <body>
        <?php echo $_smarty_tpl->getVariable('test')->value;?>

    </body>
</html>