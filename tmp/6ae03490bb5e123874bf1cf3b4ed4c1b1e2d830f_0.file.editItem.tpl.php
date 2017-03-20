<?php
/* Smarty version 3.1.30, created on 2017-03-16 21:50:24
  from "/Applications/AMPPS/www/github/E-commerce_final/views/editItem.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cb08a0404353_25995932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ae03490bb5e123874bf1cf3b4ed4c1b1e2d830f' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/editItem.tpl',
      1 => 1489701014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cb08a0404353_25995932 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit item</title>
</head>
<body>
<?php if (isset($_POST['ino'])) {?>
 <?php $_smarty_tpl->_assignInScope('itemId', $_POST['ino']);
?>
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

 <?php } elseif (($_smarty_tpl->tpl_vars['itemId']->value) == '' || ($_smarty_tpl->tpl_vars['iname']->value) == '' || ($_smarty_tpl->tpl_vars['qoh']->value) == '' || ($_smarty_tpl->tpl_vars['price']->value) == '') {?>
  <?php echo "Please enter all information";?>

 <?php } else { ?>
  <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->editItem($_smarty_tpl->tpl_vars['itemId']->value,$_smarty_tpl->tpl_vars['iname']->value,$_smarty_tpl->tpl_vars['qoh']->value,$_smarty_tpl->tpl_vars['price']->value,$_smarty_tpl->tpl_vars['olvl']->value,$_smarty_tpl->tpl_vars['catno']->value));
?>
  <?php echo "<script>window.location ='employeeDisplay.php?eAction=13'</script>";?>

 <?php }?>
 <?php }?>

 <?php if (isset($_REQUEST['searchItem'])) {?>
    <?php if (($_REQUEST['searchItem']) != '') {?>
      <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchItem']);
?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->getItemDetails($_smarty_tpl->tpl_vars['txt']->value));
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>

 <?php }?>
 <!-- <?php echo print_r($_smarty_tpl->tpl_vars['data']->value);?>
 -->

	<form action="employeeDisplay.php?eAction=11" method="POST">
    <input type="text" name="ino" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['ino'];?>
" hidden>
   <div>Item Name <input type="text" name="iname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['iname'];?>
"><br></div>
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

     <?php if ($_smarty_tpl->tpl_vars['data']->value[0]['catno'] == $_smarty_tpl->tpl_vars['category']->value['catno']) {?>
	 <option value=<?php echo $_smarty_tpl->tpl_vars['category']->value['catno'];?>
 selected><?php echo $_smarty_tpl->tpl_vars['category']->value['catname'];?>
</option>
     <?php } else { ?>
        <option value=<?php echo $_smarty_tpl->tpl_vars['category']->value['catno'];?>
><?php echo $_smarty_tpl->tpl_vars['category']->value['catname'];?>
</option>
      <?php }?>

	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</select>
   <br></div>
   <div> Quantity On Hand <input type="text" name="qoh" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['qoh'];?>
"><br></div>
   <div> Price <input type="text" name="price" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['price'];?>
"><br></div>
   <div> order level <input type="number" name="olevel" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['olevel'];?>
"><br></div>
   <input type="submit" value="Edit">
  </form>



</body>
</html>
<?php }
}
