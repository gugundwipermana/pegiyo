@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/cities') }}">Cities</a></li>
            <li class="active">Edit {{ $city->city_name }}</li>
          </ol>

          <h3>Edit: {{ $city->city_name }}</h3>

          @include('errors.list')

          {!! Form::model($city, ['method' => 'PATCH', 'action' => ['CitiesController@update', $city->id]]) !!}

            @include('cities.form', ['submitButtonText' => 'Edit'])

          {!! Form::close() !!}

				</div>
			</div>

@endsection
