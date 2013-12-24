<?php

class PlaceController extends BaseController {
	public static function findByID($id){
		return Place::where('id','=',$id)->first();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('places.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('places.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$name=$_POST['name'];
		$desc="";
		$desc=$_POST['desc'];
		$latitude=$_POST['latitude'];
		$longitude=$_POST['longitude'];
		$score=0;
		$user_id=$_POST['user_id'];
		$submap_id=$_POST['submap_id'];

		$place=Post::create(array(
				'name'=>$name,
				'desc'=>$desc,
				'latitude'=>$latitude,
				'longitude'=>$longitude,
				'score'=>$score,
				'user_id'=>$user_id,
				'submap_id'=>$submap_id,
		));

		return $place;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('places.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('places.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$name=$_POST['name'];
		$desc=$_POST['desc'];
		$latitude=$_POST['latitude'];
		$longitude=$_POST['longitude'];
		$score=0;
		$user_id=$_POST['user_id'];
		$submap_id=$_POST['submap_id'];

		$place=static::findByID($id);

		$place->update(array(
				'name'=>$name,
				'desc'=>$desc,
				'latitude'=>$latitude,
				'longitude'=>$longitude,
				'score'=>$score,
				'user_id'=>$user_id,
				'submap_id'=>$submap_id,
		));
		return $place;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$place=static::findByID($id);
		$place->delete();
	}

}
