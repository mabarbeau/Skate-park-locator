@extends('layouts.app')

@section('title')
  {{$feature->key}}
@stop

@section('content')
  <a href="/api/spots/{{$slug}}/features/{{$feature->index}}" class="btn btn-primary"> Api </a>

  <a href="{{route('features.update', ['slug'=> $slug, 'feature' => $feature->index])}}/edit" class="btn btn-default">Edit</a>
  {{ Form::open(['url' => route('features.destroy', ['slug' => $slug, 'index' => $feature->index ] ), 'method' => 'delete']) }}
    <button class="btn btn-dangers" type="submit">Delete</button>
  {{ Form::close() }}

  <h2>Features</h2>
  <ol>
      <h3>
        <li>
          {{$feature->index}}
          {{$feature->key}}
        </li>
      </h3>

      <ul>
        <li>{{$feature->key}} : {{$feature->value}}</li>
      </ul>
  </ol>
@stop
