@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/student/mark/addsem').'/'. $stud_id }}"> Back</a>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Add Student Marks</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{URL::to('/student/mark/store_marks')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="stud_id" value="{{ $stud_id }}">
                            <input type="hidden" name="sem" value="{{ $sem }}">
                                @foreach ($subjects as $subject)
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <strong>{{$subject->name}}:</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="marks[{{$subject->name}}]">
                                            <input type="hidden" class="form-control" name="subjects[]" value="{{$subject->name}}">
                                        </div>
                                    </div>
                                @endforeach
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        Submit
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