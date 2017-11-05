@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1>
            {{ Auth::user()->name }}
           </h1>
        </div>
        <div class="panel-body">
          <dl class="dl-horizontal">
            <dt>
              Email
            </dt>
            <dd>
              {{ Auth::user()->email }}
            </dd>
            <dt>Created</dt>
            <dd>
              {{ Auth::user()->created_at }}
            </dd>
            <dt>Updated</dt>
            <dd>
              {{ Auth::user()->updated_at }}
            </dd>
            <dt>
              Role
            </dt>
            <dd>
              @role('super-admin')
                super-admin
              @endrole
              @role('admin')
                admin
              @endrole
              @role('editor')
                editor
              @endrole
              @role('basic')
                basic
              @endrole
            </dd>
          </dl>
          <a
            class="btn btn-default"
            href="{{ url('/logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
          >
            Logout
          </a>

          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
