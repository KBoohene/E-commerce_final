<?php
/* Smarty version 3.1.30, created on 2017-03-16 11:59:12
  from "C:\xampp\htdocs\Final\E-commerce_final\views\searchEmployee.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ca700044d093_94581034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd3c039e80225ee2edcf0741f6f430be77d95904' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Final\\E-commerce_final\\views\\searchEmployee.tpl',
      1 => 1489661939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ca700044d093_94581034 (Smarty_Internal_Template $_smarty_tpl) {
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
<title> Search Employee </title>
</head>
 
<body>
 <div>
  <form action="employeeDisplay.php?eAction=3" method="POST">
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
	 	  
 <div>
  <table>
    <thead>
      <tr>
       <td>Employee ID</td>
       <td>Employee Name</td>
       <td>Zip</td>
       <td>Hire Date</td>
	   <td>Password</td>
	   <td>Time Created</td>
	   <td>Account Type</td>
       <td>Username</td>
      </tr>
  </thead>
	
 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
  <tr>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['eno']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['eno'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['ename']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ename'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['zip']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['zip'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['hdate']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['hdate'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['Password']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['Password'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['created_at']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['created_at'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['account_type']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['account_type'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['Username']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['Username'];?>
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
