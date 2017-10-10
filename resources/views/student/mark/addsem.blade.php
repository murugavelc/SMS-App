@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/student/mark/show') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Select Semester to add Marks</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{URL::to('/student/mark/add_marks')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="stud_id" value="{{ $stud_id}}">


                            <div class="col-md-6">
                                <select class="form-control" id="sem" name="sem" value="{{ old('sem') }}">
                                    <option  disabled selected>Select Sem</option>
                                    @foreach($semester as $semesters)
                                        <option value="{{$semesters->name}}">{{$semesters->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 col-md-offset-5"><br>
                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
