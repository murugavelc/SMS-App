@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/event') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Update Event Details</div>
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

                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::to('/event/update') }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $event->id }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Event Title</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{$event->title}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Event Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" >{{$event->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Guest</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="guest" value="{{$event->guest}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Organizer</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="organizer" value="{{$event->organizer}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Starts On</label>
                                <div class="col-md-6">
                                    <input  type="text" class="date form-control" name="starts" value=" {{$event->starts_on}}">
                                    <script type="text/javascript">
                                        $(".date").datetimepicker({ format: 'YYYY-MM-DD - hh:mm A',});
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Ends Up</label>
                                <div class="col-md-6">
                                    <input  type="text" class="date form-control" name="ends" value="{{$event->ends_up}}">
                                    <script type="text/javascript">
                                        $(".date").datetimepicker({ format: 'YYYY-MM-DD - hh:mm A',});
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Venue</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="venue" value="{{$event->venue}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
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
