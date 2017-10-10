<html>
<head>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/styles.css') }}">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.min.js"></script>`

</head>
<body>

    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-sm-6 col-md-8" ><h2>Students Monthly Attendance Report</h2></div>
                <div class="col-sm-6 col-md-4" >
                <a class="pull-right btn btn-primary"  href="{{ URL::to('/reports/search/'.$parameter) }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr class="info">
                    <th>Reg No</th>
                    <th>Name</th>
                    <th>Photo</th>
                    @foreach($worked_date as $date=> $attndce)
                    <th>{{ $attndce->date }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student=> $value)
                    <tr >
                        <td>{{ $value->rollno }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            <img src="{{URL::to('images/profile/students/'. $value->photo)}}" height="30px" width="30px" \>
                        </td>
                        @foreach(explode(',', $value->attn) as $attn)
                            @if($attn =='0')
                                <td class="danger">Absent</td>
                            @else
                                <td class="success">Present</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
