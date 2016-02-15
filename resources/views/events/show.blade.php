@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/events') }}">Events</a></li>
            <li class="active">{{ $event->title }}</li>
          </ol>

          <table class="table">
            <tr>
              <td></td>
              <td><h3>{{ $event->title }}</h3></td>
            </tr>
            <tr>
              <td>Date</td>
              <td>{{ $event->date_start }} / {{ $event->date_end }}</td>
            </tr>
            <tr>
              <td>Contents</td>
              <td>{{ $event->contents }}</td>
            </tr>
            <tr>
              <td>Location</td>
              <td>{{ $event->location }}</td>
            </tr>
            <tr>
              <td>City</td>
              <td>{{ $event->city->city_name }}</td>
            </tr>
            <tr>
              <td>Type</td>
              <td>
                @if($event->type == '1')
                  Free
                @else
                  Pro
                @endif
              </td>
            </tr>
            <tr>
              <td>Category / Tag</td>
              <td>
                @foreach($event->tags as $tag)

                  {{ $tag->name }} <br/>

                @endforeach
              </td>
            </tr>

						<tr>
							<td></td>
							<td>
								<a href="{{ url('events') }}/{{ $event->id }}/locations" class="btn btn-default btn-xs">Location</a>
								<a href="{{ url('events') }}/{{ $event->id }}/sponsors" class="btn btn-default btn-xs">Sponsor</a>
								<a href="{{ url('events') }}/{{ $event->id }}/galleries" class="btn btn-default btn-xs">Images</a>
							</td>
						</tr>

            <tr>
              <td></td>
              <td>
                <p class="form-inline">
                  <a href="{{ url('events', $event->id) }}/edit" class="btn btn-primary">Edit</a>

                  {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id]]) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                  {!! Form::close() !!}

                </p>

              </td>
            </tr>

          </table>

				</div>
			</div>

@endsection
