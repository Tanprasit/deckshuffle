extends('master')
section('content')
<section>
	<div class="row">
		@foreach($cards as $card)
			<img src="{{asset('images/cards/$card->id.jpeg')}}">
		@endforeach
	</div>
</section>
@stop