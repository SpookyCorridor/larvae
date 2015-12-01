@extends('layout')
@include('partials._navbar')
@section('content')
	
	<div class="article col-md-8 col-xs-10 col-md-offset-2 col-xs-offset-1">
	<h1>Publish a new article</h1>
	<hr>
	{!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}

		@include ('articles.partials._form', ['submitButtonText' => 'Add Article'])

	{!! Form::close() !!}

	@include('errors.form') 
	</div>
@stop 