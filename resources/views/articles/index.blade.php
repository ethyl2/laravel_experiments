@extends('layout2')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
      <a href="/articles/create">New</a>
      @forelse ($articles as $article)
			<div class="title" style="padding-top: 2em;">
				<h2>
          <a href="{{ route('articles.show', $article) }}">{{ $article->title }}
          </a>
        </h2>
			</div>
      <p>{{ $article->body }}</p>
      <hr />

      @empty
      <p>No relevant articles.</p>

      @endforelse
		</div>
  </div>
	</div>
</div>

@endsection
