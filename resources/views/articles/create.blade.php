@extends('layout')

@section('content')
	<h1>Write a new article</h1>

	<hr>

	{!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}

		@include ('articles.partials._form', ['submitButtonText' => 'Add Article']); 

	{!! Form::close() !!}

	@include('errors.form'); 
@stop 