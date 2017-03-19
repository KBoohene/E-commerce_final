<?php
/* Smarty version 3.1.30, created on 2017-03-19 01:32:09
  from "C:\xampp\htdocs\Final\E-commerce_final\views\searchItemsV2.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cdd189f04393_25202051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '740ee21f0e317df4a29cdadbbea6110e765c2941' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Final\\E-commerce_final\\views\\searchItemsV2.tpl',
      1 => 1489701173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cdd189f04393_25202051 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>

<!--CHANGELOG
    Changed column names to reflect changes made in database - 12/3/2017
	Formatted code - 12/3/2017
-->
<!--
  @author David Okyere
  @desc - This page displays items based on user search input.
-->

<head>
  <title>Search Item to Edit</title>
</head>

<body>
 <div>
  <form action="index.php?cAction=1" method="POST">
   <input class="search-bar" id="search" type="text" name="searchName">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>

 <?php if (isset($_REQUEST['searchName'])) {?>
    <?php if (($_REQUEST['searchName']) != '') {?>
      <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchName']);
?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->searchItems($_smarty_tpl->tpl_vars['txt']->value));
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
    <?php } elseif (($_REQUEST['searchName']) == '') {?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->getItems());
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>
 <?php } else { ?>
    <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->getItems());
?>
    <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>

 <div>
  <table>
    <thead>
      <tr>
       <td>Product ID</td>
       <td>Product Name</td>
       <td>Quantity on Hand</td>
       <td>Price</td>
       <td>Reorder Level</td>
      </tr>
  </thead>

 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
  <tr>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['ino']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ino'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['iname']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['iname'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['qoh']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['qoh'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['price']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['price'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['olevel']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['olevel'];?>
</td>
   <?php }?>
      <td><a href="employeeDisplay.php?eAction=11&searchItem=<?php echo $_smarty_tpl->tpl_vars['value']->value['ino'];?>
">Edit Item</a>
   </tr>
   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  </table>
 </div>
</body>
</html>
<?php }
}