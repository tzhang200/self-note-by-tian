<?php

class AboutController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('about.contact');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        //email to admin
        Mail::send('emails.contact',
                array(
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'user_message' => Input::get('message')
                ), function($message)
            {
               $message->to('tzcomp2920@gmail.com', 'Admin')->subject('Self Note Feedback');
        });

        //confirm email to user
        Mail::send('emails.confirm',
            array(
                'user_message' => Input::get('message')
            ), function($message)
            {
                $message->to(Input::get('email'), Input::get('name'))->subject('Contact Self Note');
            });
        return Redirect::route('contact')->with('message', 'Thanks for contacting us!');
	}

}
