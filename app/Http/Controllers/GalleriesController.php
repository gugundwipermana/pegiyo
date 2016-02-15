<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Gallery;

class GalleriesController extends Controller {

	private $gallery;

	public function __construct(Gallery $gallery)
	{
		// harus login untuk dapat mengakses controoler ini
		$this->middleware('auth');

		$this->gallery = $gallery;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store(Request $request)
	{
		$this->validate($request, [
			'gallery_name'=>'required'
		]);

		$file = \Request::file('gallery_name');
		$event_id = \Input::get('event_id');

		$extension = $file->getClientOriginalExtension();

		$filename = str_random(5).'-gallery.'.$extension;


		$isifile = file_get_contents($file);

		$upload = file_put_contents('img_upload/galleries/'.$filename, $isifile);

		if($upload) {


			Gallery::create([
				'event_id' => $event_id,
				'gallery_name' => $filename
			]);

		}

		return redirect('events/'.$event_id.'/galleries');
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
	public function destroy(Request $request, Gallery $gallery)
	{
		$sponsor->delete();

		return redirect('events/'.$request->input('event_id').'/galleries');
	}

}
