<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class Doctorscontroller extends Controller
{
    //

    public function listing(){

        return view('doctors.listing');

    }

    public function yajaralisting(Request $request){


        $sql= \App\Models\Doctors::select("*");


        return Datatables::of($sql)

              ->editColumn('id',function($data){
                  return $data->id;
                })
              ->editColumn('name',function($data){
                    return $data->name;
                })
              ->editColumn('position',function($data){
                    return $data->position;
                })
             ->editColumn('description',function($data){
                     return $data->description;
                    })
             ->editColumn('number',function($data){
                      return $data->number;
                    })
             ->editColumn('status',function($data){

                      if($data->status == 1){

                        return 'active';

                      }else{

                        return 'inactive';
                     }

                    })
             ->addColumn('action',function($data){

                        $string = '<a href="'.route('doctors.edit',$data->id).'">Edit </a> <a href="'.route('doctors.delete',$data->id).'">Delete </a> ';


                        return $string;



              })
              ->filter(function ($query) use ($request) {


              })
              ->rawColumns(['id','name','position','description','number','status','action'])
              ->make(true);
    }

    public function create(){

        return view('doctors.add');

    }


    public function savecreate(Request $request){

        $obj = new \App\Models\Doctors;
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->description = $request->description;
        $obj->number = $request->number;
        $obj->status = $request->status;

        $obj->save();

        return redirect()->route('doctors.listing');

    }

    public function edit($parameter){

        $editdata= \App\Models\Doctors::where('id', $parameter)->firstOrfail();

        return view('doctors.edit',compact('editdata'));
    }

  public function update(Request $request,$parameterid){

        $obj =  \App\Models\Doctors::where('id',$parameterid)->first();
        $obj->name = $request->name;
        $obj->position = $request->position;
        $obj->description = $request->description;
        $obj->number = $request->number;
        $obj->status = $request->status;

        $obj->save();

        return redirect()->route('doctors.listing');

    }

    public function delete($parameterId){

        $obj =  \App\Models\Doctors::where('id',$parameterId)->first();

        $obj->delete();

        return redirect()->route('doctors.listing');

    }

}
