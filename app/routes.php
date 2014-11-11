<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('news');
});

Route::get('/market/{sortBy}', [
	'as' => "sortedMarket",
	'uses' => 'MarketController@sortBy'
])->where('sortBy','[A-Za-z]+');

Route::resource('market', 'MarketController');

Route::resource('series', 'SeriesController');

Route::resource('login', 'LoginController');

Route::resource('card', 'CardController');

Route::resource('news', 'NewsController');

Route::resource('user', 'UserController');

Route::resource('comment', 'CommentsController');

// Routes that requires authentication before becoming viewable
Route::group(['before' => 'auth'], function(){
	// Has Auth Filter 
	Route::get('logout', function() {
		Auth::logout();
		return Redirect::to('news')
			->with('message', 'You have logged out');
	});
});

Route::get('search/cards/', function() {
	$query = Input::get('query');
	$cards = Card::where('cards.name', 'LIKE', '%'.$query.'%')->paginate(10);
	return View::make('results')
		->with('cards', $cards)
		->with('query', $query);
});

Route::get('/quicksearch/cards/', function() {
	$query = Input::get('query');
	$cards = DB::table('cards')->join('series', 'cards.series_id','=','series.id')->select('cards.id','cards.name','cards.unique_identifier', 'series.name as series_name', 'cards.type', 'level', 'power')->where('cards.name', 'LIKE', '%'.$query.'%')->take(4)->get();
	return Response::json($cards);
});

// Route::get('', function ($id) {
// 	$cart = Session::get('cart', []);
// 	$cart[$id] = Model::find($id);
// 	Session::put('cart', $cart);
// });
