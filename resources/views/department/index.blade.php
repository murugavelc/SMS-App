@extends('layouts.dashboard')
@section('page_heading','Department List')

@section('section')
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
            <div class="col-sm-12" align="right"><a href="{{URL::to('/course/department/create')}}"><button type="button" class="btn btn-success ">Add Department</button></a></div>
            <div class="col-sm-12">
                @section ('','Coloured Table')
                @section ('cotable_panel_body')
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Degree</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department=> $value)
                        <tr class="success">
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->type }}</td>
                            <td>
                                <a class="btn btn-info btn-circle" href="{{ URL::to('course/department/edit/' . $value->id) }}"><i class="fa fa-check"></i></a>
                                <a class="btn btn-warning btn-circle" href="{{ URL::to('course/department/delete/' . $value->id) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ str_replace('/?', '?', $departments->render())}}
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
