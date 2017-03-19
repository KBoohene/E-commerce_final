<head>
<title>Search Order</title>
</head>

<body>
 <div>
  <form action="employeeDisplay.php?eAction=14" method="POST">
   <input class="search-bar" id="search" type="text" name="searchOrder">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>

 {if isset($smarty.request.searchOrder)}
    {if ($smarty.request.searchOrder)!=""}
      {assign var="txt" value=$smarty.request.searchOrder}
      {assign var="result" value=$order->searchOrders($txt)}
      {assign var="data" value=$order->fetchDB($result)}
    {elseif ($smarty.request.searchName)==""}
      {assign var="result" value=$order->getOrders()}
      {assign var="data" value=$order->fetchDB($result)}
 {/if}
 {else}
    {assign var="result" value=$order->getOrders()}
    {assign var="data" value=$order->fetchDB($result)}
 {/if}

 <div>
  <table>
    <thead>
      <tr>
       <td>Order ID</td>
       <td>Customer ID</td>
       <td>Checked Out</td>
       <td>Received</td>
       <td>Shipped</td>
       <td>Created At</td>
      </tr>
  </thead>

 {foreach from=$data item=value}
  <tr>
   {if $value.ono}
      <td>{$value.ono}</td>
   {/if}
   {if $value.cno}
      <td>{$value.cno}</td>
   {/if}
   {if $value.checked_out}
      <td>{$value.checked_out}</td>
   {/if}
   {if $value.received}
      <td>{$value.received}</td>
   {/if}
   {if $value.shipped}
      <td>{$value.shipped}</td>
   {/if}
   {if $value.created_at}
      <td>{$value.created_at}</td>
   {/if}
   <td><a href="employeeDisplay.php?eAction=15&searchName={$value.ono}">Edit Employee</a>
   </tr>
   </tr>
   {/foreach}
  </table>
 </div>
</body>
</html>
