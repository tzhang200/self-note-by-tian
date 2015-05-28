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
        $validateMessages = [
            'captcha' => 'The captcha is not correct.',
        ];
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        //sending confirmation email
        $confirmationCode = str_random(30).Input::get('email');
        $this->user->email=Input::get('email');
        $this->user->password = Hash::make(Input::get('password'));
        $this->user->confirmcode = $confirmationCode;
        Mail::send('users.verify', ['confirmationCode'=>$confirmationCode], function($message) {
            $message->to(Input::get('email'), Input::get('email'))->subject('verify your email address');
        });
        $this->user->save();
        return Redirect::route('users.processregistration');

	}

    public function confirm($confirmationCode)
    {
        if ($confirmationCode == null)
        {
            return Redirect::route('users.processregistration');
        }
        //$user = User::WhereConfirmcode($confirmationCode)->first();
        $user = User::Where('confirmcode', '=', $confirmationCode)->first();
        if ($user == null)
        {
            return Redirect::route('users.processregistration');
        }
        $user->confirmed = 1;
        $user->confirmcode = null;
        $user->save();

        return Redirect::route('login');
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
