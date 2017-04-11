<?php
/* Smarty version 3.1.30, created on 2017-04-11 16:18:04
  from "C:\xampp\htdocs\E-commerce_final\views\customerLogout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ece59c06a8f4_69367453',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'a59117cd6c973dac4d60f204161c883c32346c7f' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\customerLogout.tpl',
      1 => 1491559443,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58ece59c06a8f4_69367453 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['userInfo']->value->endSession();?>


<?php echo '<script type="text/javascript">window.location="index.php?cAction=4";</script>';?>

<?php }
}
