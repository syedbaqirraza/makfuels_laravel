



@extends('layouts.admin')

@section('title')
<title>Makfuels client</title>
@endsection

@section('contents')
<form action="{{ route('fillterAccountChart') }}" method="post">
    @csrf
<section class="bootstrap-select">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-3">
                                    <fieldset class="form-group">
                                        From Month:
                                        <select class="form-select" name="startDate" id="basicSelect" required>
                                            <option value="1" selected>January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    <fieldset class="form-group">
                                        To Month:
                                        <select class="form-select" name="endDate" id="basicSelect" required>
                                            <option value="1" >January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12" selected>December</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-3">

                                    <fieldset class="form-group">
                                        Year
                                        <select required name="year" class="form-select" required>
                                            <option value="2022" selected>2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    <fieldset class="form-group mt-4">
                                        <input type="hidden" value="{{ $id }}" name="uid" id="uid" required>
                                        <input type="submit" class="btn btn-success" value="Apply Filter">
                                    </fieldset>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>

<section class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 ">
                <div id="barchart_material" style="min-height:600px; width:100%; "></div>
            </div>
        </div>
</section>

@endsection

@section('script')

<script>


google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
    ['Monthly Accounts Chart', 'Gallons', 'Invoice Total'],

    @php
        foreach($orders as $order) {
            echo "['".$order[0]."', ".intval($order[1]).", ".strval($order[2])."],";
        }
    @endphp
]);

var options = {
    title: 'Monthly Accounts Chart',

bars: 'horizontal',
hAxis: {
      title: '',
      minValue: 0
    },
    vAxis: {
      title: ''
    }
};
var chart = new google.charts.Bar(document.getElementById('barchart_material'));
chart.draw(data, google.charts.Bar.convertOptions(options));
}

</script>
@endsection
