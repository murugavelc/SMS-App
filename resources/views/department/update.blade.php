@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/course/department') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Update department</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/course/department/update') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $department->id }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Degree</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="degree" name="degree">
                                        <option   selected>{{ $department->type }}</option>
                                        <option>UG</option>
                                        <option>PG</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Department Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="dept_name" value="{{ $department->name }}">
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
