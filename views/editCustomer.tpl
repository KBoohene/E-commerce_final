<!DOCTYPE html>
<html>
<head>
	<title>Edit Customer</title>
</head>
<body>

 {if isset($smarty.request.searchName)}
    {if ($smarty.request.searchName)!=""}
      {assign var="txt" value=$smarty.request.searchName}
      {assign var="result" value=$customer->searchCustomers($txt)}
      {assign var="data" value=$customer->fetchDB($result)}
    {elseif ($smarty.request.searchName)==""}
      {assign var="result" value=$customer->getCustomers()}
      {assign var="data" value=$customer->fetchDB($result)}
 {/if}
 {else}
    {assign var="result" value=$customer->getCustomers()}
    {assign var="data" value=$customer->fetchDB($result)}
 {/if}

	<form action="employeeDisplay.php?eAction=8" method="POST">
    <input type="text" name="cno" value={$data.0.cno} hidden>
   <div> Customer Name <input type="text" name="cname" value={$data.0.cname}><br></div>
    <div> Street <input type="text" name="street" value={$data.0.street}><br></div>
   <div> Zip <select name="zip">
	<option value="-1">Select Zip</option>
	 {assign var="zipResult" value=$customer->getZips()}
	 {assign var="zipData" value=$customer->fetchDB($zipResult)}
	 {foreach from=$zipData item=zip}
     {if $data.0.zip==$zip.zip}
	 <option value="{$zip.zip}" selected>{$zip.city}</option>
      {else}
        <option value="{$zip.zip}">{$zip.city}</option>
      {/if}
	{/foreach}
	</select>
   <br></div>
   <div> Phone <input type="text" name="phone" value={$data.0.phone}><br></div>
   <div> Username <input type="text" name="Username" value={$data.0.Username}><br></div>
   <div> Password <input type="text" name="Password" value={$data.0.Password}><br></div>
   <div> Status <input type="text" name="status" value={$data.0.status}><br></div>
   <input type="submit" value="Edit">
  </form>

 {if isset($smarty.post.cno)}
 {assign var="cid" value=$smarty.post.cno}
 {assign var="cname" value=$smarty.post.cname}
 {assign var="street" value=$smarty.post.street}
 {assign var="zip" value=$smarty.post.zip}
 {assign var="phone" value=$smarty.post.phone}
 {assign var="Username" value=$smarty.post.Username}
 {assign var="Password" value=$smarty.post.Password}
 {assign var="status" value=$smarty.post.status}
 {if ($zip)=="-1"}
  {"Please select a zip"}
 {elseif ($cname)=="" or ($Password)=="" or ($status)=="" or ($Username)==""}
  {"Please enter all information"}
 {else}
  {assign var="result" value=$customer->editCustomer($cid,$cname,$street,$zip,$phone,$Username,$Password,$status)}

 {/if}
 {/if}

</body>
</html>
