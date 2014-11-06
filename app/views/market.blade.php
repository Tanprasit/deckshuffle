@extends( 'master' )
@section( 'content' )
	<div class="col-md-12">
		<div class="page-header">
			<h1>Weiβ Schwarz <small>- Market</small></h1>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Categories</h3>
			</div>
			<div class="panel-body">
				<div class="checkBox"> 
					@foreach( $series as $series )
						<input type="checkbox" name="chosen_series" value="{{$series->id}}">
						{{ $series->name }}
						<br>
				@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="">List by Item</h4>
				<nav>
				  {{ $posts->links() }}
	  				<select class="sort" onChange="sortBy(this.value)">
						<option>Sort by Relevance</option>
						<option id="lowest"  value="lowest">Sort by Price - Lowest</option>
						<option id="highest" value="highest">Sort by Price - Highest</option>
						<option id="newest" value="newest">Sort by Condition - New First</option>
						<option id="used" value="used">Sort by Condition - Used First</option>
					</select>
				</nav>
			</div>
			<div class="panel-body">
				@foreach( $posts as $post )
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-2">
							<a class="market-link" href="{{asset('market/' . $post->id .'')}}">
								<img class="market-img  image-responsive center-block" src="{{asset('images/cards/'. $post->card_id . '.jpeg')}}">
							</a>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-10">	
							<h5><a href="{{asset('market/' . $post->id .'')}}">{{ $post->card->name . ' - ' }} {{ $post->card->unique_identifier }}</a></h5>
							<div class="row">
								<div class="col-sm-6">
									<ul class="post-list">
										<li>{{ $post->item_condition }}</li>
										<li>{{ $post->post_to }}</li>
										@if( $post->free_postage )
											<li>Free Postage</li>
										@endif
										@if( $post->returns )
											<li>Returns Accepted</li>
										@else
											<li>Returns Not Accepted</li>
										@endif
									</ul>
								</div>
								<div class="col-sm-6">
									<div class="col-xs-6 col-sm-12">
										<p class="price"><span class="smaller">£</span>{{ $post->card_price }}</p>
									</div>
									<div class="col-xs-6 col-sm-12">
										<button class="btn btn-pimary btn-success more-detail-btn market-button" onClick="location.href='{{asset('market/' . $post->id . '')}}'">More Detail</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-9 col-md-offset-3">
		<div class="well well-sm">
			<nav>
				{{ $posts->links() }}
			</nav>
		</div>
	</div>
@stop
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/sort.js') }}"></script>
<script type="text/javascript">
	$(function(){
		var type = '{{ $sortType }}';
	   if (type) {
	   		switch(type) {
	   			case 'highest':
	   				$('#highest').prop('selected', true);
	   				break;
	   			case 'lowest':
	   				$('#lowest').prop('selected', true);
	   				break;
	   			case 'newest':
	   				$('#newest').prop('selected', true);
	   				break;
   				case 'used':
	   				$('#used').prop('selected', true);
	   				break;
	   		}
	   }
	});
</script>
@stop