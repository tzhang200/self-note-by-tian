<?php

class SessionsController extends \BaseController {

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
        if (Auth::check())
        {
            return 'note page';
        }
        return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'confirmed' => 1
        ];
        if (Auth::attempt($credentials))
        {

            //return "Logged in as ". Auth::user()->email;
            //in case the note table not initialized yet for this user
            $note = Note::where('userid', '=', Auth::user()->id)->first();
            if ($note == null)
            {
                $note = new Note();
                $note->userid = $this->user->id;
                $note->email = $this->user->email;
                $note->notes = "";
                $note->tbd = "";
                $note->hlink1 = "";
                $note->hlink2 = "";
                $note->hlink3 = "";
                $note->hlink4 = "";
                $note->save();
            }
            return Redirect::route('notes.show', array(Auth::user()->email));
        }
        else
        {
            return View::make('sessions.processlogin');
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
	public function destroy()
	{
		//
        Auth::logout();
        return Redirect::route('login');
	}


}
