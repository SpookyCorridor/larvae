<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href='https://fonts.googleapis.com/css?family=Merriweather|Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/output/larvae.css">
</head>
<body>
	
	<div class="container">

		@include('partials.flash')

		@yield('content')
	</div>
	
	
	<script src="/output/scripts.js"></script>
	<script>
		$('div.alert').not('.alert-important').delay(3000).slideUp(300); 
	</script>
	
	<footer>
		@yield('footer')
	</footer>
	
</body>
</html>