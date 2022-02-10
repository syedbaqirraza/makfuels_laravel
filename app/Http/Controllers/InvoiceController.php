<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allInvoices=Invoice::all();
        return view('admin.list_invoice',compact('allInvoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.invoice');
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
            'invoice_file' => 'required|mimes:pdf,xlx,csv'
        ]);


        if ($request->hasFile('invoice_file'))
        {
            $image = $request->file('invoice_file');

            $image_name = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = base_path('public/files');
            $image->move($destinationPath, $image_name);
            $invoice = new Invoice([
                'invoice_type'      =>  $request->get('invoice_type'),
                'invoice_description'       =>  $request->get('invoice_description'),
                'invoice_file'=>$image_name
            ]);
            $invoice->save();
        }
        $message="Upload Invoice SuccessFully";
        return view('admin.invoice',compact('message'));

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
