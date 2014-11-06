@extends( 'master' )
@section( 'content' )
<div class="col-md-8 col-md-offset-2">
	<div class="page-header">
		<h1>Weiβ Schwarz <small>- News</small></h1>
	</div>
</div>
<div class="col-md-8 col-md-offset-2">
	@foreach($news as $article)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title">{{$article->title}}</h2><br>
				<span>{{ $article->created_at->diffForHumans() }}</span>
			</div>
			<div class="panel-body">
				<div class="col-md-3">
					<img class="market-img" src="{{asset('images/cards/' . $article->id . '.jpeg')}}">
				</div>
				<div class="col-md-9">
					<p class="">{{$article->text}}</p>
				</div>
			</div>
		</div>
	@endforeach
</div>
<div class="col-md-8 col-md-offset-2">
	<div class="well well-sm">
		<nav>
			{{ $news->links() }}
		</nav>
	</div>
</div>
@stop