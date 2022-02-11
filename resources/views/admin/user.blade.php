@extends('layouts.admin')

@section('title')
<title>Makfuels Dashboard</title>
@endsection

@section('contents')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>All Users Listed Here </h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">

                    @if (isset($message))
                            <div class="alert alert-success">
                                <ul>

                                        <li>{{ $message }}</li>

                                </ul>
                            </div>
                        @endif
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>User Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->role=="admin")
                                @else
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        @if ($user->active==1)
                                            <td>
                                                <form action="{{ url('dashboard/'.$user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="{{ $user->active }}">
                                                    <button class="btn btn-success" type="submit">Active</button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <form action="{{ url('dashboard/'.$user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="{{ $user->active }}">
                                                    <button class="btn btn-danger" type="submit">Dactive</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
