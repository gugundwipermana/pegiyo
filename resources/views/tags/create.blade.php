@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/tags') }}">Categories</a></li>
            <li class="active">Add</li>
          </ol>

          <h3>Write a New Categories</h3>

          @include('errors.list')

          {!! Form::open(['url' => 'tags']) !!}

            @include('tags.form', ['submitButtonText' => 'Simpan'])

          {!! Form::close() !!}

				</div>
			</div>

@endsection
