<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Setting;

use App\Http\Requests\SettingRequest;

use \Auth;

class SettingsController extends Controller {

	private $setting;
	private $level;

	public function __construct(Setting $setting)
	{
		// harus login untuk dapat mengakses controoler ini
		$this->middleware('auth');

		$this->setting = $setting;
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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Setting $setting)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		return view('settings.edit', compact('setting'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(SettingRequest $request, Setting $setting)
	{
		$setting->fill($request->input())->save();

		\Session::flash('flash_message', 'Setting has been Edited!');

		return redirect('events');
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

}
