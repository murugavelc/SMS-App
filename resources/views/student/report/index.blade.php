<html>
<head>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/styles.css') }}">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.min.js"></script>`

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="pull-right">
            <!-- <a class="btn btn-primary" href="{{ URL::to('/student') }}"> Back</a> -->
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Filter Student list</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{URL::to('/reports/monthly_report')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="first_dy" value="{{ $first_dy }}">
                        <input type="hidden" name="last_dy" value="{{ $last_dy }}">
                        <input type="hidden" name="parameter" value="{{ $parameter }}">

                        <div class="col-md-3">
                            <input type="hidden" id="degree" name="degree" value="{{$degree}}">
                            <select class="form-control" id="degree" name="degree" value="{{$degree}}">
                                <option disabled selected>{{$degree}}</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <input type="hidden" id="department" name="department" value="{{ $department }}">
                            <select class="form-control" id="department" name="department" value="{{ $department }}">
                                <option disabled selected>{{$department}}</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select class="form-control" id="year" name="year">
                                <option  disabled selected>Select year</option>
                                <option>I-Year</option>
                                <option>II-Year</option>
                                <option>III-Year</option>
                                <option>IV-Year</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="section" name="section">
                                <option  disabled selected>Select section</option>
                                <option>A-section</option>
                                <option>B-section</option>
                                <option>C-section</option>
                                <option>D-section</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-md-offset-5"><br>
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

