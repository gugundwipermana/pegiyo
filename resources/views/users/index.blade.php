@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
						<li class="active">Users</li>
          </ol>

          <!-- For Flash Message if success add, edit and delete city -->
          @if(Session::has('flash_message'))

						<div class="alert alert-success">

							{{ Session::get('flash_message') }}

						</div>

					@endif

          <a href="users/create" class="btn btn-primary btn-xs">Tambah</a>

          <hr/>

					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <td>Name</td>
	              <td>Email</td>
	              <td>Contact</td>
	              <td>Level</td>
                <td></td>
              </tr>
            </thead>
						<tbody>

            @foreach ($users as $user)

                <tr>
									<td><a href="{{ url('users') }}/{{ $user->id }}">{{ $user->name }}</a></td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->contact }}</td>
                  <td>
                    @if($user->level == '1')
                    Event Organize
                    @else
                    Administrator
                    @endif
                  </td>
                  <td>
										<a href="{{ url('users') }}/{{ $user->id }}" class="btn btn-primary">View</a>
									</td>
                </tr>

            @endforeach

						</tbody>
          </table>

				</div>
			</div>

@endsection
