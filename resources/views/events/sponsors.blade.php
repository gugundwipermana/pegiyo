@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/events') }}">Events</a></li>
            <li><a href="{{ url('/events') }}/{{ $event->id }}">{{ $event->title }}</a></li>
            <li class="active">Sponsors</li>
          </ol>

          <h3>Sponsors: {{ $event->title }}</h3>

          @include('errors.list')

          {!! Form::open(['url' => 'sponsors', 'files' => true]) !!}

						{!! Form::hidden('event_id', $event->id) !!}

					<div class="form-group">
						{!! Form::label('image_name', 'Image') !!}
						{!! Form::file('image_name', ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('sponsor_name', 'Nama Sponsor') !!}
						{!! Form::text('sponsor_name', null, ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('type', 'Jenis Sponsor') !!}
						{!! Form::select('type', array('' => '-- Pilih Type --', '1' => 'Gold', '2' => 'Silver', '3' => 'Branzo'), null, ['class' => 'form-control chosen-select']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
					</div>

          {!! Form::close() !!}


					<hr/>



					@foreach(array_chunk($sponsors->all(), 3) as $row)

					<div class="row">

					@foreach($row as $sponsor)

						  <div class="col-sm-6 col-md-4">
						    <div class="thumbnail">
						      <img src="../../img_upload/sponsors/{{ $sponsor->image_name }}" alt="..." width="241" height="200">
						      <div class="caption">
						        <h3>{{ $sponsor->sponsor_name }}</h3>
										<p>
											@if($sponsor->type == '1')
												Gold
											@elseif($sponsor->type == '2')
												Silver
											@else
												Bronza
											@endif
										</p>
						        <p>
											{!! Form::open(['method' => 'DELETE', 'route' => ['sponsors.destroy', $sponsor->id]]) !!}

												{!! Form::hidden('event_id', $event->id) !!}

												{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}

											{!! Form::close() !!}
										</p>
						      </div>
						    </div>
						  </div>

          @endforeach

					</div>

					@endforeach

				</div>
			</div>

@endsection
