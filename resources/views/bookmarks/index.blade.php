@extends('layout')

@include('bookmarks.partials._navbar')
@section('content')

	@foreach ($articles as $article)
		<article class="article col-md-8 col-md-offset-2">
			<h2 class="article-title">
				<a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a>
			</h2>

			<div class="article-body">{{ $article->body }}</div>
			<div class="article-details">
				<h5> published by <strong><em>{{ $article->user()->first()->name }}<em></strong> about
				{{ $article->created_at->diffForHumans() }}</h5>
			</div>
			<hr>
		</article>
	@endforeach
@stop 