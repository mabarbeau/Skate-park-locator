@extends('layouts.app')

@section('title')
  {{$spot->title}}
@stop

@section('content')
  <a href="/api/spots/{{$spot->slug}}" class="btn btn-primary"> Api </a>

  <a href="{{route('spots.edit', ['slug'=> $spot->slug])}}" class="btn btn-default">Edit</a>
  {{ Form::open(['route' => ['spots.destroy', $spot->slug], 'method' => 'delete']) }}
    <button class="btn btn-dangers" type="submit">Delete</button>
  {{ Form::close() }}

  <ul>
     <li>
       {{$spot->description}}
     </li>
     <li>
       {{$spot->address}}
     </li>
     <li>
       {{$spot->locality}}
     </li>
     <li>
       {{$spot->reagion}}
     </li>
     <li>
       {{$spot->postcode}}
     </li>
     <li>
       {{$spot->country}}
     </li>
     <li>
       {{$spot->map}}
     </li>
     <li>
       {{$spot->votes}}
     </li>
     <li>
       {{$spot->hearts}}
     </li>
     <li>
       {{$spot->rating}}
     </li>
     <li>
       {{$spot->creator_id}}
     </li>
     <li>
       {{$spot->updater_id}}
     </li>
     <li>
       {{$spot->created_at}}
     </li>
     <li>
       {{$spot->updated_at}}
     </li>
  </ul>

  <h2>Tags</h2>
  <a href="{{route('tags.create', $spot->slug)}}" class="btn btn-default">
    Create
  </a>
  <ol>
    @foreach($spot->tags as $tag)

      <h3>
        <li>
          <a href="{{route('tags.show', ['slug'=> $spot->slug, 'tag'=> $tag->index])}}">
            {{$tag->key}}
          </a>
        </li>
      </h3>

      <ul>
        <li>{{$tag->value}}</li>
      </ul>

    @endforeach
  </ol>
@stop
