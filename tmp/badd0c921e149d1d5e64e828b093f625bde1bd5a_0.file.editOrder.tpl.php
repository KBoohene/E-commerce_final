<?php
/* Smarty version 3.1.30, created on 2017-03-19 03:34:58
  from "C:\xampp\htdocs\Final\E-commerce_final\views\editOrder.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cdee526099b1_15711817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'badd0c921e149d1d5e64e828b093f625bde1bd5a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Final\\E-commerce_final\\views\\editOrder.tpl',
      1 => 1489890891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cdee526099b1_15711817 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Order</title>
</head>
<body>

  <?php if (isset($_POST['ono'])) {?>
   <?php $_smarty_tpl->_assignInScope('ono', $_POST['ono']);
?>
   <?php $_smarty_tpl->_assignInScope('cno', $_POST['cno']);
?>
   <?php $_smarty_tpl->_assignInScope('checked_out', $_POST['checked_out']);
?>
   <?php $_smarty_tpl->_assignInScope('received', $_POST['received']);
?>
   <?php $_smarty_tpl->_assignInScope('shipped', $_POST['shipped']);
?>
   
   
   <?php echo $_smarty_tpl->tpl_vars['ono']->value;?>

     <?php if (($_smarty_tpl->tpl_vars['cno']->value) == '' || ($_smarty_tpl->tpl_vars['checked_out']->value) == '' || ($_smarty_tpl->tpl_vars['received']->value) == '' || ($_smarty_tpl->tpl_vars['received']->value) == '') {?>
      <?php echo "Please enter all information";?>

     <?php } else { ?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->editOrder($_smarty_tpl->tpl_vars['ono']->value,$_smarty_tpl->tpl_vars['cno']->value,$_smarty_tpl->tpl_vars['checked_out']->value,$_smarty_tpl->tpl_vars['received']->value,$_smarty_tpl->tpl_vars['shipped']->value));
?>
      <?php echo "<script>window.location = 'employeeDisplay.php?eAction=14'</script>";?>

     <?php }?>
   <?php }?>

<?php if (isset($_REQUEST['searchName'])) {?>
    <?php if (($_REQUEST['searchName']) != '') {?>
      <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchName']);
?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->getOrderData($_smarty_tpl->tpl_vars['txt']->value));
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>

 <?php }?>

  <form action="employeeDisplay.php?eAction=15" method="POST">
    <input type="text" name="ono" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['ono'];?>
" hidden>
    <div> Customer ID <input type="number" name="cno" value='<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['cno'];?>
'><br></div>
	<div> Checked Out <select name="checked_out">
	<option value="-1">Select Checked Out Status</option>
	<option value="Yes" selected> Yes </option>
	<option value="No" selected> No </option>
	 </select>
     <br></div>
    <div> Received <input type="date" name="received" value='<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['received'];?>
'><br></div>
    <div> Shipped <input type="date" name="shipped" value='<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['shipped'];?>
'><br></div>
    <input type="submit" value="Edit">
  </form>


</body>
</html>
<?php }
}
