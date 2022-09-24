<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::paginate(5);
        return view('client.index2')
             ->with('teachers',$teacher);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.formTea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameTeac' => 'required|max:25',
            'surnameTeac' => 'required|max:50',
            'emailTeac' => 'required|max:60',
            'cellTeac' => 'required|gte:10'
           ] );
            $teacher = Teacher::create($request->only('nameTeac','surnameTeac','emailTeac','cellTeac'));
    
            Session::flash('mensaje', 'Registro creado con Exito');
    
           return redirect()->route('Teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('client.formTea')
            ->with('teachers', $teacher);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'nameTeac' => 'required|max:25',
            'surnameTeac' => 'required|max:50',
            'emailTeac' => 'required|max:60',
            'cellTeac' => 'required|gte:10'
           ] );
           $teacher->nameTeac = $request['nameTeac'];
           $teacher->surnameTeac = $request['surnameTeac'];
           $teacher->emailTeac = $request['emailTeac'];
           $teacher->cellTeac = $request['cellTeac'];
           $teacher->save();

           Session::flash('mensaje', 'Registro editado con Exito');

       return redirect()->route('Teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        Session::flash('mensaje','Registro Eliminado con Exito');
        return redirect()->route('Teacher.index');
    }
}
