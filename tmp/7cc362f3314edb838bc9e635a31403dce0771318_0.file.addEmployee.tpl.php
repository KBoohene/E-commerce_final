<?php
/* Smarty version 3.1.30, created on 2017-03-16 21:29:16
  from "/Applications/AMPPS/www/github/E-commerce_final/views/addEmployee.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cb03acb8c089_50400196',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cc362f3314edb838bc9e635a31403dce0771318' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/addEmployee.tpl',
      1 => 1489699751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cb03acb8c089_50400196 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<!--CHANGELOG
    Changed column names to reflect changes made in database - 2/1/2017
	Added agreed upon user interface - 2/2/2017
	Formatted code - 2/2/2017
-->
<!--
  @author David Okyere
  @desc - This page adds items to the current list of items.
-->

 <head>
 <title> Add Employee </title>
 </head>

 <body>
  <form action="employeeDisplay.php?eAction=5" method="POST">
   <div> Employee Name <input type="text" name="ename"/><br></div>
   <div> Zip <select name="zip">
	<option value="-1">Select Zip</option>
	 <?php $_smarty_tpl->_assignInScope('zipResult', $_smarty_tpl->tpl_vars['employee']->value->getZips());
?>
	 <?php $_smarty_tpl->_assignInScope('zipData', $_smarty_tpl->tpl_vars['employee']->value->fetchDB($_smarty_tpl->tpl_vars['zipResult']->value));
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
   <br></div>
   <div> Hire Date <input type="date" name="hdate"/><br></div>
   <div> Password <input type="text" name="pword"/><br></div>
   <div> Account Type <input type="number" name="acctype" min="2" max="3"/><br></div>
   <div> Username <input type="text" name="usrname"/><br></div>
   <input type="submit" value="Add">
  </form>

 <?php if (isset($_POST['ename'])) {?>
 <?php $_smarty_tpl->_assignInScope('ename', $_POST['ename']);
?>
 <?php $_smarty_tpl->_assignInScope('zip', $_POST['zip']);
?>
 <?php $_smarty_tpl->_assignInScope('hdate', $_POST['hdate']);
?>
 <?php $_smarty_tpl->_assignInScope('pword', $_POST['pword']);
?>
 <?php $_smarty_tpl->_assignInScope('acctype', $_POST['acctype']);
?>
 <?php $_smarty_tpl->_assignInScope('usrname', $_POST['usrname']);
?>
 <?php if (($_smarty_tpl->tpl_vars['zip']->value) == "-1") {?>
  <?php echo "Please select a zip";?>

 <?php } elseif (($_smarty_tpl->tpl_vars['ename']->value) == '' || ($_smarty_tpl->tpl_vars['pword']->value) == '' || ($_smarty_tpl->tpl_vars['acctype']->value) == '' || ($_smarty_tpl->tpl_vars['usrname']->value) == '') {?>
  <?php echo "Please enter all information";?>

 <?php } else { ?>
  <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['employee']->value->addEmployee($_smarty_tpl->tpl_vars['ename']->value,$_smarty_tpl->tpl_vars['zip']->value,$_smarty_tpl->tpl_vars['hdate']->value,$_smarty_tpl->tpl_vars['pword']->value,$_smarty_tpl->tpl_vars['acctype']->value,$_smarty_tpl->tpl_vars['usrname']->value));
?>
  <?php echo "<script>window.location = 'employeeDisplay.php?eAction=3'</script>";?>

 <?php }?>
 <?php }?>

</body>
</html>
<?php }
}
