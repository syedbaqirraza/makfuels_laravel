@extends('layouts.admin')

@section('title')
<title>Makfuels Client</title>
@endsection

@section('contents')

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center">ADD NEW CLIENT</h4>
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
                    <form action="{{ route('client.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="basicInput">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="enter client name">
                        </div>
                        <div class="form-group">
                            <label for="helpInputTop">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="enter client email">
                        </div>
                        <div class="form-group">
                            <label for="helperText">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="enter client phone">
                        </div>
                        <div class="form-group">
                            <label for="helperText">Location</label>
                            <input type="text" name="location" class="form-control" placeholder="enter client location name">
                        </div>
                        <div class="form-group">
                            <label for="helperText">Account Number</label>
                            <input type="text" name="account_number" class="form-control" placeholder="enter client account number">
                        </div>
                        <div class="form-group">
                            <label for="helperText">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="enter client address">
                        </div>
                        <div class="form-group text-center">
                            <button  type="submit" class="btn btn-success">Add Client</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
