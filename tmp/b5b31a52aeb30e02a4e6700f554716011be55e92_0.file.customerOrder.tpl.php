<?php
/* Smarty version 3.1.30, created on 2017-03-14 00:02:00
  from "/Applications/AMPPS/www/github/E-commerce_final/views/customerOrder.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c732f806a962_00086628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5b31a52aeb30e02a4e6700f554716011be55e92' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/customerOrder.tpl',
      1 => 1489443398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c732f806a962_00086628 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
  <head>
    <title>
      Customer Orders
    </title>
  </head>
  <body>
    
    <?php $_smarty_tpl->_assignInScope('customerId', 10);
?>
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