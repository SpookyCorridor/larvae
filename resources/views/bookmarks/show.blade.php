@extend('layout')

@foreach ($articles as $article)
		<article>
			<h2 class="article-title">
				<a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a>
			</h2>

			<div class="article-body">{{ $article->body }}</div>
		</article>
	@endforeach