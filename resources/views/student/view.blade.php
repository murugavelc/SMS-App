@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/student') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">View Student Details</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Name:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->name}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Roll No:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->rollno}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Gender:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->gender}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Date of Birth:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->dob}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Phone:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->phone}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>E-Mail Address:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->email}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Degree:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->degree}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Department:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->department}}
                            </div>
                        </div><br>


                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Year:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->year}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Section:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->section}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Grade:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->grade}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Father name:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->fathername}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Father occupation:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->fatheroccupation}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Mother name:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->mothername}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Mother occupation:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->motheroccupation}}
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Address:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->address}}
                            </div>
                        </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>District:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$student->district}}
                                </div>
                            </div><br>

                        <div class="form-group">
                            <div class="col-md-4">
                                <strong>Pincode:</strong>
                            </div>
                            <div class="col-md-6">
                                {{$student->pincode}}
                            </div>
                        </div><br>

                            <div class="form-group">
                            <div class="col-md-4">
                                <strong>Profile Photo:</strong>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6 col-md-offset-3">
                                    <img src="{{URL::to('images/profile/students/'.$student->photo)}}" height="120px" width="120px" \>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
