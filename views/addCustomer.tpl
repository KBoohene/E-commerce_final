<!DOCTYPE html>
<html>
<head>
	<title>Add customer</title>
</head>
<body>

	<form action="employeeDisplay.php?eAction=7" method="post">
		<label>Name</label>
		<input type="text" name="name">
			<br>
		<label>Street</label>
		<input type="text" name="street">
			<br>
		<label>Zip</label>
		<select name="zip">
			<option value="-1">Select Zip</option>
			{assign var="zipResult" value=$customer->getZips()}
			{assign var="zipData" value=$customer->fetchDB($zipResult)}
			{foreach from=$zipData item=zip}
				<option value="{$zip.zip}">{$zip.city}</option>
			{/foreach}
		</select>
			<br>
		<label>Phone Number</label>
		<input type="text" name="phone">
			<br>
		<label>Username</label>
		<input type="text" name="username">
			<br>
		<label>Password</label>
		<input type="password" name="password">
			<br>
			<br> 
		<label>Status</label>
		<input type="text" name="status">
			<br>	
		<input type="text" name="submitted" hidden>
		<input type="submit" value="Submit">
	</form>

	{if isset($smarty.post.submitted)}
		{assign var="name" value=$smarty.post.name}
		{assign var="street" value=$smarty.post.street}
		{assign var="zip" value=$smarty.post.zip}
		{assign var="phone" value=$smarty.post.phone}
		{assign var="username" value=$smarty.post.username}
		{assign var="password" value=$smarty.post.password}
        {assign var="status" value=$smarty.post.status}
		{if ($zip)=="-1"}
			{"Please select a zip"}
		{elseif ($name)=="" or ($street)=="" or ($phone)=="" or ($username)=="" or ($password)==""}
      {"Please enter all information"}
    {else}
      {assign var="result" value=$customer->addCustomer($name, $street, $zip, $phone, $username, $password, $status)}
		{"Success"}
        {"<script>window.location = 'employeeDisplay.php?eAction=6'</script>"}
    {/if}
  {/if}

</body>
</html>
