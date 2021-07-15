<html>
	<head>
		<title>@yield('title')</title>
		<style>
			body{
				font-size: 16pt;
				margin: 5px;
			}
			h1{
				font-size: 30pt;
				text-align: center;
				margin: 0px 0px -30px 0px;
				letter-spacing: -4px;
			}
			ul{
				font-size: 14pt;
			}
			.menutitle{
				font-size: 14pt;
				font-weight: bold;
				margin: 0px;
			}
			.content{
				margin: 10px;
			}
			.footer{
				text-align: right;
				font-size: 10pt;
				margin: 10px;
				border-bottom: solid 1px #ccc;
				color: #ccc;
			}
			th{
				padding: 5px 10px;
			}
			td{
				padding: 5px 0px;
			}
		</style>
	</head>
	<body>
		<h1>@yield('title')</h1>
		@section('first_menubar')
		<ul>
			<li>@show</li>
		</ul>
		<!--hr size="1"-->
		<div class="content">
			@yield('first_content')
		</div>
		@section('second_menubar')
		<ul>
			<li>@show</li>
		</ul>
		<div class="content">
			@yield('second_content')
		</div>
		<div class="footer">
			@yield('footer')
		</div>
	</body>
</html>
