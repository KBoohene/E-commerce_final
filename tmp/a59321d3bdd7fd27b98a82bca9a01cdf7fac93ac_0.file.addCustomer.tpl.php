<?php
/* Smarty version 3.1.30, created on 2017-03-16 21:50:46
  from "C:\xampp\htdocs\Final\E-commerce_final\views\addCustomer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cafaa670ae72_79511670',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a59321d3bdd7fd27b98a82bca9a01cdf7fac93ac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Final\\E-commerce_final\\views\\addCustomer.tpl',
      1 => 1489697419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cafaa670ae72_79511670 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add customer</title>
</head>
<body>

	<form action="employeeDisplay.php?eAction=7" method="post">
		<label>Name</label>
		<input type="text" name="name">
			<br>
		<label>Street</label>
		<input type="text" name="street">
			<br>
		<label>Zip</label>
		<select name="zip">
			<option value="-1">Select Zip</option>
			<?php $_smarty_tpl->_assignInScope('zipResult', $_smarty_tpl->tpl_vars['customer']->value->getZips());
?>
			<?php $_smarty_tpl->_assignInScope('zipData', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['zipResult']->value));
?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zipData']->value, 'zip');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['zip']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['zip']->value['zip'];?>
"><?php echo $_smarty_tpl->tpl_vars['zip']->value['city'];?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</select>
			<br>
		<label>Phone Number</label>
		<input type="text" name="phone">
			<br>
		<label>Username</label>
		<input type="text" name="username">
			<br>
		<label>Password</label>
		<input type="password" name="password">
			<br>
			<br> 
		<label>Status</label>
		<input type="text" name="status">
			<br>	
		<input type="text" name="submitted" hidden>
		<input type="submit" value="Submit">
	</form>

	<?php if (isset($_POST['submitted'])) {?>
		<?php $_smarty_tpl->_assignInScope('name', $_POST['name']);
?>
		<?php $_smarty_tpl->_assignInScope('street', $_POST['street']);
?>
		<?php $_smarty_tpl->_assignInScope('zip', $_POST['zip']);
?>
		<?php $_smarty_tpl->_assignInScope('phone', $_POST['phone']);
?>
		<?php $_smarty_tpl->_assignInScope('username', $_POST['username']);
?>
		<?php $_smarty_tpl->_assignInScope('password', $_POST['password']);
?>
        <?php $_smarty_tpl->_assignInScope('status', $_POST['status']);
?>
		<?php if (($_smarty_tpl->tpl_vars['zip']->value) == "-1") {?>
			<?php echo "Please select a zip";?>

		<?php } elseif (($_smarty_tpl->tpl_vars['name']->value) == '' || ($_smarty_tpl->tpl_vars['street']->value) == '' || ($_smarty_tpl->tpl_vars['phone']->value) == '' || ($_smarty_tpl->tpl_vars['username']->value) == '' || ($_smarty_tpl->tpl_vars['password']->value) == '') {?>
      <?php echo "Please enter all information";?>

    <?php } else { ?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->addCustomer($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl->tpl_vars['street']->value,$_smarty_tpl->tpl_vars['zip']->value,$_smarty_tpl->tpl_vars['phone']->value,$_smarty_tpl->tpl_vars['username']->value,$_smarty_tpl->tpl_vars['password']->value,$_smarty_tpl->tpl_vars['status']->value));
?>
		<?php echo "Success";?>

        <?php echo "<script>window.location = 'employeeDisplay.php?eAction=6'</script>";?>

    <?php }?>
  <?php }?>

</body>
</html>
<?php }
}
