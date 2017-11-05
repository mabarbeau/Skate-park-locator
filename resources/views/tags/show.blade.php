@extends('layouts.app')

@section('title')
  {{$tag->key}}
@stop

@section('content')
  <a href="/api/spots/{{$slug}}/tags/{{$tag->index}}" class="btn btn-primary"> Api </a>
  @can('update')
    <a href="{{route('tags.update', ['slug'=> $slug, 'tag' => $tag->index])}}/edit" class="btn btn-default">Edit</a>
  @endcan
  @can('delete')
    {{ Form::open(['url' => route('tags.destroy', ['slug' => $slug, 'index' => $tag->index ] ), 'method' => 'delete']) }}
      <button class="btn btn-dangers" type="submit">Delete</button>
    {{ Form::close() }}
  @endcan

  <h2>Tags</h2>
  <ol>
      <h3>
        <li>
          {{$tag->index}}
          {{$tag->key}}
        </li>
      </h3>

      <ul>
        <li>{{$tag->key}} : {{$tag->value}}</li>
      </ul>
  </ol>
@stop
