@extends('layouts.dashboard')
@section('page_heading','Subject List')

@section('section')
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
            <div class="col-sm-12" align="right"><a href="{{URL::to('/course/subject/create')}}"><button type="button" class="btn btn-success ">Add Subject</button></a></div>
            <div class="col-sm-12">
                @section ('','Coloured Table')
                @section ('cotable_panel_body')
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Year</th>
                            <th>Sem</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $ubject=> $value)
                        <tr class="success">
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->department }}</td>
                            <td>{{ $value->year }}</td>
                            <td>{{ $value->sem }}</td>
                            <td>
                                <a class="btn btn-info btn-circle" href="{{ URL::to('course/subject/edit/' . $value->id) }}"><i class="fa fa-check"></i></a>
                                <a class="btn btn-warning btn-circle" href="{{ URL::to('course/subject/delete/' . $value->id) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ str_replace('/?', '?', $subjects->render())}}
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
