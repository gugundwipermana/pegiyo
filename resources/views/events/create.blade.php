@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/events') }}">Events</a></li>
            <li class="active">Add</li>
          </ol>

          <h3>Write a New Event</h3>

          @include('errors.list')

          {!! Form::open(['url' => 'events', 'files' => true]) !!}

            @include('events.form', [
							'submitButtonText' => 'Simpan',
							'date_start' => date('Y-m-d H:i:s'),
							'date_end' => date('Y-m-d H:i:s'),
							'jenis' => 'add'
						])

          {!! Form::close() !!}

				</div>
			</div>

@endsection
