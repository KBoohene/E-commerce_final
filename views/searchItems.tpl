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
</head>
 
<body>
 <div>
  <form action="index.php?cAction=1" method="POST">
   <input class="search-bar" id="search" type="text" name="searchName">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>
 
 {if isset($smarty.request.searchName)}
    {if ($smarty.request.searchName)!=""}
      {assign var="txt" value=$smarty.request.searchName}
      {assign var="result" value=$item->searchItems($txt)}
      {assign var="data" value=$item->fetchDB($result)}
    {elseif ($smarty.request.searchName)==""}
      {assign var="result" value=$item->getItems()}
      {assign var="data" value=$item->fetchDB($result)}
 {/if}
 {else}
    {assign var="result" value=$item->getItems()}
    {assign var="data" value=$item->fetchDB($result)}
 {/if}	  
	 	  
 <div>
  <table>
    <thead>
      <tr>
       <td>Product ID</td>
       <td>Product Name</td>
       <td>Quantity on Hand</td>
       <td>Price</td>
       <td>Reorder Level</td>
      </tr>
  </thead>
	
 {foreach from=$data item=value}
  <tr>
   {if $value.ino}
      <td>{$value.ino}</td>
   {/if}
   {if $value.iname}
      <td>{$value.iname}</td>
   {/if}
   {if $value.qoh}
      <td>{$value.qoh}</td>
   {/if}
   {if $value.price}
      <td>{$value.price}</td>
   {/if}
   {if $value.olevel}
      <td>{$value.olevel}</td>
   {/if}
   </tr>
   {/foreach}
  </table>
 </div>
</body>
</html>
