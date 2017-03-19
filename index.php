<?php
require_once('smarty-3.1.30/libs/Smarty.class.php');
include("Classes/customer.php");
include("Classes/order.php");
include("Classes/item.php");
include("Classes/userInfo.php");

//Created objects of the class
$customer = new customer();
$order = new order();
$item = new item();
$userInfo = new userInfo();

//Created smarty object
$smarty= new Smarty();
$smarty->template_dir='views';
$smarty->compile_dir='tmp';

//Assigned smarty objects
$smarty->assign('customer',$customer);
$smarty->assign('order',$order);
$smarty->assign('item',$item);
$smarty->assign('userInfo',$userInfo);

if(isset($_REQUEST['cAction'])){
  $value=$_REQUEST['cAction'];

  switch($value){
    case 1:
      $smarty->display('searchItems.tpl');
      break;
    case 2:
      $smarty->display('productDetails.tpl');
      break;
    case 3:
      $smarty->display('customerSignUp.tpl');
      break;
    case 4:
      $smarty->display('customerLogin.tpl');
      break;
    case 5:
      $smarty->display('customerOrder.tpl');
      break;
    case 6:
      $smarty->display('checkout.tpl');
      break;
    case 7:
      $smarty->display('customerLogout.tpl');
      break;
    default:
      $smarty->display('landingPage.tpl');
  }
}
else{
  $smarty->display('landingPage.tpl');
}
?>
