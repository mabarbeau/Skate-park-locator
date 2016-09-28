@extends('partials.body')
@section('title')
  All Spots
@stop

@section('content')

  <a href="/spots/create" class="btn btn-primary"> Create new </a>

  <ul>
    @foreach ($spots as $spot)
        <li>
          <a href='/spots/{{$spot->slug}}'>
            {{$spot->title}}
          </a>
        </li>
    @endforeach
  </ul>
@stop
