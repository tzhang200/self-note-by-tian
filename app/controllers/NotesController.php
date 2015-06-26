<?php

class NotesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return "HELLO NOTES";
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return "HELLO NOTES";
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        return "Hello store";
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
        //return View::make('notes.show');
        $note = Note::where('email', '=', $id)->first();
        return View::make('notes.show')->with('note', $note);
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
        $input = Input::all();
        $rules = [
            'hlink1' => 'url',
            'hlink2' => 'url',
            'hlink3' => 'url',
            'hlink4' => 'url',
            'img1'   => 'max:600|mimes:jpeg,gif',
            'img2'   => 'max:600|mimes:jpeg,gif',
            'img3'   => 'max:600|mimes:jpeg,gif',
            'img4'   => 'max:600:mimes:jpeg,gif',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        $note = Note::where('email', '=', $id)->first();
       // $file1 = Input::file('img1');
       // $file2 = Input::file('img2');
       // $file3 = Input::file('img3');
       // $file4 = Input::file('img4');
        $imageDeleteIDs = array ('delImg1', 'delImg2', 'delImg3', 'delImg4');
        $imageFields = array('img1', 'img2', 'img3', 'img4');
        $note->notes = Input::get('notes');
        $note->tbd = Input::get('tbd');
        if (Input::get('hlink1')!= null)
            $note->hlink1 = Input::get('hlink1');
        $note->hlink2 = Input::get('hlink2');
        $note->hlink3 = Input::get('hlink3');
        $note->hlink4 = Input::get('hlink4');



        for ($i = 0; $i < count($imageFields); $i++)
        {
            if (Input::has($imageDeleteIDs[$i]))
            {
                $note->$imageFields[$i] = null;
                //$note->img1 = null;
                continue;
            }
            else
            {
                $imageFile = Input::file($imageFields[$i]);
                if ($imageFile != null)
                {
                    if ($imageFile->getSize() < 600000) {
                        $imageData = file_get_contents($imageFile->getPathname());
                        $imageBase64 = 'data:' . $imageFile->getClientMimeType() . ';base64,' . base64_encode($imageData);
                        $note->$imageFields[$i] = $imageBase64;
                    }

                }
            }
        }


        $note->save();
        return Redirect::back()->withInput();

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
