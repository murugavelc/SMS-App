@extends('layouts.dashboard')
@section('page_heading','Student List')

@section('section')
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
                <form method="GET" action="{{URL::to('/student/search')}}">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="key" class="form-control" placeholder="Enter Key For Search" value="{{ old('titlesearch') }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                        <!--<div class="input-group custom-search-form">
                           <input type="text" class="form-control" name="search" placeholder="Search...">
                           <span class="input-group-btn">
                      <button class="btn btn-default-sm" type="submit">
                           <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"</i>
                        </button>
                    </span>
                        </div> -->
                        <div class="col-sm-5" align="right"><a href="{{URL::to('/student/create')}}"><button type="button" class="btn btn-success ">Add Student</button></a></div>
                    </div>
                </form>
            <div class="col-sm-12">
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
                            <th>Degree</th>
                            <th>Department</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Action</th>
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
                            <td>{{ $value->degree }}</td>
                            <td>{{ $value->department }}</td>
                            <td>{{ $value->year }}</td>
                            <td>{{ $value->section }}</td>
                            <td>
                                <a class="btn btn-success btn-circle" href="{{ URL::to('/student/show/' . $value->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-info btn-circle" href="{{ URL::to('student/edit/' . $value->id) }}"><i class="fa fa-check"></i></a>
                                <a class="btn btn-warning btn-circle" href="{{ URL::to('student/delete/' . $value->id) }}"><i class="fa fa-times"></i></a>
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
