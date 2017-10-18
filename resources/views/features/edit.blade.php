@extends('layouts.app')

@section('title' , 'Edit feature')

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

  {!! Form::open(['url' => route('features.update',['slug' => $slug, 'index' => $feature->index]), 'method' => 'PUT'  ]) !!}
    <div class="form-group">
      {{ Form::label('key', 'Key') }}
      {{ Form::text('key', $feature->key, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::label('value', 'Value') }}
      {{ Form::text('value', $feature->value, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
  {!! Form::close() !!}

@stop
