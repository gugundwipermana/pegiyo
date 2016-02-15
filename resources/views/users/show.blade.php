@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/users') }}">Users</a></li>
            <li class="active">{{ $user->name }}</li>
          </ol>

          <table class="table">
            <tr>
              <td></td>
              <td><h3>{{ $user->name }}</h3></td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <td>Contact</td>
              <td>{{ $user->contact }}</td>
            </tr>
            <tr>
              <td>Info</td>
              <td>{{ $user->info }}</td>
            </tr>
            <tr>
              <td>Level</td>
              <td>
                @if($user->level == '1')
                  Event Organize
                @else
                  Administrator
                @endif
              </td>
            </tr>

            <tr>
              <td></td>
              <td>
                <p class="form-inline">
                  <a href="{{ url('users', $user->id) }}/edit" class="btn btn-primary">Edit</a>

                  {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                  {!! Form::close() !!}

                </p>

              </td>
            </tr>

          </table>

				</div>
			</div>

@endsection
