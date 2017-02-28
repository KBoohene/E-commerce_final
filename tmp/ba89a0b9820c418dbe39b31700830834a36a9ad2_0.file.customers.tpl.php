<?php
/* Smarty version 3.1.30, created on 2017-02-28 14:56:18
  from "C:\xampp\htdocs\E-commerce_final\views\customers.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b58182ab5099_75814977',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'ba89a0b9820c418dbe39b31700830834a36a9ad2' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\customers.tpl',
      1 => 1488290171,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58b58182ab5099_75814977 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_REQUEST['export'])) {?>
  <?php echo $_smarty_tpl->tpl_vars['customer']->value->csvExportCData();?>

<?php }?>
<html>
<!--CHANGELOG
	Created Class - 1/25/2017
	Added filter number to separate employees from customer -1/26/2017
	Added basic user interface - 2/1/2017
	Formatted code with proper indenting and comments -2/1/2017
-->
<!--
  @author Kwabena Boohene
  @desc - This page displays customer data based on search input in a table format.
-->

	<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Customers</title>
      <link rel="stylesheet" href="Css/foundation.min.css">
      <link rel="stylesheet" href="Css/Style.css">

  </head>


  <body>
    <div class="top-bar" id="example-animated-menu" data-animate="hinge-in-from-top spin-out">
        <div class="top-bar-left">
          <ul class="dropdown menu" id="top-navi" data-dropdown-menu>
            <li class="menu-text">Site Title</li>
            <li>
              <a href="#">One</a>
              <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
              </ul>
            </li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
          </ul>
        </div>
      </div>

       <div id="divContent">
          <form action="" method="GET">
            <div class="row">
              <div class="large-12 columns">
                <div class="row collapse">
                  <div class="small-10 columns">
                    <input class="search-bar" id="search" type="text" name="txtSearch">
                  </div>
                  <div class="small-2 columns">
                    <button type="submit" class="button">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
      </div>

    <?php if (isset($_REQUEST['txtSearch'])) {?>
      <?php if (($_REQUEST['txtSearch']) != '') {?>
        <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['txtSearch']);
?>
        <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->searchCustomer($_smarty_tpl->tpl_vars['txt']->value));
?>
        <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>

      <?php } elseif (($_REQUEST['txtSearch']) == '') {?>
        <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->searchCustomer());
?>
        <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>

      <?php }?>
    <?php } else { ?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->getCustomer());
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
    <?php }?>


    <div class='row'>
      <div class='large-10 columns'>
        <table>
          <thead>
            <tr>
              <td>Cnumber</td>
              <td>Cname</td>
              <td>Street</td>
              <td>Zip Code</td>
              <td>Phone Number</td>
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
              </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        </table>
      </div>
    </div>

 <a href="customer.php?export=" class="button">Export Data</a>

    <div class="footer">
      <div class="row">
        <div class="large-4 columns">
          <h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
          <p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
        </div>
        <div class="large-3 large-offset-2 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
        <div class="large-3 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
      </div>
    </div>

    <?php echo '<script'; ?>
 src="JS/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="JS/foundation.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(document).foundation();
    <?php echo '</script'; ?>
>

  </body>
</html>
<?php }
}
