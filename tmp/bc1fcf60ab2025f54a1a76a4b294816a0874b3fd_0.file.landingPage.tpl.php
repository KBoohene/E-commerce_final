<?php
/* Smarty version 3.1.30, created on 2017-03-13 23:13:03
  from "/Applications/AMPPS/www/github/E-commerce_final/views/landingPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c7277fd93f27_46125735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc1fcf60ab2025f54a1a76a4b294816a0874b3fd' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/landingPage.tpl',
      1 => 1489443398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c7277fd93f27_46125735 (Smarty_Internal_Template $_smarty_tpl) {
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
