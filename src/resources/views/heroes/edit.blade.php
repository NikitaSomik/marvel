@extends('layouts.app')

@section('content')
    @if ( count($errors) > 0 )
        <div class="alert alert-danger">
            <ul>
                @foreach( $errors->all() as $error )
                    <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="col-12">
            <form id="formEdit" action="{{ route('heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="nickname" class="col-sm-2 control-label">Nickname</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control nickname" id="nickname" placeholder="Name" name="nickname" value="{{ $hero->nickname }}">
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
                            <input type="text" class="form-control surname" id="real_name" placeholder="Real name" name="real_name" value="{{ $hero->real_name }}">
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="origin_description" class="col-sm-2 control-label">Origin description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="origin_description" id="origin_description" rows="7" placeholder="Description..." value="">{{ $hero->origin_description }}</textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="superpowers" class="col-sm-2 control-label">Superpowers</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="superpowers" id="superpowers" rows="3" placeholder="Superpowers..." value="">{{ $hero->superpowers }}</textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="catch_phrase" class="col-sm-2 control-label">Catch phrase</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="catch_phrase" id="catch_phrase" rows="2" placeholder="Catch phrase..." value="">{{ $hero->catch_phrase }}</textarea>
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
                    <div class="col-sm-8 col-sm-offset-2">
                        <img class="post_image" src="{{ asset("images/$hero->image") }}" style="width: 30%" alt="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" class="btn btn-primary" name="butEdit" id="butEdit">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection