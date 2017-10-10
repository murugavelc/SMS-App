@extends('layouts.dashboard')
@section('page_heading','Student List')

@section('section')
    <div class="row">
        @if ($message = Session::get('success'))

            <div class="alert alert-success">

                <p>{{ $message }}</p>

            </div>

        @endif
            <div class="col-sm-12">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ URL::to('/staff/attendance/search') }}"> Back</a>
                </div>
            @section ('','Coloured Table')
            @section ('cotable_panel_body')
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Reg No</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Attendance</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student=> $value)
                        <tr class="success">
                            <td>{{ $value->rollno }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->gender }}</td>
                            <td>{{ $value->dob }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>
                                <input align="center" type="checkbox" checked="checked"  name="status[]" value="0"/>
                                <input type="hidden" name="stud_id[]" value="{{ $value->id }}"/>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                     {{ str_replace('/?', '?', $students->render())}}
                    <div class="col-sm-4">
                        <a class="btn btn-success" href="{{ URL::to('/staff/attendance/store') }}"> Submit</a>
                    </div>
            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>

    </div>
    </div>
@stop