@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/event') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Event</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{URL::to('/event/store')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Event Title</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Event Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Guest</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="guest" value="{{ old('guest') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Organizer</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="organizer" value="{{ old('organizer') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Starts On</label>
                                <div class="col-md-6">
                                    <input  type="text" class="date form-control" name="starts" value="{{ old('starts') }}">
                                    <script type="text/javascript">
                                        $(".date").datetimepicker({ format: 'YYYY-MM-DD - hh:mm A',});
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Ends Up</label>
                                <div class="col-md-6">
                                    <input  type="text" class="date form-control" name="ends" value="{{ old('ends') }}">
                                    <script type="text/javascript">
                                        $(".date").datetimepicker({format: 'YYYY-MM-DD - hh:mm A'});
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Venue</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="venue" value="{{ old('venue') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        Create
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
