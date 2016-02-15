@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
						<li><a href="{{ url('/events') }}">Events</a></li>
            <li><a href="{{ url('/events') }}/{{ $event->id }}">{{ $event->title }}</a></li>
            <li class="active">Edit</li>
          </ol>

          <h3>Edit: {{ $event->title }}</h3>

          @include('errors.list')

          {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->id], 'files' => true]) !!}

            @include('events.form', [
              'submitButtonText' => 'Edit Event',
              'date_start' => $event->date_start,
              'date_end' => $event->date_end,
							'jenis' => 'edit'
            ])

          {!! Form::close() !!}

				</div>
			</div>

@endsection
