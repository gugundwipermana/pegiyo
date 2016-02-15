<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\User;


use \Auth;

class UsersController extends Controller {

	private $user;

	private $level;

	public function __construct(User $user)
	{
		$this->middleware('auth');
		//kondisi bukan admin


		$this->user = $user;
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

		$users = $this->user->get();

		return view('users.index', compact('users'));
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

		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request, User $user)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$name = \Input::get('name');
		$email = \Input::get('email');
		$password = \Input::get('password');
		$contact = \Input::get('contact');
		$info = \Input::get('info');
		$level = \Input::get('level');
		$_token = \Input::get('_token');

		User::create([
			'name' => $name,
			'email' => $email,
			'password' => bcrypt($password),
			'contact' => $contact,
			'info' => $info,
			'level' => $level,

			'remember_token' => $_token
		]);

		\Session::flash('flash_message', 'New User has been Saved!');

		return redirect('users');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(User $user)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		return view('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, User $user)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$user->fill($request->input())->save();

		if(\Input::get('password') != null) {
			$user->password = bcrypt(\Input::get('password'));
			$user->save();
		}

		\Session::flash('flash_message', 'New User has been Edited!');

		return redirect('users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(User $user)
	{
		$this->level = Auth::user()->level;
		if($this->level == 1) {
			return redirect('events');
		}

		$user->delete();

		\Session::flash('flash_message', 'User has been Deleted!');

		return redirect('users');
	}

}
