<?php
/* Smarty version 3.1.30, created on 2017-03-14 00:00:35
  from "C:\xampp\htdocs\E-commerce_final\views\loginEmployee.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c72493487ff0_91141640',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'daf12c745cb82b78cb63d4db6e927d5e02e56b9d' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\loginEmployee.tpl',
      1 => 1489446024,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58c72493487ff0_91141640 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
	<title>Employee Login</title>
</head>
<body>
	<!-- <?php echo "<?php header('Location: employeeDisplay.php?eAction=1') ?>";?>
 -->
	<form action="employeeDisplay.php?eAction=1" method="post">
		<label>Username</label>
		<input type="text" name="username">
			<br>
		<label>Password</label>
		<input type="password" name="password">
			<br>
			<br>
		<input type="text" name="submitted" hidden>
		<input type="submit" value="Submit">
	</form>

	<?php if (isset($_POST['submitted'])) {?>
		<?php $_smarty_tpl->_assignInScope('username', $_POST['username']);
?>
		<?php $_smarty_tpl->_assignInScope('password', $_POST['password']);
?>

		<?php if (($_smarty_tpl->tpl_vars['username']->value) == '' || ($_smarty_tpl->tpl_vars['password']->value) == '') {?>
      <?php echo "Please enter all information";?>

    <?php } else { ?>
      <?php $_smarty_tpl->_assignInScope('loginResult', $_smarty_tpl->tpl_vars['employee']->value->loginEmployee($_smarty_tpl->tpl_vars['username']->value,$_smarty_tpl->tpl_vars['password']->value));
?>

			<?php $_smarty_tpl->_assignInScope('loginData', $_smarty_tpl->tpl_vars['employee']->value->fetchDB($_smarty_tpl->tpl_vars['loginResult']->value));
?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['loginData']->value, 'login');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['login']->value) {
?>
				<?php if (($_smarty_tpl->tpl_vars['login']->value['Password']) == $_smarty_tpl->tpl_vars['password']->value) {?>
					<?php echo "Success";?>

					<?php echo "<script>window.location = 'employeeDisplay.php?eAction=2'</script>";?>

				<?php }?>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    <?php }?>
  <?php }?>
</body>
</html>
<?php }
}
