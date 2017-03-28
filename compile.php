<?php
require_once('smarty-3.1.30/libs/Smarty.class.php');
include("Classes/customer.php");
include("Classes/employee.php");
include("Classes/order.php");
include("Classes/reports.php");
include("Classes/item.php");
include("Classes/userInfo.php");

//Created objects of the various classes
$customer = new customer();
$employee = new employee();
$order = new order();
$report = new reports();
$item = new item();
$userInfo = new userInfo();

//Created smarty objects
$smarty= new Smarty();
$smarty->template_dir='views';
$smarty->compile_dir='tmp';

//Assigned smarty objects
$smarty->assign('customer',$customer);
$smarty->assign('employee',$employee);
$smarty->assign('order',$order);
$smarty->assign('report',$report);
$smarty->assign('item',$item);
$smarty->assign('userInfo',$userInfo);

$smarty->display('loginEmployee.tpl');
$smarty->display('Dashboard.tpl');
$smarty->display('searchEmployee.tpl');
$smarty->display('editEmployee.tpl');
$smarty->display('addEmployee.tpl');
$smarty->display('searchCustomer.tpl');
$smarty->display('addCustomer.tpl');
$smarty->display('editCustomer.tpl');
$smarty->display('customerOrder.tpl');
$smarty->display('shipping.tpl');
$smarty->display('editItem.tpl');
$smarty->display('addItem.tpl');
$smarty->display('searchItemsV2.tpl');
$smarty->display('searchOrder.tpl');
$smarty->display('editOrder.tpl');
$smarty->display('loginEmployee.tpl');

$smarty->display('searchItems.tpl');
$smarty->display('productDetails.tpl');
$smarty->display('customerSignUp.tpl');
$smarty->display('customerLogin.tpl');

$smarty->display('customerOrder.tpl');
$smarty->display('checkout.tpl');
$smarty->display('customerLogout.tpl');
$smarty->display('landingPage.tpl');


?>
