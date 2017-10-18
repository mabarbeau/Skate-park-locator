@extends('layouts.app')

@section('title', 'All Tags')

@section('content')

  <a href="/api/spots/{{$slug}}/tags/" class="btn btn-default"> Api </a>

  <a href="/spots/{{$slug}}/tags/create" class="btn btn-primary"> Create new </a>

  <ul>
    @foreach ($tags as $tag)
        <li>
          <a href="tags/{{$tag->index}}">
            {{$tag->key}} : {{$tag->value}}
          </a>
        </li>
    @endforeach
  </ul>
@stop
