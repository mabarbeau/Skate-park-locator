@extends('layouts.app')

@section('title', 'All Features')

@section('content')

  <a href="/api/spots/{{$slug}}/features/" class="btn btn-default"> Api </a>

  <a href="/spots/{{$slug}}/features/create" class="btn btn-primary"> Create new </a>

  <ul>
    @foreach ($features as $feature)
        <li>
          <a href="features/{{$feature->index}}">
            {{$feature->name}}
          </a>
        </li>
    @endforeach
  </ul>
@stop
