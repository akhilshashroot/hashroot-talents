<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryData;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = EnquiryData::orderBy('id','desc')->get();
        return view('enquirylist',compact('enquiries'));
    }
}
