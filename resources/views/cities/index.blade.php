@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li class="active">Cities</li>
          </ol>

          <!-- For Flash Message if success add, edit and delete city -->
          @if(Session::has('flash_message'))

						<div class="alert alert-success">

							{{ Session::get('flash_message') }}

						</div>

					@endif

          <a href="cities/create" class="btn btn-primary btn-xs">Tambah</a>

          <hr/>

					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <td>Cities</td>
	              <td>Propinces</td>
                <td></td>
                <td></td>
              </tr>
            </thead>
						<tbody>
            @foreach ($cities as $city)

                <tr>
									<td>{{ $city->city_name }}</td>
                  <td>{{ $city->province->province_name }}</td>
                  <td>
                    <a href="cities/{{ $city->id }}/edit" class="btn btn-primary btn-xs">Edit</a>
                  </td>
                  <td>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['cities.destroy', $city->id]]) !!}

                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}

                    {!! Form::close() !!}

                  </td>
                </tr>
              
            @endforeach
					</tbody>
          </table>

				</div>
			</div>

@endsection
