<p>
<form action="" method="post">
	<table class="login" style="width: 100%;">
		<tr>
			<td>Login</td>
			<td><input type="text" name="login"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<th colspan="2" style="text-align: center">
			<input type="submit" value="Log in" name="btn"
				   style="width: 80px; height: 25px;"></th>
	</table>
</form>
</p>
<?php
	if(isset($GLOBALS['logInError']))
	{
		echo $GLOBALS['logInError'];
	}
	echo $GLOBALS['loggedIn'];
?>

<?php /*extract($data['data']); ?>
<?php if($login_status=="access_granted") { ?>
<p style="color:green">Авторизация прошла успешно.</p>
<?php } elseif($login_status=="access_denied") { ?>
<p style="color:red">Логин и/или пароль введены неверно.</p>
<?php } */?>
