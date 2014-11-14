<?php

class MarketController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('user','card')->paginate(10);
		$sortType = '';
		
		$series = Series::all();

		return View::make('market')
			->with('series', $series)
			->with('posts', $posts)
			->with('sortType', $sortType);
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

		switch ($sortBy) {
			case 'highest':
				$posts = Post::with('user','card')->orderBy('card_price', 'desc');
				$sortType = 'highest';
				break;
			case 'lowest':
				$posts = Post::with('user','card')->orderBy('card_price', 'asc');
				$sortType = 'lowest';
				break;
			case 'newest':
				$posts = Post::with('user','card')->orderBy('item_condition', 'asc');
				$sortType = 'newest';
				break;
			case 'used':
				$posts = Post::with('user','card')->orderBy('item_condition', 'desc');
				$sortType = 'used';
				break;
			default:
				$posts = Post::with('user','card')->orderBy('updated_at', 'asc');
				break;
		}

		$posts = $posts->paginate(10);

		return View::make('market')
						->with('series', $series)
						->with('posts', $posts)
						->with('sortType', $sortType);
	}

}
