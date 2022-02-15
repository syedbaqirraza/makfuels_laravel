<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients=DB::table('clients')
            ->join('users','clients.user_id','=','users.id')
            ->select('clients.*','users.*')
            ->get();
        return view('admin.client',compact('clients'));
    }

    public function client_chart()
    {
        return view('admin.client_chart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'location' => ['required'],
            'account_number' => ['required'],
            'address' => ['required'],
        ]);
        $password='12345678';
        $user_id=DB::table('users')->insertGetId([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>Hash::make($password),
            'role'=>'client',
            'active'=>'0',
        ]);
        if($user_id!=null)
        {
            DB::table('clients')->insert([
                'user_id'=>$user_id,
                'phone'=>$validatedData['phone'],
                'location'=>$validatedData['location'],
                'account_number'=>$validatedData['account_number'],
                'address'=>$validatedData['address'],
            ]);
        }
        $message="Add Client Successfully";
        return redirect()->route('client.create')->with('message',$message);

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
