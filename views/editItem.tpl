<!DOCTYPE html>
<html>
<head>
	<title>Edit item</title>
</head>
<body>
{if isset($smarty.post.ino)}
 {assign var="itemId" value=$smarty.post.ino}
 {assign var="iname" value=$smarty.post.iname}
 {assign var="qoh" value=$smarty.post.qoh}
 {assign var="price" value=$smarty.post.price}
 {assign var="olvl" value=$smarty.post.olevel}
 {assign var="catno" value=$smarty.post.catno}

 {if ($catno)=="-1"}
  {"Please select a zip"}
 {elseif ($itemId)=="" or ($iname)=="" or ($qoh)=="" or ($price)==""}
  {"Please enter all information"}
 {else}
  {assign var="result" value=$item->editItem($itemId, $iname, $qoh, $price, $olvl, $catno)}

 {/if}
 {/if}

 {if isset($smarty.request.searchItem)}

    {if ($smarty.request.searchItem)!=""}
      {assign var="txt" value=$smarty.request.searchItem}
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

	<form action="employeeDisplay.php?eAction=11" method="POST">
    <input type="text" name="ino" value={$data.0.ino} hidden>
   <div>Item Name <input type="text" name="iname" value="{$data.0.iname}"><br></div>
   {assign var="categoryId" value=$item->getCategory()}
   {assign var="categoryVar" value=$item->fetchDB($categoryId)}

   <div>Category <select name="catno">
	<option value="-1">Select category</option>
	 {foreach from=$categoryVar  item=category}

     {if $data.0.catno==$category.catno}
	 <option value={$category.catno} selected>{$category.catname}</option>
     {else}
        <option value={$category.catno}>{$category.catname}</option>
      {/if}

	{/foreach}
	</select>
   <br></div>
   <div> Quantity On Hand <input type="text" name="qoh" value={$data.0.qoh}><br></div>
   <div> Price <input type="text" name="price" value={$data.0.price}><br></div>
   <div> order level <input type="number" name="olevel" value={$data.0.olevel}><br></div>
   <input type="submit" value="Edit">
  </form>



</body>
</html>
