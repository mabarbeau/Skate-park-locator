
@extends('layout')
@section('title')
  Welcome!
@stop

@section('body')
<div class="container">

  <h1>@yield('title')</h1>
  <hr>
  @yield('content')
</div>
@stop
