@extends('layouts.admin')

@section('title')
<title>Makfuels Dashboard</title>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection
@section('script')
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection
@section('contents')
<div class="page-heading">
    <h3>All Invoices</h3>
</div>
<div class="page-content">
    <div class="page-heading">

        <section class="section">
            <div class="card">

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Invoice Type</th>
                                <th>Invoice Description</th>
                                <th>Invoice Created At</th>
                                <th>Fuel</th>
                                <th>Invoice Total</th>
                                <th>Total Gallons</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allInvoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->invoice_type }}</td>
                                    <td>{{ $invoice->invoice_description }}</td>
                                    <td>{{ $invoice->created_at }}</td>
                                    <td>{{ $invoice->fuel_name }}</td>
                                    <td>{{ $invoice->grand_total }}</td>
                                    <td>{{ $invoice->total_gallon }}</td>
                                    <td><button class="btn btn-success" onclick="window.location.href='{{ url('invoice/'.$invoice->id) }}'">view</button></td>
                                    {{-- @if ($user->active==1)
                                        <td><button class="btn btn-success" onclick="window.location.href='{{ route('/') }}'">Active</button></td>
                                    @else
                                        <td><button class="btn btn-danger" onclick="window.location.href='{{ route('/') }}'">Dactive</button></td>
                                    @endif --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>

@endsection
