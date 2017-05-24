@extends('layouts.app')

@section('title', 'All Features')

@section('content')

  <a href="/features/create" class="btn btn-primary"> Create new </a>

  <ul>
    @foreach ($features as $feature)
        <li>
          <a href='/features/{{$feature->id}}'>
            {{$feature->name}}
          </a>
        </li>
    @endforeach
  </ul>
@stop
