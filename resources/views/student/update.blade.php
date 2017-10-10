@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/student') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Update Staff Details</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/student/update') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $student->id }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Register No</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="rollno" value="{{ $student->rollno }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>
                                <div class="col-md-6">
                                    <input type="select" class="form-control" name="gender" value="{{ $student->gender }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Date of Birth</label>
                                <div class="col-md-6">
                                    <input  type="text" class="date form-control" name="dob" value="{{ $student->dob }}">
                                    <script type="text/javascript">
                                        $('.date').datepicker({
                                            format: 'yyyy-mm-dd'
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="phone"  value="{{ $student->phone }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" disabled value="{{ $student->email }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Degree</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="degree" name="degree">
                                        <option   selected>{{ $student->degree }}</option>
                                        <option>UG</option>
                                        <option>PG</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Department</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="department" name="department">
                                        <option   selected>{{ $student->department }}</option>
                                        @foreach($department as $departments)
                                            <option value="{{$departments->name}}">{{$departments->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Year</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="year" name="year">
                                        <option   selected>{{ $student->year }}</option>
                                        <option>I-Year</option>
                                        <option>II-Year</option>
                                        <option>III-Year</option>
                                        <option>IV-Year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Section</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="section" name="section">
                                        <option  selected>{{ $student->section }}</option>
                                        <option>A-section</option>
                                        <option>B-section</option>
                                        <option>C-section</option>
                                        <option>D-section</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Grade</label>
                                <div class="col-md-6">
                                    <input type="select" class="form-control" name="grade" value="{{ $student->grade }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Father name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fathername" value="{{ $student->fathername }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Father occupation</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fatheroccupation" value="{{ $student->fatheroccupation }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Mother name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mothername" value="{{ $student->mothername }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Mother occupation</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="motheroccupation" value="{{ $student->motheroccupation }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" value="{{ $student->address }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">District</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="district" value="{{ $student->district }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Pincode</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="pincode" value="{{ $student->pincode }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Profile</label>
                                <div class="col-md-6">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img src="{{URL::to('images/profile/students/'. $student->photo)}}" height="120px" width="120px" \>
                                    </div>
                                    <input type="file" class="form-control" name="photo" id ="photo">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                       Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
