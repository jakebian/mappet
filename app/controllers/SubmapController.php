<?php

class SubmapController extends BaseController {
	public static function findByID($id){
		return Submap::where('id','=',$id)->first();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('submaps.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('submaps.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$name=$_POST['name'];
		$desc=$_POST['desc'];

		$submap=Post::create(array(
			'name'=>$name,
			'desc'=>$desc,
		));

		return $submap;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('submaps.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('submaps.edit');
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

		$submap=static::findByID($id);
		$submap->update(array(
			'name'=>$name,
			'desc'=>$desc,
		));

		return $submap;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$submap=static::findByID($id);
		$submap->delete();
	}

}
