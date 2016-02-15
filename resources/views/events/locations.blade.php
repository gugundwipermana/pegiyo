@extends('dashboard')

@section('maps')
<?php echo $map['js']; ?>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function getLatLng(newLat, newLng)
	{
		$("#lat").val(newLat);
		$("#lng").val(newLng);
	}
</script>
@endsection

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/events') }}">Events</a></li>
            <li><a href="{{ url('/events') }}/{{ $event->id }}">{{ $event->title }}</a></li>
            <li class="active">Locations</li>
          </ol>

          <!-- For Flash Message if success add, edit and delete city -->
          @if(Session::has('flash_message'))

						<div class="alert alert-success">

							{{ Session::get('flash_message') }}

						</div>

					@endif

					<h3>{{ $event->title }}</h3>

					<p>Anda dapat membuat tanda lebih dari satu lokasi. lokasi yang ditandai bisa berupa lokasi utama atau hotel</p>
					<p>Drag Tanda pick warna merah <img src="../../images/add.png" /> pada maps dan letakan pada titik lokasi yang akan dibuat sehingga form latitude dan longitude terisi.
						lalu lengkapi data yang lainnya seperti nama lokasi, deskripsi dan type. Selanjutnya tekan tombol Save untuk menyimpan.</p>


					@include('errors.list')

					<div>
						<?php echo $map['html']; ?>
					</div>

					<hr/>

					<div class="col-md-8 col-md-offset-2">

						{!! Form::open(['url' => 'locations']) !!}

						{!! Form::hidden('event_id', $event->id) !!}

						<div class="form-group">

							{!! Form::label('latitude', 'Latitude') !!}

							{!! Form::text('latitude', null, ['class' => 'form-control', 'id' => 'lat', 'readonly']) !!}

						</div>

						<div class="form-group">

							{!! Form::label('longitude', 'Longitude') !!}

							{!! Form::text('longitude', null, ['class' => 'form-control', 'id' => 'lng', 'readonly']) !!}

						</div>

						<div class="form-group">

							{!! Form::label('name', 'Name') !!}

							{!! Form::text('name', null, ['class' => 'form-control']) !!}

						</div>

						<div class="form-group">

							{!! Form::label('type', 'Tupe') !!}

							{!! Form::select('type', array('' => '-- Pilih Type --', '1' => 'Lokasi Utama', '2' => 'Hotel', '3' => 'Restourant', '4' => 'Lainnya'), null, ['class' => 'form-control chosen-select']) !!}

						</div>

						<div class="form-group">

							{!! Form::label('description', 'Description') !!}

							{!! Form::textarea('description', null, ['class' => 'form-control']) !!}

						</div>

						<div class="form-group">

						  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

						</div>

						{!! Form::close() !!}

					</div>

				</div>

				<table class="table">

					<hr>
						<td>Name</td>
						<td>Latitude / Longitude</td>
						<td>Type</td>
						<td></td>
					</hr>

					@foreach($locations as $loc)

					<tr>
						<td>{{ $loc->name }}</td>
						<td>{{ $loc->latitude }} / {{ $loc->longitude }}</td>
						<td>
							@if($loc->type == '1')
								Lokasi Utama
							@else
								hotel
							@endif
						</td>
						<td>

							{!! Form::open(['method' => 'DELETE', 'route' => ['locations.destroy', $loc->id]]) !!}

								{!! Form::hidden('event_id', $event->id) !!}

								{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

							{!! Form::close() !!}

						</td>
					</tr>

					@endforeach

				</table>
			</div>

@endsection
