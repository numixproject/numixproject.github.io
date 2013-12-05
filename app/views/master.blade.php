<!doctype html>
<html lang="en">
<head>
	{{HTML::style("css/bootstrap.min.css")}}
	{{HTML::style("css/bootstrap-theme.min.css")}}
	{{HTML::style("css/font-awesome.min.css")}}
	{{HTML::style("css/main.css")}}
	{{HTML::script("js/jquery.js")}}
	{{HTML::script("js/bootstrap.min.js")}}
	<meta charset="UTF-8">
	<title>senport</title>
</head>
<body>
	<div class="container">
		@yield("content")
	</div>
	<footer>
		
	</footer>
</body>
</html>