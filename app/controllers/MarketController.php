<?php

class MarketController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = DB::table('posts')
			->join('cards', 'cards.id','=','posts.card_id')
			->join('users', 'users.id','=','posts.user_id')
			->select('posts.id','cards.id as card_id','cards.name','cards.unique_identifier', 'posts.item_condition', 'posts.item_location', 'posts.free_postage','posts.postage_cost', 'posts.post_to', 'posts.returns', 'posts.card_price', 'cards.jap_name', 'users.username')
			->paginate(10);

		// $posts = DB::table('posts')->take(10)->get();

		$series = Series::all();
		return View::make('market')
			->with('series', $series)
			->with('posts', $posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$post = Post::find($id);
		return View::make('post')
			->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function sortBy($sortBy) {
		$series = Series::all();

		if ($sortBy == "highest") {
			$posts = DB::table('posts')
				->join('cards', 'cards.id','=','posts.card_id')
				->join('users', 'users.id','=','posts.user_id')
				->select('posts.id','cards.id as card_id','cards.name','cards.unique_identifier', 'posts.item_condition', 'posts.item_location', 'posts.free_postage','posts.postage_cost', 'posts.post_to', 'posts.returns', 'posts.card_price', 'cards.jap_name', 'users.username')
				->orderBy('card_price', 'desc')
				->paginate(10);

				return View::make('market')
					->with('series', $series)
					->with('posts', $posts);
		} 
		elseif ($sortBy == "lowest") {
			$posts = DB::table('posts')
				->join('cards', 'cards.id','=','posts.card_id')
				->join('users', 'users.id','=','posts.user_id')
				->select('posts.id','cards.id as card_id','cards.name','cards.unique_identifier', 'posts.item_condition', 'posts.item_location', 'posts.free_postage','posts.postage_cost', 'posts.post_to', 'posts.returns', 'posts.card_price', 'cards.jap_name', 'users.username')
				->orderBy('card_price', 'asc')
				->paginate(10);

				return View::make('market')
					->with('series', $series)
					->with('posts', $posts);
		}

		elseif ($sortBy == "newest") {
			$posts = DB::table('posts')
					->join('cards', 'cards.id','=','posts.card_id')
					->join('users', 'users.id','=','posts.user_id')
					->select('posts.id','cards.id as card_id','cards.name','cards.unique_identifier', 'posts.item_condition', 'posts.item_location', 'posts.free_postage','posts.postage_cost', 'posts.post_to', 'posts.returns', 'posts.card_price', 'cards.jap_name', 'users.username')
					->orderBy('item_condition', 'asc')
					->paginate(10);

					return View::make('market')
						->with('series', $series)
						->with('posts', $posts);
		}

		elseif ($sortBy == "used") {
			$posts = DB::table('posts')
					->join('cards', 'cards.id','=','posts.card_id')
					->join('users', 'users.id','=','posts.user_id')
					->select('posts.id','cards.id as card_id','cards.name','cards.unique_identifier', 'posts.item_condition', 'posts.item_location', 'posts.free_postage','posts.postage_cost', 'posts.post_to', 'posts.returns', 'posts.card_price', 'cards.jap_name', 'users.username')
					->orderBy('item_condition', 'asc')
					->paginate(10);

					return View::make('market')
						->with('series', $series)
						->with('posts', $posts);
		}

		else {
			return App::abort(404);
		}
		
	}

}
