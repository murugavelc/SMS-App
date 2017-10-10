@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/hod') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Update HOD Details</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/hod/update') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $staffs->id }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $staffs->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Employee Id</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="emp_id" value="{{ $staffs->emp_id }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Gender</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="gender" name="gender">
                                        <option   selected>{{ $staffs->gender }}</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ $staffs->email }}" disabled >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="phone" value="{{ $staffs->phone }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Degree</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="degree" name="degree">
                                        <option selected="selected">{{ $staffs->degree }}</option>
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
                                        <option  selected="selected">{{ $staffs->department }}</option>
                                        @foreach($department as $departments)
                                            <option value="{{$departments->name}}">{{$departments->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Date of Join</label>
                                <div class="col-md-6">
                                    <input  type="text" class="date form-control" name="doj" value="{{ $staffs->date_of_join }}">
                                    <script type="text/javascript">
                                        $('.date').datepicker({
                                            format: 'yyyy-mm-dd'
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Profile</label>
                                <div class="col-md-6">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img src="{{URL::to('images/profile/hods/'. $staffs->photo)}}" height="120px" width="120px" \>
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
