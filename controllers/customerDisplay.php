<?php
require_once('../smarty-3.1.30/libs/Smarty.class.php');
include("../Classes/customer.php");
include("../Classes/order.php");
include("../Classes/items.php");

//Created objects of the class
$customer = new customer();
$order = new order();
$item = new item();

//Created smarty object
$smarty= new Smarty();
$smarty->template_dir='views';
$smarty->compile_dir='tmp';

//Assigned smarty objects
$smarty->assign('customer',$customer);
$smarty->assign('order',$order);
$smarty->assign('item',$item);

if(isset($_REQUEST['cAction'])){
  $value=$_REQUEST['cAction'];

  switch($value){
    case 1:
      $smarty->display('landingPage.tpl');
      break;
    case 2:
      $smarty->display('searchItems.tpl');
      break;
    case 3:
      $smarty->display('productDetails.tpl');
      break;
    case 4:
      $smarty->display('customerSignUp.tpl');
      break;
    case 5:
      $smarty->display('customerLogin.tpl');
      break;
    case 6:
      $smarty->display('customerOrder.tpl');
      break;
    case 7:
      $smarty->display('checkout.tpl');
      break;
    default:
      echo "Page not available";
  }
}
?>
