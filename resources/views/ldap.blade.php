<!DOCTYPE html>
<html>
<head>
	<title>Login LDAP</title>
</head>
<body>
<form method="POST" action="/loginldp">
	{{ csrf_field() }}
	Username:<input type="text" name="username"><br>
	Password:<input type="password" name="password"><br>
	<input type="submit" value="login">
</form>

</body>
</html>