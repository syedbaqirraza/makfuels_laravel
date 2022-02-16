



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
            <canvas id="graphCanvas" style="width:100%; height:300px;"></canvas>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function formatDate(date) {
     var d = new Date(date),
         month = '' + (d.getMonth() + 1),
         day = '' + d.getDate(),
         year = d.getFullYear();

     if (month.length < 2) month = '0' + month;
     if (day.length < 2) day = '0' + day;

     return [month, day, year].join('-');
 }


function showGraph(dateRangeStart,dateRangeEnd)
{
    var uid=$("#uid").val();
    $.post("{{ route('getJsonData') }}",
    {'dateRangeStart':dateRangeStart,'dateRangeEnd':dateRangeEnd,'uid':uid},
    function (data)
    {
        var name = [];
        var marks = [];
        for (var i in data) {
            name.push(formatDate(data[i].date));
            marks.push(data[i].amount);
        }
        var chartdata = {
            labels: name,
            datasets: [
                {
                    label:'Fule Sale',
                    backgroundColor: '#2C2625',
                    borderColor: '#46d5f1',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: marks
                },
            ]
        };
        var graphTarget = $("#graphCanvas");
        var barGraph = new Chart(graphTarget, { type: 'bar', data: chartdata });
    });

}



$(function() {

var start = moment().subtract(29, 'days');
var end = moment();

function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    showGraph(start.format('YYYY-MM-DD HH:mm:ss'),end.format('YYYY-MM-DD HH:mm:ss'));
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
</script>
@endsection







