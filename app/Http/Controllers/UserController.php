<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),true);

        return view('users.index')->with(['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        return 'Store a newly created resource in storage.';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),true);
    
        $users=$users[$id-1];
      return view ('users.show')->with(['users' => $users, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),true);
    
        $users=$users[$id-1];
      return view ('users.edit')->with(['users' => $users, 'id' => $id]);
        
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
        $request->all();
        dd($request->all());
        $users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),true);
        $users=$users[$id-1];
        return  print_r($users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $users = json_decode(\Illuminate\Support\Facades\File::get(storage_path('users.json')),true);       
        $user=$users[$id-1];
        unset($user);
            return "User deleted of id = " . $id;
    
    }
}