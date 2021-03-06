@extends('layout')
@include('partials._navbar')
@section('content')
	<h1>Edit {!! $article->title !!}</h1>

	{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
		@include ('articles.partials._form', ['submitButtonText' => 'Update Article'])
	{!! Form::close() !!}

	@include ('errors.form') 
@stop 