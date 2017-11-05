@extends('layouts.app')

@section('title', 'All Spots')

@section('content')

  <a href="/api/spots" class="btn btn-primary"> Api </a>
  @can('create')
    <a href="{{route('spots.create')}}" class="btn btn-primary"> Create new </a>
  @endcan
  <ul>
    @foreach ($spots as $spot)
        <li>
          <a href='{{route('spots.show', [$spot->slug])}}'>
            {{$spot->title}}
          </a>
        </li>
    @endforeach
  </ul>
  {{ $spots->links() }}
@stop
