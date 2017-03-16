<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee</title>
</head>
<body>

 {if isset($smarty.request.searchName)}
    {if ($smarty.request.searchName)!=""}
      {assign var="txt" value=$smarty.request.searchName}
      {assign var="result" value=$employee->searchEmployees($txt)}
      {assign var="data" value=$employee->fetchDB($result)}
    {elseif ($smarty.request.searchName)==""}
      {assign var="result" value=$employee->getEmployees()}
      {assign var="data" value=$employee->fetchDB($result)}
 {/if}
 {else}
    {assign var="result" value=$employee->getEmployees()}
    {assign var="data" value=$employee->fetchDB($result)}
 {/if}

	<form action="employeeDisplay.php?eAction=4" method="POST">
    <input type="text" name="eno" value={$data.0.eno} hidden>
   <div> Employee Name <input type="text" name="ename" value={$data.0.ename}><br></div>
   <div> Zip <select name="zip">
	<option value="-1">Select Zip</option>
	 {assign var="zipResult" value=$employee->getZips()}
	 {assign var="zipData" value=$employee->fetchDB($zipResult)}
	 {foreach from=$zipData item=zip}
     {if $data.0.zip==$zip.zip}
	 <option value="{$zip.zip}" selected>{$zip.city}</option>

      {else}
        <option value="{$zip.zip}">{$zip.city}</option>
      {/if}
	{/foreach}
	</select>
   <br></div>
   <div> Hire Date <input type="date" name="hdate" value={$data.0.hdate}><br></div>
   <div> Password <input type="text" name="pword" value={$data.0.Password}><br></div>
   <div> Account Type <input type="number" name="acctype" value={$data.0.account_type}><br></div>
   <div> Username <input type="text" name="usrname" value={$data.0.Username}><br></div>
   <input type="submit" value="Edit">
  </form>

 {if isset($smarty.post.eno)}
 {assign var="eid" value=$smarty.post.eno}
 {assign var="ename" value=$smarty.post.ename}
 {assign var="zip" value=$smarty.post.zip}
 {assign var="hdate" value=$smarty.post.hdate}
 {assign var="pword" value=$smarty.post.pword}
 {assign var="acctype" value=$smarty.post.acctype}
 {assign var="usrname" value=$smarty.post.usrname}
 {if ($zip)=="-1"}
  {"Please select a zip"}
 {elseif ($ename)=="" or ($pword)=="" or ($acctype)=="" or ($usrname)==""}
  {"Please enter all information"}
 {else}
  {assign var="result" value=$employee->editEmployee($eid,$ename,$zip,$hdate,$pword,$acctype,$usrname)}

 {/if}
 {/if}

</body>
</html>
