<?php

namespace App\Http\Controllers;

use App\Models\Invoice as ModelsInvoice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Invoice;

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
        $now=Carbon::now()->format('Y-m-d');
        $daysInclude=Carbon::now()->subDays(30)->format('Y-m-d');
        $data=DB::table('invoices')
        ->join('users','invoices.user_id','users.id')
        ->join('fuels','invoices.fuel_id','fuels.id')
        ->whereBetween('invoices.created_at',[$daysInclude,$now])
        ->where('invoices.user_id',$id)
        ->select('invoices.created_at','invoices.total_gallon','invoices.grand_total as amount','users.name','fuels.fuel_name')
        ->get();

        $orders=array();
        foreach($data as $val)
        {
            $value=array();
            $datefc = $val->created_at;
            $date=date('M-d-Y', strtotime($datefc));
            $fule_date = $val->fuel_name." - ".$date;
            array_push($value,$fule_date,intval($val->total_gallon),intval($val->amount));
            array_push($orders,$value);
        }

        $name=auth()->user()->name;
        $user_name=strtoupper($name);
        return view('admin.volumeChart',compact('id','user_name','orders'));
    }
    public function fillterVolumeChart(Request $request)
    {
        $id=$request->uid;
        $daysInclude=date('Y-m-d',strtotime($request->startDate));
        $now=date('Y-m-d',strtotime($request->endDate));
        $data=DB::table('invoices')
        ->join('users','invoices.user_id','users.id')
        ->join('fuels','invoices.fuel_id','fuels.id')
        ->whereBetween('invoices.created_at',[$daysInclude,$now])
        ->where('invoices.user_id',$id)
        ->select('invoices.created_at','invoices.total_gallon','invoices.grand_total as amount','users.name','fuels.fuel_name')
        ->get();

        $orders=array();
        foreach($data as $val)
        {
            $value=array();
            $datefc = $val->created_at;
            $date=date('M-d-Y', strtotime($datefc));
            $fule_date = $val->fuel_name." - ".$date;
            array_push($value,$fule_date,intval($val->total_gallon),intval($val->amount));
            array_push($orders,$value);
        }
        $name=auth()->user()->name;
        $user_name=strtoupper($name);
        return view('admin.volumeChart',compact('id','user_name','orders'));
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
