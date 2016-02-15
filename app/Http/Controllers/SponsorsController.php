<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Sponsor;

class SponsorsController extends Controller {

	private $sponsor;

	public function __construct(Sponsor $sponsor)
	{
		// harus login untuk dapat mengakses controoler ini
		$this->middleware('auth');

		$this->sponsor = $sponsor;
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
			'image_name'=>'required',
			'sponsor_name'=>'required',
			'type' => 'required'
		]);

		$file = \Request::file('image_name');
		$sponsor_name = \Input::get('sponsor_name');
		$type = \Input::get('type');
		$event_id = \Input::get('event_id');

		$extension = $file->getClientOriginalExtension();

		$filename = str_random(5).'-'.str_slug($sponsor_name).'.'.$extension;


		$isifile = file_get_contents($file);

		$upload = file_put_contents('img_upload/sponsors/'.$filename, $isifile);

		if($upload) {


			Sponsor::create([
				'event_id' => $event_id,
				'image_name' => $filename,
				'sponsor_name' => $sponsor_name,
				'type' => $type
			]);

		}

		return redirect('events/'.$event_id.'/sponsors');
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
	public function destroy(Request $request, Sponsor $sponsor)
	{
		$sponsor->delete();

		return redirect('events/'.$request->input('event_id').'/sponsors');
	}

}
