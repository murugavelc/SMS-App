@extends('layouts.dashboard')
@section('page_heading','Event List')

@section('section')
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
            <div class="col-sm-12" align="right"><a href="{{URL::to('/event/create')}}"><button type="button" class="btn btn-success ">Add Event</button></a></div>
            <div class="col-sm-12">
                @section ('','Coloured Table')
                @section ('cotable_panel_body')
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Event Title</th>
                            <th>Guest</th>
                            <th>Organizer</th>
                            <th>Starts</th>
                            <th>Ends</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <input type="hidden" name="stud_id" value=" {{ $sno = 1}}">
                        @foreach($events as $event=> $value)
                        <tr class="success">
                            <td>{{ $sno++ }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->guest }}</td>
                            <td>{{ $value->organizer }}</td>
                            <td>{{ $value->starts_on }}</td>
                            <td>{{ $value->ends_up }}</td>
                            <td>
                                <a class="btn btn-success btn-circle" href="{{ URL::to('/event/show/' . $value->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-info btn-circle" href="{{ URL::to('event/edit/' . $value->id) }}"><i class="fa fa-check"></i></a>
                                <a class="btn btn-warning btn-circle" href="{{ URL::to('event/delete/' . $value->id) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ str_replace('/?', '?', $events->render())}}
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
