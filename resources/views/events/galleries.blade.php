@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/events') }}">Events</a></li>
            <li><a href="{{ url('/events') }}/{{ $event->id }}">{{ $event->title }}</a></li>
            <li class="active">Galleries</li>
          </ol>

          <h3>Galleries: {{ $event->title }}</h3>

          @include('errors.list')

          {!! Form::open(['url' => 'galleries', 'files' => true]) !!}

						{!! Form::hidden('event_id', $event->id) !!}

					<div class="form-group">
						{!! Form::label('gallery_name', 'Image') !!}
						{!! Form::file('gallery_name', ['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
					</div>

          {!! Form::close() !!}


					<hr/>



					@foreach(array_chunk($galleries->all(), 3) as $row)

					<div class="row">

					@foreach($row as $gallery)

						  <div class="col-sm-6 col-md-4">
						    <div class="thumbnail">
						      <img src="../../img_upload/galleries/{{ $gallery->gallery_name }}" alt="..." width="241" height="200">
						      <div class="caption">
						        <p>
											{!! Form::open(['method' => 'DELETE', 'route' => ['galleries.destroy', $gallery->id]]) !!}

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
