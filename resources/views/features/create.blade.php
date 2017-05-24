@extends('layouts.app')

@section('title' , 'Create feature')

@section('content')
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif


name
description
spot_id
creator_id
updater_id

  {!! Form::open(['url' => 'features']) !!}
    <div class="form-group">
      {{ Form::text('slug', $feature->slug, ['class' => 'form-control']) }}
    </div>

  {!! Form::close() !!}

@stop
