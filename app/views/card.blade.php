@extends( 'master' )
@section( 'content' )
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<div class="page-header">
				<h1>Weiβ Schwarz <small>- Card</small></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<ol class="breadcrumb">
				<li><a href="{{ URL::route('news.index')}}">Home</a></li>
				<li><a href="{{ URL::route('series.index') }}">Series</a></li>
				<li><a href="{{ $card->series->url }}">{{ $card->series->name }}</a></li>
				<li class="active">{{ $card->unique_identifier }}</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<h3>{{ $card->name }}</h3>
			<h4 class="row-line">{{ $card->jap_name }}</h4>
		</div>
		<div class="col-xs-12 col-md-12">
			<a data-toggle="modal" data-target="#image-modal" href="">
				<!-- I know you hate this nathan but please let this go for now :) -->
				<img class="card-single-image image-responsive center-block" src="{{ asset('/images/cards/' . $card->id . '.jpeg') }}">
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<table class="table table-striped">
				<tr>
					<td><label>Type</label></td>
					<td>{{ $card->type }}</td>
					<td><label>Level</label></td>
					<td>{{ $card->level }}</td>
				</tr>
				<tr>
					<td><label>Colour</label></td>
					<td>{{$card->colour}}</td>
					<td><label>Cost</label></td>
					<td>{{$card->cost}}</td>
				</tr>	
				<tr>
					<td><label>Trigger</label></td>
					<td colspan='3'>{{$card->trigger}}</td>
				</tr>
				<tr>
					<td><label>Power</label></td>
					<td>{{$card->power}}</td>
					<td><label>Soul</label></td>
					<td>{{$card->soul}}</td>
				</tr>
				<tr>
					<td><label>Traits</label></td>
					<td colspan='3'>{{$card->traits}}</td>
				</tr>
			</table>
			<div class="panel panel-default">
				<div class="panel-heading">
					Card Text/ Abilities
				</div>
				<div class="panel-body">
					@if ($card->eng_text != 'N/A')
						<p>{{$card->eng_text}}</p>
						@if ($card->eng_text2 != 'N/A')
							<p>{{$card->eng_text2}}</p>
						@endif
					@else
						<p>{{$card->eng_text}}</p>
					@endif
					@if ($card->jap_text  != 'N/A')
						<p>{{$card->jap_text}}</p>
						@if ($card->jap_text2 != 'N/A')
							<p>{{$card->jap_text2}}</p>
						@endif
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="image-modal">
		<div class="modal-dialog">
			<div class="modal-content modal-popup-image">
				<img class="popup-image" src="{{ asset('/images/cards/' . $card->id . '.jpeg') }}">
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop
@section('comments')
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<div class="panel panel-default widget">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-comment"></span> Recent Comments <span class="comment-count">{{$card->total_comments}}</span>
				</div>
				<div class="panel-body panel-no-padding">
					<ul class="list-group">
					@if ( Auth::check() )
						<li class="list-group-item col-xs-12">
							<div class="row">
								<div class="col-xs-2">
									<img class="img-circle profile-img" src="{{ asset('images/users/1.jpeg') }}">
								</div>
								<div class="col-xs-10">
									<h5>{{ Auth::user()->username }}</h5>
									<div class="input-group comment-textarea">
										<form id="comment-form">
											<textarea id="comment-input" class="form-control" cols="90" placeholder="Write a comment..." name="comment"></textarea>
											<input class="hidden" type='text' name="user_id" value="{{{ Auth::user()->id }}}">
											<input class="hidden" type='text' name="card_id" value="{{{ $card->id }}}">
											<input id="rating" class="hidden" type='text' name="rating" value="">
										</form>
									</div>
									<div class="rating-stars">
										<span id="star1" class="glyphicon glyphicon-star-empty"></span>
										<span id="star2" class="glyphicon glyphicon-star-empty"></span>
										<span id="star3" class="glyphicon glyphicon-star-empty"></span>
										<span id="star4" class="glyphicon glyphicon-star-empty"></span>
										<span id="star5" class="glyphicon glyphicon-star-empty"></span>
									</div>
								</div>
							</div>
						</li>
					@else 
						<li class="list-group-item col-xs-12" >
							<button class="btn btn-primary success center-block button-comment-padding " onClick="location.href='{{URL::route('login.index')}}'">Please sign-in to comment</button>
						</li>
					@endif
					</ul>
					@if ( $comments )
					<ul class="list-group" id="comment-list">
					@endif
						@foreach( $comments as $post )
							@if( $post == $comments[0] )
								<li class="list-group-item col-xs-12" id="first-comment"> 
							@else
								<li class="list-group-item col-xs-12"> 
							@endif
								<div class="row">
									<div class="col-xs-2">
										<img src="http://placehold.it/80" class="img-circle img-responsive center-block" alt="">
									</div>
									<div class="col-xs-10">
										<h5>{{{ $post->user->username }}}</h5>
										<p>{{ $post->comment }}</p>
										@if( $post->rating == 1 )
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
										@elseif( $post->rating == 2 )
											<span class="glyphicon glyphicon-star"></span>
											<span xclass="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
										@elseif( $post->rating == 3 )
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
										@elseif( $post->rating == 4 )
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
										@elseif( $post->rating == 5 )
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
										@else
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
										@endif
										<p>{{ $post->created_at->diffForHumans() }}</p>
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@stop
@section('scripts')
<script type="text/javascript" src="{{ asset('/js/rating.js')}}"></script>
@stop