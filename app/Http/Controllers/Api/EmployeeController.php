<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StakefieldUser;
use Illuminate\Support\Facades\Log;
use App\Models\EnquiryData;
use Illuminate\Support\Facades\Mail;
class EmployeeController extends Controller
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
    {   try{
        if( $request->userid) {
            $user =  StakefieldUser::where('id', $request->userid)->first();
        } else {
            $user = new StakefieldUser;
        }
       // dd($request->name);
      // Log::info( $request);
        $user->name = $request->name;
        $user->email =$request->email;
        $user->phone = $request->phone;
        $user->skill_set = preg_replace('/(?<!,) {2,}/', ' ', $request->skillset);
        $user->experience = $request->experience;
        $user->turnaround_time =$request->time;
        $user->availability = $request->availability;
        $user->rate = $request->rate;
        $user->employee_id = $request->talentid;
        $string= str_replace(' ', '',$request->skillset);
        $user->skill_data =$string;
        $user->comments =$request->comments;
        $user->ectc =$request->ectc;
        $res = $user->save();
     return response()->json([ 
            'status'	=> 'ok',
            'statuscode'    => '402',
            'message' => 'success',
        ]);
    } catch (\Exception $e){
        Log::debug($e->getMessage());

      return response()->json([ 
            'status'	=> 'ok',
            'statuscode'    => '402',
            'message' => 'failed',
        ]);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($talentid)
    {
        $employee = StakefieldUser::where('employee_id',$talentid)->first();
        return response()->json($employee, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MailTest()
    {
        Mail::send('welcome', [], function($message) {
            $message->to('akhil.s@hashroot.com')->subject('Testing mails'); 
        });
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
        dd($id);
    }

    
    public function enquiryAdd(Request $request)
    {
        $save = new EnquiryData;
 
        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->website =  $request->website;
        $save->employee_id = $request->employee_id;
        $save->save();
  
        return response()->json([ 
            'status'	=> 'ok',
            'statuscode'    => '402',
            'message' => 'success',
        ]);    
    
    }

    public function employeeDelete(Request $request)
    {
        StakefieldUser::find($request->id)->delete();
    
     
  
        return response()->json([ 
            'status'	=> 'ok',
            'statuscode'    => '402',
            'message' => 'success',
        ]);    
    
    }

}
