



@extends('layouts.admin')

@section('title')
<title>Makfuels client</title>
@endsection

@section('contents')

<section class="row">
    <div class="col-12">

        <div class="row mb-2">

                <div class="col-11">
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px;  border: 1px solid #ccc; ">
                        <i class="fa fa-calendar"></i>&nbsp; <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                </div>
                <div class="col-1">
                    <form action="{{ route('fillterVolumeChart') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $id }}" name="uid" id="uid" required>
                        <input type="hidden" id="startDate" name="startDate" required>
                        <input type="hidden" id="endDate" name="endDate" required>
                        <input type="submit" class="btn btn-success" value="Filter">
                    </form>
                </div>
        </div>
        <div class="row">
            <div class="col-12 ">
                <div id="barchart_material" style="min-height:600px; width:100%; "></div>
            </div>
        </div>

</section>

@endsection

@section('script')

<script>
$(document).ready(function(){
    var start = moment().subtract(29, 'days');
    var end = moment();
    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $("#startDate").val(start.format('MMMM D, YYYY'));
        $("#endDate").val(end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    cb(start, end);
});


google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
    ['Daily Volume Chart', 'Gallons', 'Invoice Total'],

    @php
        foreach($orders as $order) {
            echo "['".$order[0]."', ".intval($order[1]).", ".strval($order[2])."],";
        }
    @endphp
]);

var options = {
    title: 'Daily Volume Chart',

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







