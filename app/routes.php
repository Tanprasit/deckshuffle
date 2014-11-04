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
	return View::make('news');
});

Route::resource('series', 'SeriesController');

Route::resource('login', 'LoginController');

Route::resource('market', 'MarketController');

Route::resource('card', 'CardController');

Route::resource('news', 'NewsController');

Route::resource('user', 'UserController');

Route::resource('comment', 'CommentsController');

Route::get('logout', function() {
	Auth::logout();
	return Redirect::to('/')
		->with('message', 'You have logged out');
});

Route::get('search', function() {
	$query = Input::get('search');
	$cards = DB::table('cards')->join('series', 'cards.series_id','=','series.id')->select('cards.id','cards.name','cards.unique_identifier', 'series.name as series_name', 'cards.type', 'level', 'power')->where('cards.name', 'LIKE', '%'.$query.'%')->get();
	return View::make('results')
		->with('cards', $cards);
});

Route::get('mini-search', function() {
	$query = Input::get('search');
	$cards = DB::table('cards')->join('series', 'cards.series_id','=','series.id')->select('cards.id','cards.name','cards.unique_identifier', 'series.name as series_name', 'cards.type', 'level', 'power')->where('cards.name', 'LIKE', '%'.$query.'%')->take(4)->get();
	return Response::json($cards);
});

// Route::get('', function ($id) {
// 	$cart = Session::get('cart', []);
// 	$cart[$id] = Model::find($id);
// 	Session::put('cart', $cart);
// });

// api end point js code will request this
// Route::get('api/v1/posts',[
// 	// return Response::json(['thing'=>'thing2']);
// 	'as' => 'api.post', 
// 	function() {
// 		if (rand(0.1)) {
// 			return Post::all();
// 		} else {
// 			return Response::json(['messages'=>['nooo!']],400);
// 		}

// 	}
// ]);
