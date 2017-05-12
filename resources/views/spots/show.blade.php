@extends('layouts.app')

@section('title')
{{$spot->
  title}}
@stop

@section('content')
  <a href="edit/{{$spot->slug}}" class="btn btn-default">Edit</a>
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
       {{$spot->lat}}
     </li>
     <li>
       {{$spot->lng}}
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

  <h2>Features</h2>
  <ol>
    @foreach($spot->features as $feature)
      <h3>
        <li>
          {{$feature->name}}
        </li>
      </h3>

      <ul>
        <li>{{$feature->description}}</li>
        <li>{{$feature->creator_id}}</li>
      </ul>

    @endforeach
  </ol>
@stop
