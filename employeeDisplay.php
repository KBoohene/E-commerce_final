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

if(isset($_REQUEST['eAction'])){
  $value=$_REQUEST['eAction'];

  switch($value){
    case 1:
      $smarty->display('loginEmployee.tpl');
      break;
    case 2:
      $smarty->display('Dashboard.tpl');
      break;
    case 3:
      $smarty->display('searchEmployee.tpl');
      break;
    case 4:
      $smarty->display('editEmployee.tpl');
      break;
    case 5:
      $smarty->display('addEmployee.tpl');
      break;
    case 6:
      $smarty->display('searchCustomer.tpl');
      break;
    case 7:
      $smarty->display('addCustomer.tpl');
      break;
    case 8:
      $smarty->display('editCustomer.tpl');
      break;
    case 9:
      $smarty->display('customerOrder.tpl');
      break;
    case 10:
      $smarty->display('shipping.tpl');
      break;
    case 11:
      $smarty->display('editItem.tpl');
      break;
    case 12:
      $smarty->display('addItem.tpl');
      break;
    case 13:
      $smarty->display('searchItemsV2.tpl');
      break;
    case 14:
      $smarty->display('searchOrder.tpl');
      break;
    case 15:
      $smarty->display('editOrder.tpl');
      break; 	  
    default:
      $smarty->display('loginEmployee.tpl');
  }
} else {
  $smarty->display('loginEmployee.tpl');
}

?>
