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

  {!! Form::open(['url' => route('features.store',['slug' => $slug])]) !!}
    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', $feature->name, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::label('description', 'Description') }}
      {{ Form::text('description', $feature->description, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::label('lat', 'lat') }}
      {{ Form::text('lat', $feature->lat, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::label('lng', 'lng') }}
      {{ Form::text('lng', $feature->lng, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
  {!! Form::close() !!}

@stop
