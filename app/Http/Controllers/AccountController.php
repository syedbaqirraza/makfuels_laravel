<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
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
        return view('admin.account_client',compact('clients'));
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
        $name=auth()->user()->name;
        $user_name=strtoupper($name);
        return view('admin.account_chart',compact('id','user_name'));

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
    public function da()
    {
        $start="1";
        $end="12";
        $year="2022";
        $data=DB::table('invoices')
        ->join('users','invoices.user_id','users.id')
        ->join('fuels','invoices.fuel_id','fuels.id')
        ->whereYear('invoices.created_at','=',$year)
        ->whereMonth('invoices.created_at','>=',$start)
        ->whereMonth('invoices.created_at','<=',$end)
        ->select(
                DB::raw('sum(grand_total) as amount'),
                DB::raw('sum(total_gallon) as total_gallon'),
                DB::raw('MONTH(invoices.created_at) month')
            )
        ->groupby('month')
        ->get();
        dd($data);

    }
    public function getJsonData(Request $request)
    {

        $data=DB::table('invoices')
        ->join('users','invoices.user_id','users.id')
        ->join('fuels','invoices.fuel_id','fuels.id')
        ->where('invoices.created_at','>=',$request->dateRangeStart)
        ->where('invoices.created_at','<=',$request->dateRangeEnd)
        ->where('invoices.user_id',$request->uid)
        ->select('invoices.created_at','invoices.total_gallon','invoices.grand_total as amount','users.name','fuels.fuel_name')
        ->get();


        $dataMarge=array();
        foreach($data as $val)
        {
            $value=array();
            $datefc = $val->created_at;
            $date=date('M-d-Y', strtotime($datefc));
            $fule_date = $val->fuel_name." - ".$date;
            array_push($value,$fule_date,intval($val->total_gallon),intval($val->amount));
            array_push($dataMarge,$value);
        }
        return response()->json($dataMarge);
    }
}
