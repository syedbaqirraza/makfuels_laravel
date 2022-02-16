<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allInvoices=DB::table('invoices')
        ->join('users','invoices.user_id','users.id')
        ->join('fuels','invoices.fuel_id','fuels.id')
        ->select('invoices.*','users.name as client_name','fuels.fuel_name as fuel_name')
        ->get();

        return view('admin.list_invoice',compact('allInvoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients=DB::table('clients')
        ->join('users','clients.user_id','=','users.id')
        ->select('clients.*','users.*')
        ->get();
        $allFuel=Fuel::all();
        return view('admin.invoice',compact('clients','allFuel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_type' => 'required',
            'invoice_description' => 'required',
            'invoice_file' => 'required|mimes:pdf,xlx,csv',
            'user_id' => 'required',
            'grand_total' => 'required',
            'fuel_id' => 'required'
        ]);


        if ($request->hasFile('invoice_file'))
        {
            $image = $request->file('invoice_file');

            $image_name = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = base_path('public/files');
            $image->move($destinationPath, $image_name);
            $invoice = new Invoice([
                'invoice_type'=>$request->get('invoice_type'),
                'invoice_description'=>$request->get('invoice_description'),
                'invoice_file'=>$image_name,
                'user_id'=>$request->get('user_id'),
                'grand_total'=>$request->get('grand_total'),
                'fuel_id'=>$request->get('fuel_id')
            ]);
            $invoice->save();
        }
        $message="Upload Invoice SuccessFully";
        return redirect()->route('invoice.create')->with('message',$message);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice=Invoice::find($id);
        $file=$invoice->invoice_file;
        return view('admin.show_invoice',compact('file'));
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
