



@extends('layouts.admin')

@section('title')
<title>Makfuels client</title>
@endsection

@section('contents')

<section class="row">
    <div class="col-12 col-lg-12">
        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp; <span></span> <i class="fa fa-caret-down"></i>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="chart_div" style="min-height:600px; width:100%;"></div>
            </div>

        </div>
        <input type="hidden" value="{{ $id }}" id="uid" >
</section>

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection

@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function(){
    var start = moment().subtract(29, 'days');
    var end = moment();
    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBarColors(start.format('YYYY-MM-DD HH:mm:ss'),end.format('YYYY-MM-DD HH:mm:ss')));

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


function drawBarColors(start,end)
{

    var uid=$("#uid").val();
    $.ajax({
        type:'POST',
        url:"{{ route('getJsonData') }}",
        data:{'dateRangeStart':start,'dateRangeEnd':end,'uid':uid},
        success:function(dataget)
        {
            var da=[];
            da.push(['Sale','Gallon','Invoice Total']);
            var entries = Object.entries(dataget);
            for(var i in entries)
            {
                da.push([entries[i][1][0],entries[i][1][1],entries[i][1][2]]);
            }
            var data = google.visualization.arrayToDataTable(da);

            var options = {
                title: '{{$user_name}} Volume Chart',
                chartArea: {width:'55%',height:'80%'},
                colors: ['#FFC300', '#820D9C'],
                hAxis: {
                    minValue: 0
                }
            };
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    });
}

</script>
@endsection







