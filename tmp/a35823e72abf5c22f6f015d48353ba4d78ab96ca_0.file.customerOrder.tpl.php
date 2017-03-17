<?php
/* Smarty version 3.1.30, created on 2017-03-17 11:10:41
  from "C:\xampp\htdocs\E-commerce_final\views\customerOrder.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cbb621431136_68752901',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'a35823e72abf5c22f6f015d48353ba4d78ab96ca' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\customerOrder.tpl',
      1 => 1489716341,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58cbb621431136_68752901 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
  <head>
    <title>
      Customer Orders
    </title>
  </head>
  <body>
    <?php if (isset($_SESSION['userId'])) {?>
      <?php $_smarty_tpl->_assignInScope('customerId', $_SESSION['userId']);
?>
    <?php } else { ?>
      <?php $_smarty_tpl->_assignInScope('customerId', 10);
?>
      <?php echo "Session not started";?>

    <?php }?>

    <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->getCustomerOrders($_smarty_tpl->tpl_vars['customerId']->value));
?>
    <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
    <table>
      <thead>
        <tr>
          <td>Order Number</td>
          <td>Customer Number</td>
          <td>Recieved </td>
          <td>Shipped date</td>
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
              </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        </table>
  </body>
</html>
<?php }
}
