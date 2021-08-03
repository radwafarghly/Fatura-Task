<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Your registration process has been completed successfully. Visit this link to verify your account <a href="{{ route('user-verify', ['code' => $verification->code, 'email' => $verification->email]) }}">Verify</a>
</body>
</html>