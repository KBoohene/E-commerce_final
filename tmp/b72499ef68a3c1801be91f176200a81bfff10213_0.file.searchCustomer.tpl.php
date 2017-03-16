<?php
/* Smarty version 3.1.30, created on 2017-03-16 11:31:43
  from "C:\xampp\htdocs\E-commerce_final\views\searchCustomer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ca698f601e55_60096735',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'b72499ef68a3c1801be91f176200a81bfff10213' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\searchCustomer.tpl',
      1 => 1489660295,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58ca698f601e55_60096735 (Smarty_Internal_Template $_smarty_tpl) {
?>
<head>
<title>Search Customer</title>
</head>

<body>
 <div>
  <form action="employeeDisplay.php?eAction=6" method="POST">
   <input class="search-bar" id="search" type="text" name="searchCustomer">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>

 <?php if (isset($_REQUEST['searchCustomer'])) {?>
    <?php if (($_REQUEST['searchCustomer']) != '') {?>
      <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchCustomer']);
?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->searchCustomers($_smarty_tpl->tpl_vars['txt']->value));
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
    <?php } elseif (($_REQUEST['searchName']) == '') {?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->getCustomers());
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>
 <?php } else { ?>
    <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->getCustomers());
?>
    <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
 <?php }?>

 <div>
  <table>
    <thead>
      <tr>
       <td>Customer ID</td>
       <td>Customer Name</td>
       <td>Street</td>
       <td>Zip</td>
       <td>Phone Number</td>
       <td>Username</td>
       <td>Password</td>
       <td>Status</td>
       <td>Created At</td>
      </tr>
  </thead>

 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
  <tr>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['cno']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['cno'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['cname']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['cname'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['street']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['street'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['zip']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['zip'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['phone']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['phone'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['Username']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['Username'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['Password']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['Password'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['status']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['status'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['created_at']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['created_at'];?>
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
