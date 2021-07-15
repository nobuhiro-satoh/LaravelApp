<html>
	<head>
		<title>Hello/Index</title>
		<style>
			body{
				font-size: 16px;
				color: #999;
			}
			h1{
				font-size: 50px;
				text-align: right;
				color: #f6f6f6;
				margin: -20px 0px -30px 0px;
				letter-spacing: -4px;
			}
		</style>
	</head>
	<body>
		<h1>Blade/Index</h1>
		@isset($msg)
			<p>こんにちは、{{$msg}}さん。</p>
		@else
			<p>何か書いてください。</p>
		@endif
		<form method="POST" action="/hello">
			@csrf
			<input type="text" name="msg">
			<input type="submit">
		</form>
	</body>
</html>
