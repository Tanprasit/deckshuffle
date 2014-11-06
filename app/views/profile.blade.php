@extends( 'master' )
@section( 'content' )
<!-- Nav tabs -->
<ul class="nav nav-tabs col-md-8 col-md-offset-2" role="tablist">
	<li role="presentation" class="active"><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
	<li role="presentation"><a href="#myMarket" role="tab" data-toggle="tab">Market</a></li>
	@if( Auth::user()->id == $user->id )
		<li role="presentation"><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
	@endif
	@if( Auth::user()->id == $user->id )
		<li role="presentation"><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
	@endif
</ul>

<!-- Tab panes -->
<div class="tab-content col-md-8 col-md-offset-2">
	<div role="tabpanel" class="tab-pane active" id="profile">
		<div class="col-md-2">
			<img class="img-circle profile-img" src="{{ asset('images/users/1.jpeg') }}">
		</div>
		<div class="col-md-10">
			<div>
				<h1>{{{ $user->username }}}</h1>
			</div>
			<div>
				<table class="table">
					<tr>
						<td>Last Online</td>
						@if (Auth::user()->id == $user->id)
							<td>Now</td>
						@else
							<td>{{{ $user->updated_at->diffForHumans() }}}</td>
						@endif
					</tr>
					<tr>
						<td>Email</td>
						<td>{{{ $user->email }}}</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>Male</td>
					</tr>
					<tr>
						<td>Joined</td>
						<td>{{{ date("d F Y",strtotime($user->created_at)) }}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
<div role="tabpanel" class="tab-pane" id="myMarket">
		<table class="table">
			@foreach( $posts as $post )
				@if ($post->buyer_id != 0)
					<tr class="alert alert-success">
				@else
					<tr class="alert alert-danger">
				@endif
						<td><img class="profile-card-img  image-responsive center-block" src="{{asset('images/cards/'. $post->card->id . '.jpeg')}}"></td>
						<td>
							<table class="table">
								<tr>
									<td>Price</td>
									<td>£{{ $post->card_price }}</td>
								</tr>
								<tr>
									<td>Condition</td>
									<td>{{ $post->item_condition }}</td>
								</tr>
								<tr>
									<td>Postage</td>
									@if( $post->free_postage )
										<td>Free Postage</td>
									@else
										<td>{{ $post->postage_cost }}</td>
									@endif
								</tr>
							</table>
						</td>
					</tr>
			@endforeach
		</table>
		<nav>
			{{ $posts->links() }}
		</nav>
	</div>
	@if( Auth::user()->id == $user->id )
		<div role="tabpanel" class="tab-pane" id="messages">Future Updates</div>
	@endif
	@if( Auth::user()->id == $user->id )
		<div role="tabpanel" class="tab-pane" id="settings">Future Updates</div>
	@endif
</div>
@stop