@extends('layout2')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
      @foreach ($articles as $article)
			<div class="title" style="padding-top: 2em;">
				<h2><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></h2>
			</div>
      <p>{{ $article->body }}</p>
      <hr />
      @endforeach
		</div>
  </div>
	</div>
</div>

@endsection
