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
            $note = Note::where('email', '=', Auth::user()->email)->first();
            return View::make('notes.show')->with('note', $note);
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
            'confirmed' => 1,
            'locked' => 0
        ];
        if (Auth::attempt($credentials))
        {
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
            $user = User::where('email', '=', Input::get('email'))->first();
            if ($user != null && $user->locked == 1)
            {
                return View::make('users.process_lock');
            }
            if ($user != null && $user->confirmed == 1) {
                $user->attempts++;
                if ($user->attempts > 2) {
                    $user->locked = 1;
                    //sending password reset email
                    $randomPassword = str_random(6);
                    $user->password = Hash::make($randomPassword);
                    $confirmationCode = str_random(30).Input::get('email');
                    $user->confirmcode = $confirmationCode;
                    Mail::send('emails.auth.breakin_attempt', ['confirmationCode' => $confirmationCode, 'newPassword' => $randomPassword], function ($message) {
                        $message->to(Input::get('email'), Input::get('email'))->subject('Account Locked Notice');
                    });
                }
                $user->save();
            }
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
