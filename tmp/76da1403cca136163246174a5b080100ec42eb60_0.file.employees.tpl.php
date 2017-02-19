<?php
/* Smarty version 3.1.30, created on 2017-02-17 13:12:53
  from "C:\xampp\htdocs\E-commerce_final\views\employees.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58a6e8c5a373b6_23504639',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    '76da1403cca136163246174a5b080100ec42eb60' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\employees.tpl',
      1 => 1487333566,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58a6e8c5a373b6_23504639 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<!--CHANGELOG
	Created Class, basic replication of customers class - 1/26/2017
	Added basic interface to existent code - 1/31/2017
	Formatted code with proper indenting  - 2/1/2017
-->
<!--
  @author Kwabena Boohene
  @desc - This page displays employee data based on search input in a table format.
-->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employees</title>
    <link rel="stylesheet" href="Css/foundation.min.css">
    <link rel="stylesheet" href="Css/Style.css">
     <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <?php echo '<script'; ?>
 src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"><?php echo '</script'; ?>
>
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
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['employee']->value->fetch_EData($_smarty_tpl->tpl_vars['txt']->value));
?>

    <?php } elseif (($_REQUEST['txtSearch']) == '') {?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['employee']->value->fetch_EData());
?>

    <?php }?>
  <?php } else { ?>
    <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['employee']->value->fetch_EData());
?>
  <?php }?>


<div class='row'>
  <div class='large-10 columns'>
    <table>
      <thead>
        <tr>
          <td>Enumber</td>
          <td>Ename</td>
          <td>Zip Code</td>
          <td>Hire date</td>
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
          </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    </table>
  </div>
</div>
<div class='row'>
      <div class='large-6 columns'>
        <div class="ct-chart ct-perfect-fourth"></div>
          <?php $_smarty_tpl->_assignInScope('countData', $_smarty_tpl->tpl_vars['employee']->value->countEmployees());
?>
          <?php echo '<script'; ?>
>
            new Chartist.Bar('.ct-chart', {
                labels: ['Employee','Customer'],
                series: [<?php echo $_smarty_tpl->tpl_vars['countData']->value['Num_Employees'];?>
,<?php echo $_smarty_tpl->tpl_vars['countData']->value[1]['Num_Customers'];?>
]
              }, {
                distributeSeries: true
              });
          <?php echo '</script'; ?>
>
        </div>

        <div class="large-6 columns">
         <div class="ct-chart1 ct-perfect-fourth"></div>
          <?php echo '<script'; ?>
>
            var data = {
                series: [<?php echo $_smarty_tpl->tpl_vars['countData']->value['Num_Employees'];?>
,<?php echo $_smarty_tpl->tpl_vars['countData']->value[1]['Num_Customers'];?>
]
              };

            var sum = function(a, b) { return a + b };

            new Chartist.Pie('.ct-chart1', data, {
              labelInterpolationFnc: function(value) {
                return Math.round(value / data.series.reduce(sum) * 100) + '%';
              }
            });
          <?php echo '</script'; ?>
>
        </div>
    </div>
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
