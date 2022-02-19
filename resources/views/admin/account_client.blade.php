@extends('layouts.admin')

@section('title')
<title>Makfuels client</title>
@endsection

@section('contents')

<section class="row">
    <div class="col-12 col-lg-12">
        <div class="row">
            @foreach ($clients as $client)
                <div class="col-4 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="avatar avatar-md">
                                <img class="text-center" src="assets/images/faces/2.jpg">
                            </div>
                            <h4 class="text-center mt-1">{{ $client->name }}</h4>
                        </div>
                        <div class="card-body mb-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <tbody>
                                        <hr class="m-0">
                                        <tr class="border-bottom">
                                            <td class="col-12 pt-1 pb-1">
                                                <div class="d-inline-block align-items-center">
                                                    <p class="font-bold  mb-0">Email</p>
                                                </div>
                                                <p class=" mb-0">{{ $client->email }}</p>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="col-12 pt-1 pb-1">
                                                <div class="d-inline-block align-items-center">
                                                    <p class="font-bold  mb-0">phone</p>
                                                </div>
                                                <p class=" mb-0">{{ $client->phone }}</p>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="col-12 pt-1 pb-1">
                                                <div class="d-inline-block align-items-center">
                                                    <p class="font-bold  mb-0">Location</p>
                                                </div>
                                                <p class=" mb-0">{{ $client->location }}</p>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="col-12 pt-1 pb-1">
                                                <div class="d-inline-block align-items-center">
                                                    <p class="font-bold  mb-0">Account Number</p>
                                                </div>
                                                <p class=" mb-0">{{ $client->account_number }}</p>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="col-12 pt-1 pb-1">
                                                <div class="d-inline-block align-items-center">
                                                    <p class="font-bold  mb-0">Address</p>
                                                </div>
                                                <p class=" mb-0">{{ $client->address }}</p>
                                            </td>
                                        </tr>





                                    </tbody>
                                </table>

                            </div>
                            <button onclick="window.location.href='account/{{$client->user_id}}'" class="btn-block btn-success">View Chart</button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>


@endsection
