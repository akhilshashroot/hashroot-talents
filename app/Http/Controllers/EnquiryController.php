<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validator;
use App\Models\EnquiryData;
use App\Models\StakefieldUser;
use Illuminate\Support\Facades\Log;
use App\Mail\EnquiryMail;
use Illuminate\Support\Facades\Mail;
class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        Log::debug( $request);
        $validatedData = $request->validate([
          'name' => 'required',
          'email' => 'required',
        ]);
   
        //$talent_id=StakefieldUser::find($request->idkl)->employee_id;
        $data=array();
        $data['name']    		= $request->name;
        $data['email'] 		=  $request->email;
        $data['subject'] 		=  'Talent Enquiry';
        $data['phone'] 		=  $request->phone;
        
        $user_ids=explode(",",$request->idkl);
        $talent_id=[];
        foreach($user_ids as $user_id){
          $talent_id[]=StakefieldUser::find( $user_id)->employee_id;

        }
        $save = new EnquiryData;
 
        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
       // $save->website = 'hashroot';
        $save->employee_id = implode(",      ",$talent_id);
        $save->save();
        $validated=[
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'website' => 'hashroot',
         'employee_id' =>  implode(",      ",$talent_id)
        ];
        $this->curl($validated);

      //  Log::info( $talent_id);

        $data['message']		=  'There is an enquiry for Talent Id -'.implode(",      ",$talent_id);
     //   try {
           Mail::send(new EnquiryMail($data));
          //  $er['stat'] = 1;
          //  $er['statusmsg'] = "Mail has been sent successfully!";     
          //  return response()->json($er);
           
     //     } catch (\Exception $e) {
                
  //          $er['stat'] = 0;
  //  $er['statusmsg'] = "Something went wrong! Please contact us at info@hashroot.com";
  //          return response()->json($er);

  //      }
        return redirect('/')->with('status', 'Ajax Form Data Has Been validated and store into database');
 
    }

    public function curl($request)
    {
        $fields_string  =  $request;
       // Log::info( "curlrequest",[$fields_string]);

        $header         = [
                            'Accept: application/json',
                            'Cache-Control: no-cache',
                          ];
       
            $url          = 'https://talents.stakefield.com/api/enquiry-add';
      
     
            $ch         = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response   = curl_exec($ch);
            curl_close ($ch);
       
    }
}
