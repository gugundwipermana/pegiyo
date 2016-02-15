<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Event;
use App\City;
use App\User;
use App\Tag;
use \Input;

use App\Setting;

class DashboardController extends Controller {

	private $event;

	public function __construct(Event $event)
	{

		$this->event = $event;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = $this->event->get();

		$setting = Setting::first();

		$events_pro = Event::orderByRaw("RAND()")->where('type', '=', '2')->where('status', '=', '2')->take($setting->slide_front)->get();

		return view('dashboard.index', compact('events', 'events_pro'));
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
	public function show(Event $event)
	{
		$cities = City::lists('city_name', 'id');
		$cities = array('' => '-- Pilih Kota --') + $cities;

		$users = User::whereLevel('1')->lists('name', 'id');
		$users = array('' => '-- Pilih EO --') + $users;

		$tags = Tag::get();

		// related event
		$tag = Tag::first();
		$relateds = $tag->events()->whereStatus('2')->paginate(5);


		//return view('dashboard.show', compact('event'));

		$locations = $event->locations()->get();

		$loc1 = $event->locations()->first();



		if(count($locations) > 0 ) { // jika event sudah memiliki lokasi

			$config = array();
	    $config['center'] = ''.$loc1->latitude.', '.$loc1->longitude.''; // menampilkan map pada titik sesuai dengan data lokasi awal
	    $config['onboundschanged'] = 'if (!centreGot) {
	            var mapCentre = map.getCenter();
	            marker_0.setOptions({
	                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
	            });
	        }
	        centreGot = true;';

	    \Gmaps::initialize($config);

			$marker = array();

			foreach($locations as $loc) { // ambil semua lokasi dari event yang sudah ada

				$marker['position'] = ''.$loc->latitude.', '.$loc->longitude.'';
				$marker['infowindow_content'] = '<h3>'.$loc->name.'</h3>'.$loc->description;
				if($loc->type == '1') {
					$marker['icon'] = 'images/location.png';
				} elseif($loc->type == '2') {
					$marker['icon'] = 'images/hotel.png';
				} elseif($loc->type == '3') {
					$marker['icon'] = 'images/restourant.png';
				} elseif($loc->type == '4') {
					$marker['icon'] = 'images/lainnya.png';
				}


		    \Gmaps::add_marker($marker);

			}


		} else { // jika event belum memiliki lokasi satu pun

			$config = array();
	    $config['center'] = 'auto';
	    $config['onboundschanged'] = 'if (!centreGot) {
	            var mapCentre = map.getCenter();
	            marker_0.setOptions({
	                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
	            });
	        }
	        centreGot = true;';

	    \Gmaps::initialize($config);

		}



		$map = \Gmaps::create_map();

		$galleries = $event->galleries()->get();
		$sponsors = $event->sponsors()->orderBy('type', 'ASC')->get();

		$setting = Setting::first();

		return view('dashboard.show', compact('event', 'locations', 'map', 'galleries', 'sponsors', 'cities', 'users', 'tags', 'setting', 'relateds'));
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

	public function latest()
	{
		$cities = City::lists('city_name', 'id');
		$cities = array('' => '-- Pilih Kota --') + $cities;

		$users = User::whereLevel('1')->lists('name', 'id');
		$users = array('' => '-- Pilih EO --') + $users;

		$tags = Tag::get();

		$setting = Setting::first();

		$events_pro = Event::orderByRaw("RAND()")->where('type', '=', '2')->where('status', '=', '2')->take($setting->slide_inside)->get();

		$events = $this->event->latest('date_start')->unpublished()->whereStatus('2')->paginate($setting->paging);
		$events->setPath('');

		return view('dashboard.list', compact('events', 'cities', 'users', 'tags', 'events_pro', 'setting'));
	}

	public function oldest()
	{
		$cities = City::lists('city_name', 'id');
		$cities = array('' => '-- Pilih Kota --') + $cities;

		$users = User::whereLevel('1')->lists('name', 'id');
		$users = array('' => '-- Pilih EO --') + $users;

		$tags = Tag::get();

		$setting = Setting::first();

		$events_pro = Event::orderByRaw("RAND()")->where('type', '=', '2')->where('status', '=', '2')->take($setting->slide_inside)->get();

		$events = $this->event->latest('date_start')->published()->whereStatus('2')->paginate($setting->paging);
		$events->setPath('');

		return view('dashboard.list', compact('events', 'cities', 'users', 'tags', 'events_pro', 'setting'));
	}

	public function categories(Tag $tag)
	{
		$cities = City::lists('city_name', 'id');
		$cities = array('' => '-- Pilih Kota --') + $cities;

		$users = User::whereLevel('1')->lists('name', 'id');
		$users = array('' => '-- Pilih EO --') + $users;

		$tags = Tag::get();

		$setting = Setting::first();

		$events = $tag->events()->whereStatus('2')->paginate($setting->paging);
		$events->setPath('');

		return view('dashboard.categories', compact('events', 'cities', 'users', 'tags', 'tag', 'setting'));
	}

	public function search()
	{
		$cities = City::lists('city_name', 'id');
		$cities = array('' => '-- Pilih Kota --') + $cities;

		$users = User::whereLevel('1')->lists('name', 'id');
		$users = array('' => '-- Pilih EO --') + $users;

		$tags = Tag::get();

		$setting = Setting::first();

		$acara = Event::query();

		if(Input::has('title'))
		{
			$queryString = Input::get('title');
			$acara->where('title', 'like', "%$queryString%");
    }

		if(Input::has('date_start'))
		{
			$queryString = Input::get('date_start');
			$acara->where('date_start', '>=', "$queryString");
		}

		if(Input::has('date_end'))
		{
			$queryString = Input::get('date_end')." 24:00";
			$acara->where('date_end', '<=', "$queryString");
		}

		if(Input::has('user_id'))
		{
			$queryString = Input::get('user_id');
			$acara->where('user_id', '=', "$queryString");
    }

		if(Input::has('city_id'))
		{
			$queryString = Input::get('city_id');
			$acara->where('city_id', '=', "$queryString");
    }

		$events = $acara->whereStatus('2')->orderBy('date_start', 'DESC')->paginate($setting->paging);
		$events->setPath("");

		$data['title'] = Input::get('title');
		$data['date_start'] = Input::get('date_start');
		$data['date_end'] = Input::get('date_end');
		$data['user_id'] = Input::get('user_id');
		$data['city_id'] = Input::get('city_id');

		return view('dashboard.search', compact('events', 'data', 'cities', 'users', 'tags', 'setting'));
	}

}
