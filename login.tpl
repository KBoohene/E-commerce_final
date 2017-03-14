<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<!-- {"<?php header('Location: index.php?cAction=5') ?>"} -->
	<form action="index.php?cAction=4" method="post">
		<label>Username</label>
		<input type="text" name="username">
			<br>
		<label>Password</label>
		<input type="password" name="password">
			<br>
			<br>
		<input type="text" name="submitted" hidden>
		<input type="submit" value="Submit">
	</form>

	{if isset($smarty.post.submitted)}
		{assign var="username" value=$smarty.post.username}
		{assign var="password" value=$smarty.post.password}

		{if ($username)=="" or ($password)==""}
      {"Please enter all information"}
    {else}
      {assign var="loginResult" value=$customer->loginCustomer($username, $password)}

			{assign var="loginData" value=$customer->fetchDB($loginResult)}
			{foreach from=$loginData item=login}
				{if ($login.Password) == $password}
					{"Success"}
					{"<script>window.location = 'index.php?cAction=5'</script>"}
				{/if}
			{/foreach}

    {/if}
  {/if}
</body>
</html>
