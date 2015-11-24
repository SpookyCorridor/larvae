<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/output/larvae.css">
</head>
<body>
	@include('partials._navbar')
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