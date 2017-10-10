@extends('app')


@section('content')


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

    <form class="form-horizontal" method="POST" action="/login/fileUpload" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row cancel">

        <div class="form-group">
            <label class="col-md-4 control-label">Profile Photo</label>
            <div class="col-md-6">
                <input type="file" class="form-control" name="photo">
            </div>
        </div>

            <button type="submit" value ='upload' nane = 'submit' class="btn btn-success">Create</button>

        </div>
    </form>
@endsection