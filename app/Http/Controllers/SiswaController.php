<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();

        // return $data;
        return response()->json([
            "message" => "Load data success",
            "data" => $table
        ], 200);
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
        // $table = Siswa::create([
        //     "name" => $request->name,
        //     "gender" => $request->gender,
        //     "age" => $request->age
        // ]);

        $table = new Siswa();
        $table->name = $request->name;
        $table->gender = $request->gender;
        $table->age = $request->age;
        $table->save();
        
        // return $table;
        return response()->json([
            "message" => "Store success",
            "data" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Siswa::find($id);
        if($table){
            return $table;
        }else{
            return ['message' => "Data not found"];
        }
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
        $table = Siswa::find($id);
        if($table){
            $table->name = $request->name ? $request->name : $table->name;
            $table->gender = $request->gender ? $request->gender : $table->gender;
            $table->age = $request->age ? $request->age : $table->age;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Siswa::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete Success"];
        }else{
            return ["message" => "Data not found"];
        }
    }
}
