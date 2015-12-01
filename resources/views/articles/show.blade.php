@extends('layout')
@include('partials._navbar')
@section('content')
	
	<div class="article col-md-10 col-md-offset-1">
	Published by: {{$article->user()->first()->name }}
		<h1 class="article-title">{{ $article->title }}</h1>

		<hr>
		<article class="article-body">
			{{ $article->body }}
		</article>
		<hr>
	

		@if ($user)
			<a id="remove-bookmark" href="{{ url('bookmarks/remove', [$article]) }}">unbookmark</a>
		@else
			<a href="{{ url('bookmark', [$article]) }}">bookmark</a> 
		@endif

		
		@unless ($article->tags->isEmpty())	
			<div class="tags">
				<h5>Tags:</h5>
				<ul>
					@foreach($article->tags as $tag)
						<li> <a href="{{ url('tags', [$tag->name]) }}"> {{$tag->name}}</a></li>
						<li> <a href="{{ url('tags', [$tag->name]) }}"> {{$tag->name}}</a></li>
						<li> <a href="{{ url('tags', [$tag->name]) }}"> {{$tag->name}}</a></li>	
					@endforeach
				</ul>
			</div>
		@endunless
	</div>
	
	

@stop 