<?php
/* Smarty version 3.1.30, created on 2017-03-12 21:34:05
  from "C:\xampp\htdocs\E-commerce_final\views\landingPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c5b0bd413862_34419586',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    '4ebd2c4f7586f94da526d626f99b50b33a11fffa' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\landingPage.tpl',
      1 => 1489350788,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58c5b0bd413862_34419586 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
  <head>
    <title>Home Page</title>
  </head>
  <body>
    <a href="index.php?cAction=4">Login</a>
    <a href="index.php?cAction=3">Sign Up</a>

    <div>
      <form action="index.php?cAction=1" method="POST">
      <div>
        <input class="search-bar" id="search" type="text" name="searchName">
      </div>
      <div>
        <button type="submit" class="button">Search</button>
      </div>
      </form>
    </div>

  </body>
</html>
<?php }
}
