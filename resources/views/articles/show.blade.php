@extends('layout')

@section('content')

	<h1>{{ $article->title }}</h1>
	<hr>
	<article>
		{{ $article->body }}
	</article>

	@unless ($article->tags->isEmpty())	
		<h5>Tags:</h5>
		<ul>

			@foreach($article->tags as $tag)
				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
	@endunless

	@if ($user)
		<a id="remove-bookmark" href="{{ url('bookmarks/remove', [$article]) }}">unbookmark</a>
	@else
		<a href="{{ url('bookmark', [$article]) }}">bookmark</a> 
	@endif

@stop 