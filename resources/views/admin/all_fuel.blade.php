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
    <h3>All Fuels</h3>
</div>
<div class="page-content">
    <div class="page-heading">

        <section class="section">
            <div class="card">

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Fuel Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allFuel as $fuel)
                                <tr>
                                    <td>{{ $fuel->id }}</td>
                                    <td>{{ $fuel->fuel_name }}</td>
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
