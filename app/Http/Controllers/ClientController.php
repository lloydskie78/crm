<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CLientModel;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $clients = ClientModel::all();

        return view('clients', compact('clients'));

        // $clients = Request::get('clientdetails');
    
        // foreach($clients as $client){
        //     $client = [
        //         'agency_name' => $client->agency_name,
        //         'name' => $client->name,
        //         'number' => $client->number,
        //         'email' => $client->email,
        //         'msg_in' => $client->msg_in,
        //         'update' => $client->update    
        //     ];
        
        //     ClientModel::create($client);
        
        // }

    
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
        //
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
