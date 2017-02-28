<?php
require_once('smarty-3.1.30/libs/Smarty.class.php');
include('employee.php');
$employee = new employee();
$smarty= new Smarty();
$smarty->template_dir='views';
$smarty->compile_dir='tmp';
$smarty->assign('employee',$employee);

$smarty->display('employees.tpl');

?>
