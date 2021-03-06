<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\ClientModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients = ClientModel::all();
        return view('clients', compact('clients'));
    }

    public function contactCount()
    {
        $conCount = ClientModel::count();
        return view('dashboard', compact('conCount'));
    }

    public function fileImport(Request $request)
    {
        try {
            if ($request->input('submit') != null) {
                $file = $request->file('customFile');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                
                // Valid File Extensions
                $valid_extension = array("csv");
                // Check file extension
                if (in_array(strtolower($extension), $valid_extension)) {

                    // File upload location
                    $location = 'uploads';

                    // Upload file
                    $file->move($location, $filename);

                    // Import CSV to Database
                    $filepath = public_path($location . "/" . $filename);
                    
                    // Reading file
                    $file = fopen($filepath, "r");
                    $importData_arr = array();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    // Insert to MySQL database
                    foreach ($importData_arr as $importData) {
                        $insertData = array(
                            "agency_name" => $importData[0],
                            "name" => $importData[1],
                            "number" => $importData[2],
                            "email" => $importData[3],
                            "msg_in" => $importData[4],
                            "update" => $importData[5]
                        );
                        ClientModel::create($insertData);
                    }
                    Session::flash('message', 'Import Successful.');
                } else {
                    Session::flash('message', 'Invalid File Extension.');
                }
            }
            return redirect()->action('ClientController@index');
                
            } catch (Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){

                    $error = "Duplicate entry! Check file first.";
                    return view('clients', ['error' => $error]);

                }
                
            }
        
    }


    /**w
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client = new ClientModel;
        $client->agency_name = $request->input('agency-name');
        $client->name = $request->input('first-name');
        $client->number = $request->input('number');
        $client->email = $request->input('email');
        $client->msg_in = $request->input('msg_in');
        $client->update = $request->input('update');
        $client->save();
        return redirect()->action('ClientController@index');
       
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
    public function edit(Request $request, $id)
    {
        

            $db = ClientModel::find($id);
        
            $array = [
                'agency_name' => $request->input('agency_name'),
                'name' => $request->input('name'),
                'number' => $request->input('number'),
                'email' => $request->input('email'),
                'msg_in' => $request->input('msg_in'),
                'update' => $request->input('update'),
            ];

            $db->update($array);
        
            return redirect()->action('ClientController@index');

        
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
        try {
            $db = ClientModel::find($id);

            $db->delete();
        } catch (\Exception $err) {
            DB::rollBack();
        }
    }
}
