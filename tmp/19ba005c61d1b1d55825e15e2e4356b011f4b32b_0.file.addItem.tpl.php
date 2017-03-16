<?php
/* Smarty version 3.1.30, created on 2017-03-16 16:57:59
  from "C:\xampp\htdocs\E-commerce_final\views\addItem.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cab6076b0152_81196021',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    '19ba005c61d1b1d55825e15e2e4356b011f4b32b' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\addItem.tpl',
      1 => 1489679871,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58cab6076b0152_81196021 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit item</title>
</head>
<body>
<?php if (isset($_POST['submit'])) {?>
 <?php $_smarty_tpl->_assignInScope('iname', $_POST['iname']);
?>
 <?php $_smarty_tpl->_assignInScope('qoh', $_POST['qoh']);
?>
 <?php $_smarty_tpl->_assignInScope('price', $_POST['price']);
?>
 <?php $_smarty_tpl->_assignInScope('olvl', $_POST['olevel']);
?>
 <?php $_smarty_tpl->_assignInScope('catno', $_POST['catno']);
?>

 <?php if (($_smarty_tpl->tpl_vars['catno']->value) == "-1") {?>
  <?php echo "Please select a zip";?>

 <?php } elseif (($_smarty_tpl->tpl_vars['olvl']->value) == '' || ($_smarty_tpl->tpl_vars['iname']->value) == '' || ($_smarty_tpl->tpl_vars['qoh']->value) == '' || ($_smarty_tpl->tpl_vars['price']->value) == '') {?>
  <?php echo "Please enter all information";?>

 <?php } else { ?>
  <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->addItem($_smarty_tpl->tpl_vars['iname']->value,$_smarty_tpl->tpl_vars['qoh']->value,$_smarty_tpl->tpl_vars['price']->value,$_smarty_tpl->tpl_vars['olvl']->value,$_smarty_tpl->tpl_vars['catno']->value));
?>

 <?php }?>
 <?php }?>

  <form action="employeeDisplay.php?eAction=12" method="POST">
   <div>Item Name <input type="text" name="iname"><br></div>
   <?php $_smarty_tpl->_assignInScope('categoryId', $_smarty_tpl->tpl_vars['item']->value->getCategory());
?>
   <?php $_smarty_tpl->_assignInScope('categoryVar', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['categoryId']->value));
?>

   <div>Category <select name="catno">
	<option value="-1">Select category</option>
	 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryVar']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
        <option value=<?php echo $_smarty_tpl->tpl_vars['category']->value['catno'];?>
><?php echo $_smarty_tpl->tpl_vars['category']->value['catname'];?>
</option>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</select>
   <br></div>
   <div> Quantity On Hand <input type="number" name="qoh" ><br></div>
   <div> Price <input type="text" name="price" ><br></div>
   <div> order level <input type="number" name="olevel"><br></div>
   <input type="submit" name="submit" value="Add">
  </form>



</body>
</html>
<?php }
}
