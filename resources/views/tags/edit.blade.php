@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li><a href="{{ url('/tags') }}">Categories</a></li>
            <li class="active">Edit {{ $tag->name }}</li>
          </ol>

          <h3>Edit: {{ $tag->name }}</h3>

          @include('errors.list')

          {!! Form::model($tag, ['method' => 'PATCH', 'action' => ['TagsController@update', $tag->id]]) !!}

            @include('tags.form', ['submitButtonText' => 'Edit'])

          {!! Form::close() !!}

				</div>
			</div>

@endsection
