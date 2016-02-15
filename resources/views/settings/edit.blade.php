@extends('dashboard')

@section('content')

			<div class="panel panel-default">
				<!--<div class="panel-heading">Cities</div>-->

				<div class="panel-body">

          <ol class="breadcrumb">
						<li><a href="{{ url('/panel') }}">Dashboard</a></li>
            <li class="active">Setting Website</li>
          </ol>

          <h3>Settings Website</h3>

          @include('errors.list')

          {!! Form::model($setting, ['method' => 'PATCH', 'action' => ['SettingsController@update', $setting->id]]) !!}

          <div class="form-group">

            {!! Form::label('address', 'Address') !!}

            {!! Form::text('address', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('contact', 'Contact') !!}

            {!! Form::text('contact', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('email', 'Email') !!}

            {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('info', 'Info') !!}

            {!! Form::textarea('info', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('chat', 'Chat Social (BBM / WA / WeChat / Line)') !!}

            {!! Form::text('chat', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('paging', 'Jumlah Event yang ditampilkan dalam satu halaman (default 9)') !!}

            {!! Form::text('paging', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('slide_front', 'Jumlah Slide pada halaman utama (default 5)') !!}

            {!! Form::text('slide_front', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('slide_inside', 'Jumlah Slide pada halaman dalam (default 5)') !!}

            {!! Form::text('slide_inside', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('facebook', 'Alamat Facebook') !!}

            {!! Form::text('facebook', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('twitter', 'Alamat Twitter') !!}

            {!! Form::text('twitter', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('google', 'Alamat Google+') !!}

            {!! Form::text('google', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::label('rss', 'Alamat Rss') !!}

            {!! Form::text('rss', null, ['class' => 'form-control']) !!}

          </div>

          <div class="form-group">

            {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}

          </div>

          {!! Form::close() !!}

				</div>
			</div>

@endsection
