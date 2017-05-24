@extends('layouts.app')

@section('title')
{{$feature->
  title}}
@stop

@section('content')
  <a href="{{$feature->id}}/edit" class="btn btn-default">Edit</a>
  {{ Form::open(['route' => ['features.destroy', $feature->id], 'method' => 'delete']) }}
    <button class="btn btn-dangers" type="submit">Delete</button>
  {{ Form::close() }}

  <h2>Features</h2>
  <ol>
      <h3>
        <li>
          {{$feature->name}}
        </li>
      </h3>

      <ul>
        <li>{{$feature->description}}</li>
        <li>{{$feature->creator_id}}</li>
      </ul>
  </ol>
@stop
