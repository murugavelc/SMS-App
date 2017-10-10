@extends('layouts.dashboard')
@section('page_heading','Student Mark List')

@section('section')

        <div class="col-sm-12">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ URL::to('/student/mark/show') }}"> Back</a>
            </div>
        @section ('','Coloured Table')
            @section ('cotable_panel_body')
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Semester</th>
                        <th>Subject Name</th>
                        <th>Grade</th>

                    </tr>
                    </thead>
                    <tbody>
                    <input type="hidden" name="stud_id" value=" {{ $sno = 1}}">
                    @foreach($marks as $mark=> $value)
                        <tr class="success">
                            <td>{{ $sno++ }}</td>
                            <td>{{ $value->sem }}</td>
                            <td>{{ $value->subject }}</td>
                            <td>{{ $value->grade }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>
    </div>
    </div>
@stop
