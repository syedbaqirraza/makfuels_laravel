@extends('layouts.admin')

@section('title')
<title>Makfuels Invoice Upload</title>
@endsection

@section('contents')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header offset-3">
                <h4 class="card-title">Upload Invoice Form</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form method="POST" enctype="multipart/form-data" action="{{ url('invoice') }}">
                            @csrf
                        <div class="form-group">
                            <label for="basicInput">Select Invoice Type</label>
                            <select class="form-select" id="basicSelect" name="invoice_type">
                                <option value="">Choose</option>
                                <option value="eft">EFT</option>
                                <option value="loss_run_report">Loss Run Report</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="helpInputTop">Invoice Description</label>
                            <input type="text" class="form-control" id="helpInputTop" name="invoice_description">
                        </div>

                        <div class="form-group">
                            <label for="formFile" class="form-label">Select Invoice</label>
                            <input class="form-control" type="file" id="formFile" name="invoice_file">
                        </div>
                        <div class="buttons">
                            <button type="submit" class="btn btn-success">Upload</a>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (isset($message))
                            <div class="alert alert-success">
                                <ul>

                                        <li>{{ $message }}</li>

                                </ul>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
