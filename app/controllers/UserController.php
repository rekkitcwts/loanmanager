<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class UserController extends Controller {

	private $users;
 	 
 	public function __construct(UserModel $users) {
        $this->users = $users;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//for index views of users
		$users = User::all();
		
		return View::make('users.index')
			->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//load the create form (app/views/users/create.blade.php)
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//validate
		
		$rules = array(
			'username'		=>	'required|Unique:users',
			'password'		=>	'required',
			'role'			=>	'required'
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		//do again
		if ($validator->fails()){
			if ((Input::get('username') == null) || (Input::get('password') == null) || (Input::get('role') == null)) {
				Session::flash('message', 'Required field/s missing');
				return Redirect::to('users/create')
				->withInput(Input::except('password'));
			}
			else{
				
				//( empty( $_POST['email'] ) || ! is_string( $_POST['email'] ) ) {
				Session::flash('message', 'Invalid input type for email.');
				return Redirect::to('users/create')
				->withInput(Input::except('password'));
			}
		}
	
		
		else {
			//store
			$user = new User;
			$user->username		= Input::get('username');
			$user->password     = Hash::make(Input::get('password'));
			$user->role			= Input::get('role');
			$user->save();

			
			
			return Redirect::to('index')->with('message', 'Account created.');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return View::make('users.show')->with('friend',$user);
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


}
