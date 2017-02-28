<?php

require_once('smarty-3.1.30/libs/Smarty.class.php');
include("customer.php");
$customer = new customer();
$smarty= new Smarty();
$smarty->template_dir='views';
$smarty->compile_dir='tmp';
$smarty->assign('customer',$customer);
$smarty->display('customers.tpl');

?>
