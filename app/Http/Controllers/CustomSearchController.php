<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\StakefieldUser;
use DataTables;
use Illuminate\Support\Facades\Log;

class CustomSearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            Log::debug($request->order[0]['column']); 
            if($request->order[0]['column']==0){
              $col='updated_at';
              $dec='desc';
            }elseif($request->order[0]['column']==1){
              $col='employee_id';
              $dec=$request->order[0]['dir'];
            }elseif($request->order[0]['column']==2){
                $col='skill_set';
                $dec=$request->order[0]['dir'];
            }elseif($request->order[0]['column']==3){
                $col='experience';
                $dec=$request->order[0]['dir'];
            }elseif($request->order[0]['column']==4){
                $col='turnaround_time';
                $dec=$request->order[0]['dir'];
            }elseif($request->order[0]['column']==5){
                $col='availability';
                $dec=$request->order[0]['dir'];
            }elseif($request->order[0]['column']==6){
                $col='rate';
                $dec=$request->order[0]['dir'];
            }
           
          
            $data = StakefieldUser::select( 'stakefield_users.id','stakefield_users.availability','stakefield_users.employee_id',
            'stakefield_users.experience','stakefield_users.turnaround_time','stakefield_users.skill_set',
            'stakefield_users.rate','stakefield_users.skill_data'
            )
            ->orderby($col,$dec);
            return Datatables::of($data)
                    ->addIndexColumn()
                    
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('approved')) && !empty($request->get('search'))) {
                            $search = $request->get('search');
                            $instance->where($request->get('approved'),'LIKE', "%$search%");
                        }
                        if (!empty($request->get('search')) && empty($request->get('approved'))) {
                            if (strpos($request->get('search'), ',') !== false) {
                                $new_variable= str_replace(' ', '',$request->get('search'));
                               }else{
                                $new_variable= str_replace(' ', ',',$request->get('search'));
                               }
                             $searches= explode(",",$new_variable);                            //Log::debug(count($searches));

                            // foreach($searches as $searcher){
                             $instance->where(function($w) use($request,$searches){
                                $search = $request->get('search');
                                $w->orWhere('employee_id', 'LIKE', "%$search%");
                              //$w->Where('skill_data', 'LIKE', "%$searches[0]%");
                                for($i=0;$i<count($searches);$i++){
                                    Log::debug($i);
                                $w->orWhere(function($ws) use($searches,$i){
                                    $ws->Where('skill_data', 'LIKE', "%$searches[0]%");
                                    if(count($searches)==2){
                                        $ws->Where('skill_data', 'LIKE', "%$searches[1]%");

                                    }

                                    if(count($searches)==3){
                                        $ws->Where('skill_data', 'LIKE', "%$searches[2]%");

                                    }    if(count($searches)==4){
                                        $ws->Where('skill_data', 'LIKE', "%$searches[3]%");

                                    }    if(count($searches)==5){
                                        $ws->Where('skill_data', 'LIKE', "%$searches[4]%");

                                    }    if(count($searches)==6){
                                        $ws->Where('skill_data', 'LIKE', "%$searches[5]%");

                                    }    if(count($searches)==7){
                                        $ws->Where('skill_data', 'LIKE', "%$searches[6]%");

                                    }    if(count($searches)==8){
                                        $ws->Where('skill_data', 'LIKE', "%$searches[7]%");

                                    }    if(count($searches)==9){
                                        $ws->Where('skill_data', 'LIKE', "%$searches[8]%");

                                    }    if(count($searches)==10){
                                        $ws->Where('skill_data', 'LIKE', "%$searches[9]%");

                                    }
                              });
                            }
                              $w->orWhere('experience', 'LIKE', "%$search%")
                                ->orWhere('turnaround_time', 'LIKE', "%$search%")
                                ->orWhere('availability', 'LIKE', "%$search%")
                                ->orWhere('rate', 'LIKE', "%$search%");
                            });
                      //  }
                        }
                    })    
                    ->addColumn('action', function($row){
  
                        $btn = '<a  class="btn btn-primary btn-sm checker" id=add-'.$row['id'].' style="color: #fff;" data-id='.$row['id'].' >Add</a>
                        <a  class="btn btn-primary btn-sm remover" id='.$row['id'].' style="color: #fff;display:none;" data-id='.$row['id'].' >Remove</a>';
                        //   $btn='<input type="checkbox" class="checkbox-change" data-id='.$row['employee_id'].' id="buttonID" onchange="valueChanged()" name="enquiry" value='.$row['employee_id'].'>';
                         return $btn;
                 })
               
                 ->rawColumns(['action'])
                    ->make(true);


        }
        
     
     return view('stakefield.stakefield');
    }
}

