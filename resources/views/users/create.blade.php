@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/users') }}">Users</a></li>
            <li class="active">Add</li>
          </ol>

          <h3>Write a New Event Organize</h3>

          @include('errors.list')

          {!! Form::open(['url' => 'users']) !!}

            @include('users.form', [
							'submitButtonText' => 'Simpan', 'jenis' => 'add'
						])

          {!! Form::close() !!}

				</div>
			</div>

@endsection
