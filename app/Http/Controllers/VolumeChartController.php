<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolumeChartController extends Controller
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
            ->select('clients.*','users.name','users.email','users.id as user_id')
            ->get();
        return view('admin.volumeChartClient',compact('clients'));
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
        Carbon::now()->format('MMM YYYY');
        $date=array('');
        $age = array(
            ["date"=>'1506882600000', "unit"=>'437'],
            ["date"=>'1507055400000', "unit"=>'137'],
            ["date"=>'1507141800000', "unit"=>'327'],
            ["date"=>'1507228200000', "unit"=>'357'],
            ["date"=>'1507314600000', "unit"=>'347'],
            ["date"=>'1507401000000', "unit"=>'378'],
            ["date"=>'1507487400000', "unit"=>'376'],
            ["date"=>'1507573800000', "unit"=>'375'],
            ["date"=>'1507660200000', "unit"=>'337'],
        );
        $data=json_encode($age);
        //  dd($data);
        // response()->json(['data'=>$data]);
        return view('admin.volumeChart',compact('data'));
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
    public function getJsonData()
    {
        $age = array(
            ['date'=>1506882600000,'units'=>437],
            ['date'=>1507055400000,'units'=>137],
            ['date'=>1507141800000,'units'=>327],
            ['date'=>1507228200000,'units'=>357],
            ['date'=>1507314600000,'units'=>347],
            ['date'=>1507401000000,'units'=>378],
            ['date'=>1507487400000,'units'=>376],
            ['date'=>1507573800000,'units'=>375],
            ['date'=>1507660200000,'units'=>337],
        );
        
        $data=$age;

       return response()->json($data);
    }
}
