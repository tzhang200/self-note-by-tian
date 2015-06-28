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
/*
        $rules = [
            'hlinks[0]' => 'url',
            'hlinks[1]' => 'url',
            'hlinks[2]' => 'url',
            'hlinks[3]' => 'url',
            'img1'   => 'max:600|mimes:jpeg,gif',
            'img2'   => 'max:600|mimes:jpeg,gif',
            'img3'   => 'max:600|mimes:jpeg,gif',
            'img4'   => 'max:600:mimes:jpeg,gif',
        ];
*/


        $links = Input::get('hlinks');
        $rules = $this->getFormRules($links);

        if (is_array($links)) {
            foreach($links as $key=>$val){
                $processedLinksArray['hlinks['.$key.']'] = $val;
            }
        }
        $validator = Validator::make($input, $rules);
        if ($validator->fails())
        {
            return Redirect::back()->withInput($processedLinksArray + Input::except('hlinks'))->withErrors($validator->messages());
        }

        $note = Note::where('email', '=', $id)->first();

        $imageDeleteIDs = array ('delImg1', 'delImg2', 'delImg3', 'delImg4');
        $imageFields = array('img1', 'img2', 'img3', 'img4');
        $note->notes = Input::get('notes');
        $note->tbd = Input::get('tbd');

        $validLinks = array_filter($links);
        $linkInString = implode('\t', $validLinks);
        $note->hlinks = $linkInString;
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
        //return Redirect::back()->withInput();
        return Redirect::back();

	}
    private function getFormRules($links)
    {
        $rules = [
            'img1'   => 'max:600|mimes:jpeg,gif',
            'img2'   => 'max:600|mimes:jpeg,gif',
            'img3'   => 'max:600|mimes:jpeg,gif',
            'img4'   => 'max:600|mimes:jpeg,gif',
        ];
        foreach($links as $key=>$val)
        {
            $rules['hlinks['.$key.']'] = 'active_url|url';
        }
        return $rules;
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
