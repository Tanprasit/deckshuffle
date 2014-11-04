@extends('master')
@section('navbar')
	<ul class="nav navbar-nav">
		<li><a href="{{asset('news')}}">News</a></li>
		<li><a href="{{asset('series')}}">Series</a></li>
		<li><a href="{{asset('market')}}">Market</a></li>
	</ul>
@stop
@section('content')
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="{{ URL::route('news.index')}}">Home</a></li>
			<li><a href="{{ URL::route('series.index') }}">Series</a></li>
			<li><a href="{{ $card->series->url }}">{{ $card->series->name }}</a></li>
			<li class="active">{{$card->unique_identifier}}</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<h3>{{$card->name}}</h3>
			<h4 class="row-line">{{$card->jap_name}}</h4>
		</div>
		<div class="col-xs-12 col-md-12">
			<a data-toggle="modal" data-target="#image-modal" href="">
				<img class="card-single-image image-responsive center-block" src="{{asset('/images/cards/' . $card->id . '.jpeg')}}">
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<table class="table table-striped">
				<tr>
					<td><label>Type</label></td>
					<td>{{$card->type}}</td>
					<td><label>Level</label></td>
					<td>{{$card->level}}</td>
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
				<img class="popup-image" src="{{asset('/images/cards/' . $card->id . '.jpeg')}}">
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
@stop
@section('comments')
	@if( $comments )
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<div class="panel panel-default widget">
				<div class="panel-heading">
					<span class="glyphicon glyphicon-comment"></span> Recent Comments <span class="comment-count">{{$card->total_comments}}</span>
				</div>
				<div class="panel-body panel-no-padding">
					<ul class="list-group">
						<li class="list-group-item col-xs-12" id="first-comment">
							<div class="row">
								<div class="col-xs-2">
									<img src="http://placehold.it/40" class="img-circle img-responsive center-block" alt="">
								</div>
								<div class="col-xs-10">
									<div class="input-group comment-textarea">
										<form>
											<textarea id="comment-input"class="form-control" cols="90" placeholder="Write a comment..."></textarea>
											@if(Auth::check())
											<input class="hidden" type='text' name="user_id" value="{{Auth::user()->id}}">
											<input class="hidden" type='text' name="card_id" value="{{$card->id}}">
											<input id="rating" class="hidden" type='text' name="rating" value="">
											@endif
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
						@foreach ($comments as $post)
							<li class="list-group-item col-xs-12"> 
								<div class="row">
									<div class="col-xs-2">
										<img src="http://placehold.it/80" class="img-circle img-responsive center-block" alt="">
									</div>
									<div class="col-xs-10">
										<h5>{{$post->user->username}}</h5>
										<p>{{$post->comment}}</p>
										@if ($post->rating == 1)
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
										@elseif ($post->rating == 2)
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
										@elseif ($post->rating == 3)
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
										@elseif ($post->rating == 4)
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star-empty"></span>
										@elseif ($post->rating == 5)
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
											<span class="glyphicon glyphicon-star"></span>
										@endif
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	@endif
@stop
@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.modal-dialog').css('width', '370px');
			$('textarea').autosize();
			$('textarea').on('keydown', function(e) {
				if(e.keyCode == '13'){
			        var comment = $('form').serialize();
			        $.get('/comment/create', comment).done(function(data){ 
			        	$('#first-comment').append("<li class='list-group-item col-xs-12'><div class='row'><div class='col-xs-2'><img src='http://placehold.it/80' class='img-circle img-responsive center-block' alt=''></div><div class='col-xs-10'><h5>Test</h5><p>data[0].data</p></div></div></li>");
		    		});
			    }
			});
			$('#star1').hover(
				function() {
					$(this).addClass("glyphicon-star");
					$(this).prevAll().addClass("glyphicon-star");
					$(this).removeClass("glyphicon-star-empty");
					$(this).prevAll().removeClass("glyphicon-star-empty");
					$(this).nextAll().addClass("glyphicon-star-empty");
					$('#rating').attr('value',1);
				}
			);
			$('#star2').hover(
				function() {
					$(this).addClass("glyphicon-star");
					$(this).prevAll().addClass("glyphicon-star");
					$(this).removeClass("glyphicon-star-empty");
					$(this).prevAll().removeClass("glyphicon-star-empty");
					$(this).nextAll().addClass("glyphicon-star-empty");
					$('#rating').attr('value',2);
				}
			);
			$('#star3').hover(
				function() {
					$(this).addClass("glyphicon-star");
					$(this).prevAll().addClass("glyphicon-star");
					$(this).removeClass("glyphicon-star-empty");
					$(this).prevAll().removeClass("glyphicon-star-empty");
					$(this).nextAll().addClass("glyphicon-star-empty");
					$('#rating').attr('value',3);
				}
			);
			$('#star4').hover(
				function() {
					$(this).addClass("glyphicon-star");
					$(this).prevAll().addClass("glyphicon-star");
					$(this).removeClass("glyphicon-star-empty");
					$(this).prevAll().removeClass("glyphicon-star-empty");
					$(this).nextAll().addClass("glyphicon-star-empty");
					$('#rating').attr('value',4);
				}
			);
			$('#star5').hover(
				function() {
					$(this).addClass("glyphicon-star");
					$(this).prevAll().addClass("glyphicon-star");
					$(this).removeClass("glyphicon-star-empty");
					$(this).prevAll().removeClass("glyphicon-star-empty");
					$('#rating').attr('value',5);
				}
			);
			$('#star5').click(
				function() {
					$(this).addClass("glyphicon-star");
					$(this).prevAll().addClass("glyphicon-star");
					$(this).removeClass("glyphicon-star-empty");
					$(this).prevAll().removeClass("glyphicon-star-empty");
				}
			);
		});
	</script>
@stop