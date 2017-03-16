<head>
<title>Search Customer</title>
</head>

<body>
 <div>
  <form action="employeeDisplay.php?eAction=6" method="POST">
   <input class="search-bar" id="search" type="text" name="searchCustomer">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>

 {if isset($smarty.request.searchCustomer)}
    {if ($smarty.request.searchCustomer)!=""}
      {assign var="txt" value=$smarty.request.searchCustomer}
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

 <div>
  <table>
    <thead>
      <tr>
       <td>Customer ID</td>
       <td>Customer Name</td>
       <td>Street</td>
       <td>Zip</td>
       <td>Phone Number</td>
       <td>Username</td>
       <td>Password</td>
       <td>Status</td>
       <td>Created At</td>
      </tr>
  </thead>

 {foreach from=$data item=value}
  <tr>
   {if $value.cno}
      <td>{$value.cno}</td>
   {/if}
   {if $value.cname}
      <td>{$value.cname}</td>
   {/if}
   {if $value.street}
      <td>{$value.street}</td>
   {/if}
   {if $value.zip}
      <td>{$value.zip}</td>
   {/if}
   {if $value.phone}
      <td>{$value.phone}</td>
   {/if}
   {if $value.Username}
      <td>{$value.Username}</td>
   {/if}
   {if $value.Password}
      <td>{$value.Password}</td>
   {/if}
   {if $value.status}
      <td>{$value.status}</td>
   {/if}
   {if $value.created_at}
      <td>{$value.created_at}</td>
   {/if}
      <td><a href="employeeDisplay.php?eAction=8&searchName={$value.cno}">Edit Customer</a>
   </tr>
   {/foreach}
  </table>
 </div>
</body>
</html>
