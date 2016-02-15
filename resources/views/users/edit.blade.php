@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
						<li><a href="{{ url('/users') }}">Users</a></li>
            <li><a href="{{ url('/users') }}/{{ $user->id }}">{{ $user->name }}</a></li>
            <li class="active">Edit</li>
          </ol>

          <h3>Edit: {{ $user->name }}</h3>

          @include('errors.list')

          {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}

            @include('users.form', [
              'submitButtonText' => 'Edit User', 'jenis' => 'edit'
            ])

          {!! Form::close() !!}

        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">

          <h3>Edit Password: {{ $user->name }}</h3>

          {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}

          <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
          </div>

          <div class="form-group">
            {!! Form::submit('Edit Password', ['class' => 'btn btn-primary']) !!}
          </div>

          {!! Form::close() !!}

				</div>
			</div>

@endsection
