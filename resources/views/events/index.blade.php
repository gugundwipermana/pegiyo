@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
						<li class="active">Events</li>
          </ol>

          <!-- For Flash Message if success add, edit and delete city -->
          @if(Session::has('flash_message'))

						<div class="alert alert-success">

							{{ Session::get('flash_message') }}

						</div>

					@endif

					@if($page == 'index')
          <a href="events/create" class="btn btn-primary btn-xs">Tambah</a>
					@endif

          <hr/>

					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <td>Judul</td>
	              <td>Date</td>
	              <td>Lokasi</td>

								@if(Auth::user()->level == 2)
								<td>EO</td>
								@endif

                <td></td>

								@if($page == 'validasi')
								<td></td>
								@endif

              </tr>
            </thead>
						<tbody>

            @foreach ($events as $event)

                <tr>
									<td><a href="{{ url('events') }}/{{ $event->id }}">{{ $event->title }}</a></td>
                  <td>{{ $event->date_start }} / {{ $event->date_end }}</td>
                  <td>{{ $event->location }}</td>
									@if(Auth::user()->level == 2)
									<td>{{ $event->user->name }}</td>
									@endif
                  <td>
										<a href="{{ url('events') }}/{{ $event->id }}" class="btn btn-primary">View</a>
									</td>

										@if($page == 'validasi')
									<td>
										{!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@updatestatus', $event->id], 'files' => true]) !!}

											{!! Form::hidden('status', '2', ['class' => 'form-control']) !!}

											{!! Form::submit('Validasi', ['class' => 'btn btn-primary']) !!}

										{!! Form::close() !!}

									</td>
										@endif
                </tr>
              
            @endforeach

					</tbody>
          </table>

				</div>
			</div>

@endsection
