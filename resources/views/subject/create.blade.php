@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/course/subject') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Register New Subject</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{URL::to('/course/subject/store')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
                                <label class="col-md-4 control-label">Semester</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="sem" name="sem" value="{{ old('sem') }}">
                                        <option  disabled selected>Select semester</option>
                                        <option>I-Sem</option>
                                        <option>II-Sem</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Subject Name</label>
                                <div class="col-md-6">
                                    <input type="select" class="form-control" name="name" value="{{ old('name') }}">
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
