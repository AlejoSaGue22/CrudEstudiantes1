<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::paginate(5);
        return view('client.index')
             ->with('clients',$client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.form');
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
        'name' => 'required|max:25',
        'apell' => 'required|max:50',
        'edad' => 'required|max:20'
       ] );
        $client = Client::create($request->only('name','apell','edad'));

        Session::flash('mensaje', 'Registro creado con Exito');

       return redirect()->route('client.index');
       }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
       return view('client.form')
            ->with('clients', $client);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|max:25',
            'apell' => 'required|max:50',
            'edad' => 'required|max:20'
           ] );
           $client->name = $request['name'];
           $client->apell = $request['apell'];
           $client->edad = $request['edad'];
           $client->save();

           Session::flash('mensaje', 'Registro editado con Exito');

       return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        Session::flash('mensaje','Registro Eliminado con Exito');
        return redirect()->route('client.index');

    }

   
}
