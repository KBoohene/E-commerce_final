<?php
/* Smarty version 3.1.30, created on 2017-03-16 13:58:19
  from "C:\xampp\htdocs\E-commerce_final\views\editEmployee.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ca8beb1136c9_74465396',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    '9a90e4bb928bb5b536c99179c34d38519302ad24' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\editEmployee.tpl',
      1 => 1489668952,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58ca8beb1136c9_74465396 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee</title>
</head>
<body>

 <?php if (isset($_REQUEST['searchName'])) {?>
    <?php if (($_REQUEST['searchName']) != '') {?>
      <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchName']);
?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['employee']->value->searchEmployees($_smarty_tpl->tpl_vars['txt']->value));
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['employee']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
    <?php } elseif (($_REQUEST['searchName']) == '') {?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['employee']->value->getEmployees());
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['employee']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>
 <?php } else { ?>
    <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['employee']->value->getEmployees());
?>
    <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['employee']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>

	<form action="employeeDisplay.php?eAction=4" method="POST">
    <input type="text" name="eno" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['eno'];?>
 hidden>
   <div> Employee Name <input type="text" name="ename" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['ename'];?>
><br></div>
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
     <?php if ($_smarty_tpl->tpl_vars['data']->value[0]['zip'] == $_smarty_tpl->tpl_vars['zip']->value['zip']) {?>
	 <option value="<?php echo $_smarty_tpl->tpl_vars['zip']->value['zip'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['zip']->value['city'];?>
</option>

      <?php } else { ?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['zip']->value['zip'];?>
"><?php echo $_smarty_tpl->tpl_vars['zip']->value['city'];?>
</option>
      <?php }?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</select>
   <br></div>
   <div> Hire Date <input type="date" name="hdate" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['hdate'];?>
><br></div>
   <div> Password <input type="text" name="pword" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['Password'];?>
><br></div>
   <div> Account Type <input type="number" name="acctype" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['account_type'];?>
><br></div>
   <div> Username <input type="text" name="usrname" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['Username'];?>
><br></div>
   <input type="submit" value="Edit">
  </form>

 <?php if (isset($_POST['eno'])) {?>
 <?php $_smarty_tpl->_assignInScope('eid', $_POST['eno']);
?>
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
  <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['employee']->value->editEmployee($_smarty_tpl->tpl_vars['eid']->value,$_smarty_tpl->tpl_vars['ename']->value,$_smarty_tpl->tpl_vars['zip']->value,$_smarty_tpl->tpl_vars['hdate']->value,$_smarty_tpl->tpl_vars['pword']->value,$_smarty_tpl->tpl_vars['acctype']->value,$_smarty_tpl->tpl_vars['usrname']->value));
?>

 <?php }?>
 <?php }?>

</body>
</html><?php }
}
