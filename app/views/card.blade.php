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
		<div class="col-xs-6 col-md-offset-2 col-md-4 ">
			<label>Type</label>
			<span>:</span>
			<p class="card-value">{{$card->type}}</p>
		</div>
		<div class="col-xs-6 col-md-4 ">
			<label>Level</label>
			<span>:</span>
			<p class="card-value">{{$card->level}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-offset-2 col-md-4">
			<label>Color</label>
			<span>:</span>
			<p class="card-value">{{$card->colour}}</p>
		</div>
		<div class="col-xs-6  col-md-4">
			<label>Cost</label>
			<span>:</span>
			<p class="card-value">{{$card->cost}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-offset-2 col-md-4 ">
			<label>Tigger</label>
			<span>:</span>
			<p class="card-value">{{$card->trigger}}</p>
		</div>
		<div class="col-xs-6 col-md-4 ">
			<label>Traits</label>
			<span>:</span>
			<p class="card-value-alt">{{$card->traits}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-offset-2 col-md-4">
			<label>Power</label>
			<span>:</span>
			<p class="card-value">{{$card->power}}</p>
		</div>
		<div class="col-xs-6 col-md-4">
			<label>Soul</label>
			<span>:</span>
			<p class="card-value">{{$card->soul}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-offset-2 col-md-4">
			<label>Card Text/ Abilities</label>
			<span>:</span>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<p>{{$card->eng_text}}</p><br>
			@if ($card->jap_text2 != 'N/A')
				<p>{{$card->eng_text2}}</p>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-offset-2 col-md-8">
			<p>{{$card->jap_text}}</p><br>
			@if ($card->jap_text2 != 'N/A')
				<p>{{$card->jap_text2}}</p>
			@endif
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
	@if( $card->comments )
		<div class="col-sm-8 col-sm-offset-2">
			@foreach($card->comments as $post)
				<div class="row comment-box">
					<label>{{$post->author}}</label><br>
					<p>{{$post->comment}}</p><br>
				</div>
			@endforeach
		</div>
	@endif
@stop
@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.modal-dialog').css('width', '370px');
		});
	</script>
@stop