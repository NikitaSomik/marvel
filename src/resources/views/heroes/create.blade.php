@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12">
            @if ( count($errors) > 0 )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li>{{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if ( Session::has('flash_message') )
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
                @endif

            <form id="formCreate" action="{{ route('heroes.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nickname" class="col-sm-2 control-label">Nickname</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control nickname" id="nickname" placeholder="Name" name="nickname" >
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="real_name" class="col-sm-2 control-label">Real name</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control real_name" id="real_name" placeholder="Real name" name="real_name" >
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="origin_description" class="col-sm-2 control-label">Origin description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="origin_description" id="origin_description" rows="7" placeholder="Description..." ></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="superpowers" class="col-sm-2 control-label">Superpowers</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="superpowers" id="superpowers" rows="3" placeholder="Superpowers..." ></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="catch_phrase" class="col-sm-2 control-label">Catch phrase</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="catch_phrase" id="catch_phrase" rows="2" placeholder="Catch phrase..." ></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="images" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-8">
                        <input type="file" name="images" class="form-control-file" id="images" aria-describedby="fileHelp" >
                        <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" class="btn btn-primary" name="butCreate" id="butCreate">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection