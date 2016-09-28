@extends('partials.body')
@section('title')
  Create spot
@stop

@section('content')
  {!! Form::open(['url' => 'spots']) !!}
    <div class="form-group">
      {{ Form::label('slug', 'Slug') }}
      {{ Form::text('slug', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('description', 'Description') }}
      {{ Form::text('description', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('address', 'Address') }}
      {{ Form::text('address', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('locality', 'Locality') }}
      {{ Form::text('locality', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('reagion', 'Reagion') }}
      {{ Form::text('reagion', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('postcode', 'Postcode') }}
      {{ Form::text('postcode', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('country', 'Country') }}
      {{ Form::text('country', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('lat', 'Latitude') }}
      {{ Form::text('lat', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('lng', 'Longitude') }}
      {{ Form::text('lng', null ,['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>


  {!! Form::close() !!}

@stop
