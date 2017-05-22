@extends('layouts.app')

@section('title' , 'Create spot')

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

  {!! Form::open(['url' => 'spots']) !!}
    <div class="form-group">
      {{ Form::label('slug', 'Slug') }}
      {{ Form::text('slug', $spot->slug, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', $spot->title, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('description', 'Description') }}
      {{ Form::text('description', $spot->description, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('address', 'Address') }}
      {{ Form::text('address', $spot->address, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('locality', 'Locality') }}
      {{ Form::text('locality', $spot->locality, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('reagion', 'Reagion') }}
      {{ Form::text('reagion', $spot->reagion, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('postcode', 'Postcode') }}
      {{ Form::text('postcode', $spot->postcode, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('country', 'Country') }}
      {{ Form::text('country', $spot->country, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('map', 'Coordinates') }}
      {{ Form::text('map', $spot->map, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>


  {!! Form::close() !!}

@stop
