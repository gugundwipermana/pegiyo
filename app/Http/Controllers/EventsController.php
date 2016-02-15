<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Event;
use App\City;
use App\Tag;
use \Auth;

use App\Http\Requests\EventRequest;

class EventsController extends Controller {

	private $event;
	private $level;

	public function __construct(Event $event)
	{
		// harus login untuk dapat mengakses controoler ini
		$this->middleware('auth');

		$this->event = $event;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$events = $this->event->get();
		//$events = Auth::user()->events()->get();

		$this->level = Auth::user()->level;
		if($this->level == 1) {
			$events = Auth::user()->events()->get();
		} elseif($this->level == 2) {
			$events = $this->event->get();
		}

		$page = 'index';

		return view('events.index', compact('events', 'page'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$cities = City::lists('city_name', 'id');
		
		$tags = Tag::lists('name', 'id');

		return view('events.create', compact('cities', 'tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EventRequest $request)
	{
		$this->validate($request, [
			'banner' => 'required'
		]);

		$title = \Input::get('title');
		$contents = \Input::get('contents');
		$date_start = \Input::get('date_start');
		$date_end = \Input::get('date_end');
		$location = \Input::get('location');
		$city_id = \Input::get('city_id');
		$video = 'example_video.mp4';
		$banner = 'example_banner.jpg';
		$type = \Input::get('type');
		if($type == '1') {
			$status = '2';
		} else {
			$status = '1';
		}

		if (\Input::hasFile('banner'))
		{
		    $file = \Input::file('banner');

				$isifile = file_get_contents($file);
				$upload = file_put_contents('img_upload/banner/'.$file->getClientOriginalName(), $isifile);

		    $file->move('img_upload', $file->getClientOriginalName());

		    $image = \Image::make(sprintf('img_upload/%s', $file->getClientOriginalName()))->resize(300, 200)->save();

				$banner = $file->getClientOriginalName();
		}

		$event = Auth::user()->events()->create([
			'title' => $title,
			'contents' => $contents,
			'date_start' => $date_start,
			'date_end' => $date_end,
			'location' => $location,
			'city_id' => $city_id,
			'video' => $video,
			'banner' => $banner,
			'type' => $type,
			'status' => $status
		]);

		//$event = Auth::user()->events()->create($request->all());

		$event->tags()->attach($request->input('tag_list'));

		\Session::flash('flash_message', 'New Event has been Saved!');


		//return redirect('events');

		return redirect('events/'.$event->id.'/locations');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Event $event)
	{
		return view('events.show', compact('event'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Event $event)
	{
		$cities = City::lists('city_name', 'id');

		$tags = Tag::lists('name', 'id');

		return view('events.edit', compact('event', 'cities', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EventRequest $request, Event $event)
	{
		$event->fill($request->input())->save();

		$event->tags()->sync($request->input('tag_list'));

		\Session::flash('flash_message', 'Event has been Edited!');

		return redirect('events');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Event $event)
	{
		$event->delete();

		\Session::flash('flash_message', 'Event has been Deleted!');

		return redirect('events');
	}

	/**
	 * Form location in this Event. you can insert new location and delete old location
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function locations(Event $event)
	{
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
					$marker['icon'] = '../../images/location.png';
				} elseif($loc->type == '2') {
					$marker['icon'] = '../../images/hotel.png';
				} elseif($loc->type == '3') {
					$marker['icon'] = '../../images/restourant.png';
				} elseif($loc->type == '4') {
					$marker['icon'] = '../../images/lainnya.png';
				}


		    \Gmaps::add_marker($marker);

			}

			$marker['position'] = ''.$loc1->latitude.', '.$loc1->longitude.'';
			$marker['draggable'] = true;
			$marker['ondragend'] = 'getLatLng(event.latLng.lat(), event.latLng.lng());';

			$marker['icon'] = '../../images/add.png';
			\Gmaps::add_marker($marker);
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

			$marker['position'] = '-6.189452962523724, 106.82347580761711'; // posisi awal di set jakarta
			$marker['draggable'] = true;
			$marker['ondragend'] = 'getLatLng(event.latLng.lat(), event.latLng.lng());';

			$marker['icon'] = '../../images/add.png';
			\Gmaps::add_marker($marker);

		}



		$map = \Gmaps::create_map();

		return view('events.locations', compact('event', 'locations', 'map'));
	}

	public function sponsors(Event $event) {
		$sponsors = $event->sponsors()->get();

		return view('events.sponsors', compact('event', 'sponsors'));
	}

	public function galleries(Event $event) {
		$galleries = $event->galleries()->get();

		return view('events.galleries', compact('event', 'galleries'));
	}

	public function validasi()
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$events = $this->event->whereStatus('1')->get();

		$count = $this->event->whereStatus('1')->count();

		$page = 'validasi';

		return view('events.index', compact('events', 'page', 'count'));
	}

	public function updatestatus(Request $request, Event $event)
	{
		$event->fill($request->input())->save();

		return redirect('events');
	}

}
