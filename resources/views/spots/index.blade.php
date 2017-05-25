@extends('layouts.app')

@section('title', 'All Spots')

@section('content')

  <a href="{{route('spots.create')}}" class="btn btn-primary"> Create new </a>
  <ul>
    @foreach ($spots as $spot)
        <li>
          <a href='{{route('spots.show', [$spot->slug])}}'>
            {{$spot->title}}
          </a>
        </li>
    @endforeach
  </ul>
@stop
