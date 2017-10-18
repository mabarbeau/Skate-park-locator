@extends('layouts.app')

@section('title' , 'Create tag')

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

  {!! Form::open(['url' => route('tags.store',['slug' => $slug])]) !!}
    <div class="form-group">
      {{ Form::label('key', 'Key') }}
      {{ Form::text('key', $tag->key, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::label('value', 'Value') }}
      {{ Form::text('value', $tag->value, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>
  {!! Form::close() !!}

@stop
