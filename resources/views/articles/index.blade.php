@extends('layout')

@include('partials._navbar')
@section('content')

	@foreach ($articles as $article)
		<article class="article col-md-8 col-xs-10 col-md-offset-2 col-xs-offset-1">
			<h2 class="article-title">
				<a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a>
			</h2>

			<div class="article-preview">{{  (strlen($article->body) > 270) ? substr($article->body,0,270).'...' : $article->body }}</div>
			<div class="article-details">
				<h5> published by <strong><em>{{ $article->user()->first()->name }}<em></strong> about
				{{ $article->created_at->diffForHumans() }}</h5>
			</div>
			<hr>
		</article>
	@endforeach
@stop 