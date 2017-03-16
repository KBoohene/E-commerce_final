<html>

<!--CHANGELOG
    Changed column names to reflect changes made in database - 12/3/2017
	Formatted code - 12/3/2017
-->
<!--
  @author David Okyere
  @desc - This page displays items based on user search input.
-->

<head>
<title> Search Employee </title>
</head>
 
<body>
 <div>
  <form action="employeeDisplay.php?eAction=3" method="POST">
   <input class="search-bar" id="search" type="text" name="searchName">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>
 
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
	 	  
 <div>
  <table>
    <thead>
      <tr>
       <td>Employee ID</td>
       <td>Employee Name</td>
       <td>Zip</td>
       <td>Hire Date</td>
	   <td>Password</td>
	   <td>Time Created</td>
	   <td>Account Type</td>
       <td>Username</td>
      </tr>
  </thead>
	
 {foreach from=$data item=value}
  <tr>
   {if $value.eno}
      <td>{$value.eno}</td>
   {/if}
   {if $value.ename}
      <td>{$value.ename}</td>
   {/if}
   {if $value.zip}
      <td>{$value.zip}</td>
   {/if}
   {if $value.hdate}
      <td>{$value.hdate}</td>
   {/if}
   {if $value.Password}
      <td>{$value.Password}</td>
   {/if}
   {if $value.created_at}
      <td>{$value.created_at}</td>
   {/if}
   {if $value.account_type}
      <td>{$value.account_type}</td>
   {/if}
   {if $value.Username}
      <td>{$value.Username}</td>
   {/if}
   </tr>
   {/foreach}
  </table>
 </div>
</body>
</html>
