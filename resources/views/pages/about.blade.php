@extends('layout')

@section('content')
	<h2>About Me </h2>
	
	<!-- only show this is movies is not empty --> 
	@if (count($movies))
	<h3>Movies I've seen recently</h3>
	<ul>
		@foreach ($movies as $movie)
			<li>{{ $movie }}</li>
		@endforeach 
	</ul>
	@endif 
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi ipsam nihil sit sed esse rem fugiat dicta, atque facilis harum eveniet consectetur dolore vel quo tenetur fuga culpa hic ipsum.</p>
@stop 