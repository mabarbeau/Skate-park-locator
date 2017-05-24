@extends('layouts.app')

@section('title')
{{$feature->name}}
@stop

@section('content')
  <a href="{{$feature->id}}/edit" class="btn btn-default">Edit</a>

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
