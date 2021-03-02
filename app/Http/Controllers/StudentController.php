<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;
use Session;

class StudentController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'firstname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'form' => 'required',
            'form_class' => 'required',
        ]);

        auth()->user()->student()->create($data);
        Session::flash('alert-success', 'Successfully Added New Student: '.$data['firstname']);
        return redirect()->back();
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
        $student = Student::find($id);
        return view('edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = request()->validate([
            'firstname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'form' => 'required',
            'form_class' => 'required',
        ]);
        Student::where('id', $id)->update($data);
        Session::flash('alert-success', 'Successfully Updated Student Details of Admission Number '.$id);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id', $id)->delete();
        Session::flash('alert-success', 'Successfully Deleted Student with Admission Number '.$id);
        return redirect()->back();
    }
}
