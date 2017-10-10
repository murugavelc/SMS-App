@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/student') }}"> Back</a>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{URL::to('/student/attendance/show')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="col-md-3">
                                    <select class="form-control" id="degree" name="degree" value="{{ old('degree') }}">
                                        <option  disabled selected>Select degree</option>
                                        <option>UG</option>
                                        <option>PG</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select class="form-control" id="department" name="department" value="{{ old('department') }}">
                                        <option  disabled selected>Select department</option>
                                        @foreach($department as $departments)
                                            <option value="{{$departments->name}}">{{$departments->name}}</option>
                                        @endforeach
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
@endsection
