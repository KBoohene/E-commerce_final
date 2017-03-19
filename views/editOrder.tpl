<!DOCTYPE html>
<html>
<head>
	<title>Edit Order</title>
</head>
<body>

  {if isset($smarty.post.ono)}
   {assign var="ono" value=$smarty.post.ono}
   {assign var="cno" value=$smarty.post.cno}
   {assign var="checked_out" value=$smarty.post.checked_out}
   {assign var="received" value=$smarty.post.received}
   {assign var="shipped" value=$smarty.post.shipped}
   
   
   {$ono}
     {if ($cno)=="" or ($checked_out)=="" or ($received)=="" or ($received)==""}
      {"Please enter all information"}
     {else}
      {assign var="result" value=$order->editOrder($ono,$cno,$checked_out,$received,$shipped)}
      {"<script>window.location = 'employeeDisplay.php?eAction=14'</script>"}
     {/if}
   {/if}

{if isset($smarty.request.searchName)}
    {if ($smarty.request.searchName)!=""}
      {assign var="txt" value=$smarty.request.searchName}
      {assign var="result" value=$order->getOrderData($txt)}
      {assign var="data" value=$order->fetchDB($result)}
 {/if}

 {/if}

  <form action="employeeDisplay.php?eAction=15" method="POST">
    <input type="text" name="ono" value="{$data.0.ono}" hidden>
    <div> Customer ID <input type="number" name="cno" value='{$data.0.cno}'><br></div>
	<div> Checked Out <select name="checked_out">
	<option value="-1">Select Checked Out Status</option>
	<option value="Yes" selected> Yes </option>
	<option value="No" selected> No </option>
	 </select>
     <br></div>
    <div> Received <input type="date" name="received" value='{$data.0.received}'><br></div>
    <div> Shipped <input type="date" name="shipped" value='{$data.0.shipped}'><br></div>
    <input type="submit" value="Edit">
  </form>


</body>
</html>
