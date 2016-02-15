@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li class="active">Categories</li>
          </ol>

          <!-- For Flash Message if success add, edit and delete city -->
          @if(Session::has('flash_message'))

						<div class="alert alert-success">

							{{ Session::get('flash_message') }}

						</div>

					@endif

          <a href="tags/create" class="btn btn-primary btn-xs">Tambah</a>

          <hr/>

					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <td>Categories / Tags</td>
                <td></td>
                <td></td>
              </tr>
            </thead>
						<tbody>

            @foreach ($tags as $tag)

                <tr>
									<td>{{ $tag->name }}</td>
                  <td>
                    <a href="tags/{{ $tag->id }}/edit" class="btn btn-primary btn-xs">Edit</a>
                  </td>
                  <td>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['tags.destroy', $tag->id]]) !!}

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
