<?php
/* Smarty version 3.1.30, created on 2017-03-19 02:27:43
  from "C:\xampp\htdocs\Final\E-commerce_final\views\searchOrder.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cdde8f127282_81100959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46ba9b338991560059c04f496717efabcfecdb0c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Final\\E-commerce_final\\views\\searchOrder.tpl',
      1 => 1489886811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cdde8f127282_81100959 (Smarty_Internal_Template $_smarty_tpl) {
?>
<head>
<title>Search Order</title>
</head>

<body>
 <div>
  <form action="employeeDisplay.php?eAction=14" method="POST">
   <input class="search-bar" id="search" type="text" name="searchOrder">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>

 <?php if (isset($_REQUEST['searchOrder'])) {?>
    <?php if (($_REQUEST['searchOrder']) != '') {?>
      <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchOrder']);
?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->searchOrders($_smarty_tpl->tpl_vars['txt']->value));
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
    <?php } elseif (($_REQUEST['searchName']) == '') {?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->getOrders());
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>
 <?php } else { ?>
    <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->getOrders());
?>
    <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>

 <div>
  <table>
    <thead>
      <tr>
       <td>Order ID</td>
       <td>Customer ID</td>
       <td>Checked Out</td>
       <td>Received</td>
       <td>Shipped</td>
       <td>Created At</td>
      </tr>
  </thead>

 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
  <tr>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['ono']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ono'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['cno']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['cno'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['checked_out']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['checked_out'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['received']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['received'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['shipped']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['shipped'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['created_at']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['created_at'];?>
</td>
   <?php }?>
   <td><a href="employeeDisplay.php?eAction=15&searchName=<?php echo $_smarty_tpl->tpl_vars['value']->value['ono'];?>
">Edit Order</a>
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
