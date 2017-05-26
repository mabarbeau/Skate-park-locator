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
  {{dd($feature->index)}}
  {!! Form::open(['route' => route('features.update', ['slug' => $slug, 'id' => $feature->index]), 'method' => 'patch']) !!}
    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', $feature->name, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::label('description', 'Description') }}
      {{ Form::text('description', $feature->description, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
  {!! Form::close() !!}
@stop
