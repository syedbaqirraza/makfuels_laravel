@extends('layouts.admin')

@section('title')
<title>Makfuels Dashboard</title>
@endsection


@section('contents')
<div class="page-heading">
    <h3>View Invoices</h3>
<button class="btn btn-success" onclick="window.location.href='{{ url('invoice') }}'">Go Back</button>

</div>

<div class="page-content">
    <div class="page-heading">

        <section class="section">
            <div class="card">

                <div class="card-body">
                    <embed
                        src="http://127.0.0.1:8000/files/1644427756.pdf#toolbar=0&navpanes=0&scrollbar=0"
                        type="application/pdf"
                        frameBorder="0"
                        scrolling="auto"
                        height="600px"
                        width="100%">
                    </embed>
                </div>
            </div>

        </section>
    </div>
</div>

@endsection
