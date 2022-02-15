<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
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

        return view('admin.volumeChart');
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
        $student=array(
            array('student_name'=>"baqir",'marks'=>100),
            array('student_name'=>"hussain",'marks'=>200),
            array('student_name'=>"jaffar",'marks'=>11),
            array('student_name'=>"ali",'marks'=>13),
            array('student_name'=>"bilal",'marks'=>11),
            array('student_name'=>"zain",'marks'=>17),
            array('student_name'=>"haris",'marks'=>15),
        );
        $employee=array(
            array('student_name'=>"ad",'marks'=>313),
            array('student_name'=>"asda",'marks'=>515),
            array('student_name'=>"asda",'marks'=>645),
            array('student_name'=>"aasda",'marks'=>654),
            array('student_name'=>"asda",'marks'=>646),
            array('student_name'=>"asd",'marks'=>542),
            array('student_name'=>"ada",'marks'=>875),
        );




         return response()->json(['student'=>$student,'employee'=>$employee]);

    }
}
