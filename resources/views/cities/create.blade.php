@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/cities') }}">Cities</a></li>
            <li class="active">Add</li>
          </ol>

          <h3>Write a New City</h3>

          @include('errors.list')

          {!! Form::open(['url' => 'cities']) !!}

            @include('cities.form', ['submitButtonText' => 'Simpan'])

          {!! Form::close() !!}

				</div>
			</div>

@endsection
