@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/event') }}"> Back</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">View Event Details</div>
                    <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Event Title:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$event->title}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Event Description:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$event->description}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Guest:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$event->guest}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Organizer:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$event->organizer}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Starts On:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$event->starts_on}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Ends Up:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$event->ends_up}}
                                </div>
                            </div><br>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <strong>Venue:</strong>
                                </div>
                                <div class="col-md-6">
                                    {{$event->venue}}
                                </div>
                            </div><br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
