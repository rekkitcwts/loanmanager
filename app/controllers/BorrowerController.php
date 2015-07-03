<?php
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class BorrowerController extends \BaseController {
	private $borrowers;

	public function __construct(BorrowerModel $borrowers) 
	{
        $this->borrowers = $borrowers;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//for index views of homeworks
		$borrower = new BorrowerModel;
		$borrowers = $borrower->all();
		return View::make('borrowers.index')->with('borrowers', $borrowers);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('borrowers.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'lname' => 'required',
        	'fname' => 'required',
        	'mname' => 'required',
        	'gender' => 'required',
        	'home_address' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) 
		{
			$input = [
				'lname' => Input::get('lname'),
        		'fname' => Input::get('fname'),
        		'mname' => Input::get('mname'),
        		'gender' => Input::get('gender'),
        		'home_address' => Input::get('home_address')
			];
			$borrower = new BorrowerModel;
			$borrower->add($input);
				
			Session::flash('message', 'Borrower successfully added.');
			return Redirect::to('borrowers');
		} 
		else 
		{
			return Redirect::to('borrowers/create')->with('message', 'Required fields are left blank.');
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
		if (Auth::user()) 
		{
			$results = Borrower::find($id);
			return View::make('borrowers.show')->with('borrower', $results);
		} 
		else 
		{
			return Redirect::to('/login')->with('message', 'Access denied.');
		}
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
		$borrower = new BorrowerModel;
		$rows = $borrower->delete($id);
		return $this->index();
	}


}
