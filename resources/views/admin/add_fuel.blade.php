@extends('layouts.admin')

@section('title')
<title>Makfuels Client</title>
@endsection

@section('contents')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center">ADD NEW FUEL TYPE</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success">
                                <ul>
                                    <li> {{ session('message') }}</li>
                                </ul>
                            </div>
                        @endif
                    <form action="{{ route('fuel.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="basicInput">Enter Fuel Name</label>
                            <input type="text" name="fuel_name" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button  type="submit" class="btn btn-success">Add Fuel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
