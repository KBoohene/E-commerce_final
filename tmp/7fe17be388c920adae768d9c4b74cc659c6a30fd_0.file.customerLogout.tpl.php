<?php
/* Smarty version 3.1.30, created on 2017-03-19 00:41:03
  from "/Applications/AMPPS/www/github/E-commerce_final/views/customerLogout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cdd39f2540e7_80531016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fe17be388c920adae768d9c4b74cc659c6a30fd' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/customerLogout.tpl',
      1 => 1489883827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cdd39f2540e7_80531016 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['userInfo']->value->endSession();?>


<?php echo '<script type="text/javascript">window.location="index.php?cAction=4";</script>';?>

<?php }
}
