<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
     *
	 */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
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
        return View::make('users.create');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $input = Input::all();
        $this->user->fill($input);
        $this->user->email=Input::get('email');
        $this->user->password = Hash::make(Input::get('password'));

        if (!($this->user->isValid()))
        {
            return Redirect::back()->withInput()->withErrors($this->user->messages);
        }
        $this->user->save();
        return Redirect::route('users.processregistration');

	}

    public function forgotpassword()
    {
        //
        //return View::make('users.forgotpassword');
        return "hello";

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
	public function destroy($id)
	{
		//
	}


}
