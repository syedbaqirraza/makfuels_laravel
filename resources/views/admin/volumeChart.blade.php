



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
            <div id="chart_div"></div>
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

// function formatDate(date) {
//      var d = new Date(date),
//          month = '' + (d.getMonth() + 1),
//          day = '' + d.getDate(),
//          year = d.getFullYear();

//      if (month.length < 2) month = '0' + month;
//      if (day.length < 2) day = '0' + day;

//      return [month, day, year].join('-');
//  }


    function showGraph(dateRangeStart,dateRangeEnd)
    {
        var uid=$("#uid").val();
        $.ajax({
            type:'POST',
            url:"{{ route('getJsonData') }}",
            data:{'dateRangeStart':dateRangeStart,'dateRangeEnd':dateRangeEnd,'uid':uid},
            success:function(dataget)
            {
                var da=[['text', 'amount', 'gallon']];

                var entries = Object.entries(dataget);

                for(var i in entries)
                {
                    da.push(entries[i][1][0],entries[i][1][1],entries[i][1][2]);
                }

                google.charts.load('current',{packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawAxisTickColors(da));
            }
        });
    }


    function drawAxisTickColors(dataArray)
    {

         var dd=[['text', 'amount', 'gallon'],['2022-12-01', 1200, 2200],['2022-12-02', 1300, 2300],['2022-12-03', 1400, 2400],['2022-12-04', 1500, 2500]];
        var data =new  google.visualization.arrayToDataTable(dd);

        var options = {
            title: 'Volume Chart',
            chartArea: {width: '50%'},
            hAxis: {
                minValue: 0,
                textStyle: {
                    bold: true,
                    fontSize: 12,
                    color: '#4d4d4d'
                },
                titleTextStyle: {
                    bold: true,
                    fontSize: 18,
                    color: '#4d4d4d'
                }
            },
            vAxis: {
                textStyle: {
                    fontSize: 14,
                    bold: true,
                    color: '#848484'
                },
                titleTextStyle: {
                    fontSize: 14,
                    bold: true,
                    color: '#848484'
                }
            }
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }



    $(document).ready(function(){
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







