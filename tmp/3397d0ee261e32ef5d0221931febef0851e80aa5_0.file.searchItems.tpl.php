<?php
/* Smarty version 3.1.30, created on 2017-03-26 21:44:54
  from "/Applications/AMPPS/www/github/E-commerce_final/views/searchItems.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d836561deb94_72062462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3397d0ee261e32ef5d0221931febef0851e80aa5' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/searchItems.tpl',
      1 => 1490564690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d836561deb94_72062462 (Smarty_Internal_Template $_smarty_tpl) {
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
<title>Search Items</title>
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
  <?php }
} else { ?>
  <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->getItems());
?>
  <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
}?>

<h2>Results for <ins><?php echo $_REQUEST['searchName'];?>
</ins></h2>

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
