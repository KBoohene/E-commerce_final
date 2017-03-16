<html>
<!--CHANGELOG
    Changed column names to reflect changes made in database - 2/1/2017
	Added agreed upon user interface - 2/2/2017
	Formatted code - 2/2/2017
-->
<!--
  @author David Okyere
  @desc - This page adds items to the current list of items.
-->

 <head>
 <title> Add Employee </title>
 </head>
 
 <body>	
  <form action="employeeDisplay.php?eAction=5" method="POST">
   <div> Employee Name <input type="text" name="ename"/><br></div>
   <div> Zip <select name="zip">
	<option value="-1">Select Zip</option>
	 {assign var="zipResult" value=$employee->getZips()}
	 {assign var="zipData" value=$employee->fetchDB($zipResult)}
	 {foreach from=$zipData item=zip}
	<option value="{$zip.zip}">{$zip.city}</option>
	{/foreach}
	</select>
   <br></div>	
   <div> Hire Date <input type="date" name="hdate"/><br></div>
   <div> Password <input type="text" name="pword"/><br></div>
   <div> Account Type <input type="number" name="acctype"/><br></div>
   <div> Username <input type="text" name="usrname"/><br></div>
   <input type="submit" value="Add">
  </form>

 {if isset($smarty.post.ename)}
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
  {assign var="result" value=$employee->addEmployee($ename,$zip,$hdate,$pword,$acctype,$usrname)}
  {"<script>window.location = 'employeeDisplay.php?eAction=3'</script>"}
 {/if}
 {/if}

</body>
</html>
