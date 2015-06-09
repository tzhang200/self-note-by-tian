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
        //$this->user->fill($input);

        $validateMessages = [
            'captcha' => 'The captcha is not correct.',
        ];
        $validator = Validator::make($input, User::$rules, $validateMessages);
        /*
        if (!($this->user->isValid()))
        {
            return Redirect::back()->withInput()->withErrors($this->user->messages);
        }
        */
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        //sending confirmation email
        $confirmationCode = str_random(30).Input::get('email');
        $this->user->email=Input::get('email');
        $this->user->password = Hash::make(Input::get('password'));
        $this->user->confirmcode = $confirmationCode;
        Mail::send('emails.auth.verify', ['confirmationCode'=>$confirmationCode], function($message) {
            $message->to(Input::get('email'), Input::get('email'))->subject('verify your email address');
        });
        $this->user->save();
        //allocate a new note for the new user
        $note = Note::where('userid', '=', $this->user->id)->first();
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
        return View::make('users.process_registration_success',array('email'=>Input::get('email')));

	}

    public function confirm($confirmationCode)
    {
        if ($confirmationCode == null)
        {
            return View::make('users.process_registration');
        }
        $user = User::Where('confirmcode', '=', $confirmationCode)->first();
        if ($user == null)
        {
            return View::make('users.process_registration');
        }
        $user->confirmed = 1;
        $user->confirmcode = null;
        $user->save();

        return View::make('users.process_registration_confirm');
    }

    public function unlock($confirmationCode)
    {
        if ($confirmationCode == null)
        {
            return View::make('users.process_registration'); //TODO
        }
        $user = User::Where('confirmcode', '=', $confirmationCode)->first();
        if ($user == null)
        {
            return View::make('users.process_registration'); //TODO
        }
        $user->locked = 0;
        $user->confirmcode = null;
        $user->attempts = 0;
        $user->save();

        return View::make('users.process_unlock_confirm');
    }
    public function forgotpassword()
    {
        //
        return View::make('users.forgotpassword');

    }
    public function resetpassword()
    {
        $input = Input::all();
        $rules = ['email' => 'required|email|exists:users'];
        $validator = Validator::make($input, $rules);
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        //sending password reset email
        $randomPassword = str_random(6);
        $user = User::Where('email', '=', Input::get('email'))->first();;
        $user->password = Hash::make($randomPassword);
        //$user->confirmed = 0;  //user needs to re-confirm: TODO
        //$confirmationCode = str_random(30).Input::get('email');
        $confirmationCode = $user->confirmcode;

        Mail::send('emails.auth.reset', ['confirmationCode'=>$confirmationCode, 'newPassword'=>$randomPassword], function($message) {
            $message->to(Input::get('email'), Input::get('email'))->subject('Password Reset Notice');
        });
        $user->locked = 0;
        $user->attempts = 0;
        $user->save();
        return Redirect::route('processpassword');
    }

    public function processpassword()
    {
        return View::make('users.processpassword');
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
