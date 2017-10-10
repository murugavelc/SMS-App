@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/hod') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">View HOD Details</div>
                    <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Name:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$staffs->name}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Employee Id:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$staffs->emp_id}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Gender:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$staffs->gender}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>E-Mail Address:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$staffs->email}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Phone:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$staffs->phone}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Degree:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$staffs->degree}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Department:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$staffs->department}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Date of Join:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$staffs->date_of_join}}
                                </div>
                            </div><br>

                            <div class="form-group">
                            <div class="col-md-4">
                                <strong>Profile Photo:</strong>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6 col-md-offset-3">
                                    <img src="{{URL::to('images/profile/hods/'. $staffs->photo)}}" height="120px" width="120px" \>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
