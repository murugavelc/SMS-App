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
                    <a class="btn btn-primary" href="{{ URL::to('/staff/mark/search') }}"> Back</a>
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
                        <th>Mark</th>
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
                                <a class="btn btn-success btn-circle" href="{{ URL::to('/student/mark/addsem/' . $value->id) }}"><i class="fa fa-plus"></i></a>
                                <a class="btn btn-primary btn-circle" href="{{ URL::to('/student/mark/view_marks/' . $value->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-info btn-circle" href="{{ URL::to('student/mark/edit_marks/' . $value->id) }}"><i class="fa fa-check"></i></a>
                                <a class="btn btn-warning btn-circle" href="{{ URL::to('student/mark/delete/' . $value->id) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                     {{ str_replace('/?', '?', $students->render())}}

            @endsection
            @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
        </div>

    </div>
    </div>
@stop