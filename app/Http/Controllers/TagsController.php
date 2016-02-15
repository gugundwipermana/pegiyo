<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Tag;

use \Auth;

class TagsController extends Controller {

	private $tag;
	private $level;

	public function __construct(Tag $tag)
	{
		$this->middleware('auth');

		$this->tag = $tag;
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

		$tags = $this->tag->get();

		return view('tags.index', compact('tags'));
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

		return view('tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Tag $tag)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$tag->create($request->all());

		\Session::flash('flash_message', 'New categories has been Saved!');

		return redirect('tags');
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
	public function edit(Tag $tag)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		return view('tags.edit', compact('tag'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, Tag $tag)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$tag->fill($request->input())->save();

		\Session::flash('flash_message', 'Tag has been Edited!');

		return redirect('tags');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Tag $tag)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$tag->delete();

		\Session::flash('flash_message', 'Tag has been Deleted!');

		return redirect('tags');
	}

}
