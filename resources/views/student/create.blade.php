@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/student') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Register New Student</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{URL::to('/student/store')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Roll No</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="rollno" value="{{ old('rollno') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="gender" name="gender" value="{{ old('gender') }}">
                                        <option  disabled selected>Select gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Date of Birth</label>
                                <div class="col-md-6">
                                    <input  type="text" class="date form-control" name="dob" value="{{ old('dob') }}">
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
                                    <input type="number" class="form-control" name="phone" value="{{ old('photo') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Degree</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="degree" name="degree" value="{{ old('degree') }}">
                                        <option  disabled selected>Select degree</option>
                                        <option>UG</option>
                                        <option>PG</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Department</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="department" name="department" value="{{ old('department') }}">
                                        <option  disabled selected>Select department</option>
                                        @foreach($department as $departments)
                                            <option value="{{$departments->name}}">{{$departments->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Year</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="year" name="year" value="{{ old('year') }}">
                                        <option  disabled selected>Select year</option>
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
                                    <select class="form-control" id="section" name="section" value="{{ old('section') }}">
                                        <option  disabled selected>Select section</option>
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
                                    <input type="select" class="form-control" name="grade" value="{{ old('grade') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Father name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fathername" value="{{ old('fathername') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Father occupation</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="fatheroccupation" value="{{ old('fatheroccupation') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Mother name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mothername" value="{{ old('mothername') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Mother occupation</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="motheroccupation" value="{{ old('motheroccupation') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">District</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="district" value="{{ old('district') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Pincode</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="pincode" value="{{ old('pincode') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Profile Photo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="photo" id="photo" value="{{ old('photo') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
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
