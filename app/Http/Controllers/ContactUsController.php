<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ContactusData;
use App\Mail\ContactusMail;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::debug( $request);
        $validatedData = $request->validate([
          'name1' => 'required',
          'email1' => 'required',
          'phone1' => 'nullable',
          'r1_message' => 'required',
        ]);
        $maildata=array();
        $maildata['name']    		= $request->name1;
        $maildata['email'] 		=  $request->email1;
        $maildata['subject'] 		=  'Stakefield Contact-us';
        $maildata['phone'] 		=  $request->phone1;
        $maildata['message']		=  $request->r1_message;
           

        $data = new ContactusData;
        $data->name = $request->name1;
        $data->email = $request->email1;
        $data->phone = $request->phone1;
        $data->message = $request->r1_message;
        $res = $data->save();
        if($res) {
            Mail::send(new ContactusMail($maildata));
            return redirect('/')->with('status', 'Ajax Form Data Has Been validated and store into database');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
