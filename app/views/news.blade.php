@extends('master')
@section('navbar')
	<ul class="nav navbar-nav">
		<li><a href="{{asset('news')}}">News</a></li>
		<li><a href="{{asset('series')}}">Series</a></li>
		<li><a href="{{asset('market')}}">Market</a></li>
	</ul>
@stop