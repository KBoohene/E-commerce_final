<!DOCTYPE html>
<html>
<head>
	<title>Add Item</title>
</head>
<body>
{if isset($smarty.post.submit)}
 {assign var="iname" value=$smarty.post.iname}
 {assign var="qoh" value=$smarty.post.qoh}
 {assign var="price" value=$smarty.post.price}
 {assign var="olvl" value=$smarty.post.olevel}
 {assign var="catno" value=$smarty.post.catno}

 {if ($catno)=="-1"}
  {"Please select a zip"}
 {elseif ($olvl)=="" or ($iname)=="" or ($qoh)=="" or ($price)==""}
  {"Please enter all information"}
 {else}
  {assign var="result" value=$item->addItem($iname, $qoh, $price, $olvl, $catno)}

 {/if}
 {/if}

  <form action="employeeDisplay.php?eAction=12" method="POST">
   <div>Item Name <input type="text" name="iname"><br></div>
   {assign var="categoryId" value=$item->getCategory()}
   {assign var="categoryVar" value=$item->fetchDB($categoryId)}

   <div>Category <select name="catno">
	<option value="-1">Select category</option>
	 {foreach from=$categoryVar  item=category}
        <option value={$category.catno}>{$category.catname}</option>
	{/foreach}
	</select>
   <br></div>
   <div> Quantity On Hand <input type="number" name="qoh" ><br></div>
   <div> Price <input type="text" name="price" ><br></div>
   <div> order level <input type="number" name="olevel"><br></div>
   <input type="submit" name="submit" value="Add">
  </form>



</body>
</html>
