<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\City;
use App\Province;

use App\Http\Requests\CityRequest;

use \Auth;

class CitiesController extends Controller {

	private $city;
	private $level;

	public function __construct(City $city)
	{
		$this->middleware('auth');

		$this->city = $city;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$cities = $this->city->get();

		return view('cities.index', compact('cities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$provinces = Province::lists('province_name', 'id');
		$provinces = array('' => '-- Pilih Provinsi --') + $provinces;

		return view('cities.create', compact('provinces'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CityRequest $request, City $city)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$city->create($request->all());

		\Session::flash('flash_message', 'New city has been Saved!');

		return redirect('cities');
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
	public function edit(City $city)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$provinces = Province::lists('province_name', 'id');
		$provinces = array('' => '-- Pilih Provinsi --') + $provinces;

		return view('cities.edit', compact('city', 'provinces'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, City $city)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$city->fill($request->input())->save();

		\Session::flash('flash_message', 'City has been Edited!');

		return redirect('cities');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(City $city)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$city->delete();

		\Session::flash('flash_message', 'City has been Deleted!');

		return redirect('cities');
	}

}
