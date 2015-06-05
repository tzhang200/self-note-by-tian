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
        //TODO: validation
        $note = Note::where('email', '=', $id)->first();
        $file1 = Input::file('img1');
        $file2 = Input::file('img2');
        $file3 = Input::file('img3');
        $file4 = Input::file('img4');
        $note->notes = Input::get('notes');
        $note->tbd = Input::get('tbd');
        $note->hlink1 = Input::get('hlink1');
        $note->hlink2 = Input::get('hlink2');
        $note->hlink3 = Input::get('hlink3');
        $note->hlink4 = Input::get('hlink4');
        if ($file1 != null)
        {
            /*
           // $tmpName = $file1->
            $tmpName = $file1->getPathname();
            $fp = fopen($tmpName, 'r');
            $data = fread($fp, filesize($tmpName));
            $data = addslashes($data);
            fclose($fp);
            $note->img1 = $data;
            */
           // $type = pathinfo($file1->getPathname(), PATHINFO_EXTENSION );
            $data = file_get_contents($file1->getPathname());
            $base64 = 'data:' . $file1->getClientMimeType() . ';base64,' . base64_encode($data);
            $note->img1 = $base64;
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
