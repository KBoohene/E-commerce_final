<?php
/* Smarty version 3.1.30, created on 2017-03-19 03:05:13
  from "C:\xampp\htdocs\Final\E-commerce_final\views\editCustomer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cde75937bb87_03878904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd27eee676b884992af32d4cafb5b79aa3c0ef741' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Final\\E-commerce_final\\views\\editCustomer.tpl',
      1 => 1489692210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cde75937bb87_03878904 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Customer</title>
</head>
<body>

 <?php if (isset($_REQUEST['searchName'])) {?>
    <?php if (($_REQUEST['searchName']) != '') {?>
      <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchName']);
?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->getCustomerData($_smarty_tpl->tpl_vars['txt']->value));
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>

 <?php }?>

 <?php if (isset($_POST['cno'])) {?>
 <?php $_smarty_tpl->_assignInScope('cid', $_POST['cno']);
?>
 <?php $_smarty_tpl->_assignInScope('cname', $_POST['cname']);
?>
 <?php $_smarty_tpl->_assignInScope('street', $_POST['street']);
?>
 <?php $_smarty_tpl->_assignInScope('zip', $_POST['zip']);
?>
 <?php $_smarty_tpl->_assignInScope('phone', $_POST['phone']);
?>
 <?php $_smarty_tpl->_assignInScope('Username', $_POST['Username']);
?>
 <?php $_smarty_tpl->_assignInScope('Password', $_POST['Password']);
?>
 <?php $_smarty_tpl->_assignInScope('status', $_POST['status']);
?>
 <?php if (($_smarty_tpl->tpl_vars['zip']->value) == "-1") {?>
  <?php echo "Please select a zip";?>

 <?php } elseif (($_smarty_tpl->tpl_vars['cname']->value) == '' || ($_smarty_tpl->tpl_vars['Password']->value) == '' || ($_smarty_tpl->tpl_vars['status']->value) == '' || ($_smarty_tpl->tpl_vars['Username']->value) == '') {?>
  <?php echo "Please enter all information";?>

 <?php } else { ?>
  <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->editCustomer($_smarty_tpl->tpl_vars['cid']->value,$_smarty_tpl->tpl_vars['cname']->value,$_smarty_tpl->tpl_vars['street']->value,$_smarty_tpl->tpl_vars['zip']->value,$_smarty_tpl->tpl_vars['phone']->value,$_smarty_tpl->tpl_vars['Username']->value,$_smarty_tpl->tpl_vars['Password']->value,$_smarty_tpl->tpl_vars['status']->value));
?>
  <?php echo "<script>window.location = 'employeeDisplay.php?eAction=6'</script>";?>

 <?php }?>
 <?php }?>

	<form action="employeeDisplay.php?eAction=8" method="POST">
    <input type="text" name="cno" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['cno'];?>
 hidden>
   <div> Customer Name <input type="text" name="cname" value='<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['cname'];?>
'><br></div>
    <div> Street <input type="text" name="street" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['street'];?>
><br></div>
   <div> Zip <select name="zip">
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
   <div> Phone <input type="text" name="phone" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['phone'];?>
><br></div>
   <div> Username <input type="text" name="Username" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['Username'];?>
><br></div>
   <div> Password <input type="text" name="Password" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['Password'];?>
><br></div>
   <div> Status <input type="text" name="status" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['status'];?>
><br></div>
   <input type="submit" value="Edit">
  </form>



</body>
</html>
<?php }
}
