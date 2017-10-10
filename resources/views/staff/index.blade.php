@extends('layouts.dashboard')
@section('page_heading','Staff List')

@section('section')
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
            <div class="col-sm-12" align="right"><a href="{{URL::to('/staff/create')}}"><button type="button" class="btn btn-success ">Add Staff</button></a></div>
            <div class="col-sm-12">
                @section ('','Coloured Table')
                @section ('cotable_panel_body')
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Emp.Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Degree</th>
                            <th>Department</th>
                            <th>DOJ</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($staffs as $staff=> $value)
                        <tr class="success">
                            <td>{{ $value->emp_id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->degree }}</td>
                            <td>{{ $value->department }}</td>
                            <td>{{ $value->date_of_join }}</td>
                            <td>
                                <a class="btn btn-success btn-circle" href="{{ URL::to('/staff/show/' . $value->user_id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-info btn-circle" href="{{ URL::to('staff/edit/' . $value->user_id) }}"><i class="fa fa-check"></i></a>
                                <a class="btn btn-warning btn-circle" href="{{ URL::to('staff/delete/' . $value->user_id) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ str_replace('/?', '?', $staffs->render())}}
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
            </div>
        </div>
    </div>
@stop
