<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllDoctor()
    {
            $doctor=Doctor::all();
            return response()->json([
            'status'=>true,
            'doctor'=>$doctor,
        ]);
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
    public function insertDoctor(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'qualification'=>'required',
            'gender'=>'required',
            'birthdate'=>'required',
            'dapartement'=>'required',
        ]);

        $doctors=Doctor::create($data);

        return response()->json([
            'status'=>true,
            'message'=>'create doctor successfully !',
            'data'=>$doctors,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor,$id)
    {
        $doctors=Doctor::find($id)->first();
        return response()->json([
            'status'=>true,
            'message'=>'found!',
            'data'=>$doctors,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function updateDoctor(Request $request, Doctor $doctor,$id)
    {
        $data=$request->validate([
            'name'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'qualification'=>'required',
            'gender'=>'required',
            'birthdate'=>'required',
            'dapartement'=>'required',
        ]);
        $doctors=Doctor::find($id)->first();
        if($doctors){
            $doctors->update($data);
            return response()->json([
                'status'=>true,
                'message'=>'create doctor updated !',
                'data'=>$doctors,
            ]);
        }else{
            return response()->json([
                'status'=>true,
                'message'=>'create doctor !',
                'data'=>null,
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }

    public function voirPatient(){

    }
}
