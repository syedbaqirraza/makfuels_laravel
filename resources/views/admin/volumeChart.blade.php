



@extends('layouts.admin')

@section('title')
<title>Makfuels client</title>
@endsection

@section('contents')

<section class="row">
    <div class="col-12 col-lg-12">
        <div class="row">
            <canvas id="graphCanvas" style="width:100%; height:300px;"></canvas>
        </div>
</section>


@endsection



@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function(){
    $('#graphCanvas').hide();
    showGraph();
    $('#graphCanvas').show();
});


function showGraph()
{
    $.get("{{ route('getJsonData') }}",
    function (data)
    {
        var name = [];
        var marks = [];
        var emp_name = [];
        var emp_marks = [];
        for (var i in data.student) {

            name.push(data.student[i].student_name);
            marks.push(data.student[i].marks);
        }
        for (var i in data.employee) {
            emp_name.push(data.employee[i].student_name);
            emp_marks.push(data.employee[i].marks);
        }

        var chartdata = {
            labels: name,
            datasets: [
                {
                    label: 'Student Marks',
                    backgroundColor: '#2C2625',
                    borderColor: '#46d5f1',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: marks
                },
                {
                    label: 'Employee Marks',
                    backgroundColor: '#49e2ff',
                    borderColor: '#46d5f1',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: emp_marks
                }
            ]
        };
        var graphTarget = $("#graphCanvas");
        var barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata
        });
    });

}
</script>
@endsection







