@extends('layout')

@section('content')


<div class="nav-foo">
	<div class="container">

		<ul class="nav navbar-nav">
      <h2>About</h2>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<ol class="breadcrumb">
			  <li><a href="{{ url() }}">Home</a></li>
			  <li class="active">About</li>
			</ol>
		</ul>

  </div>
</div>

<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Categories</p>
                <div class="list-group">

                  @foreach($tags as $tag)

                  <a href="{{ url('categories') }}/{{ $tag->id }}" class="list-group-item">{{ $tag->name }}</a>

                  @endforeach

                </div>
            </div>

            <div class="col-md-9">

              <table class="table">
                <tr>
                  <td><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></td>
                  <td>Alamat </td>
                  <td>{{ $setting->address }}</td>
                </tr>
                <tr>
                  <td><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></td>
                  <td>Contact</td>
                  <td>{{ $setting->contact }}</td>
                </tr>
                <tr>
                  <td><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></td>
                  <td>Email</td>
                  <td>{{ $setting->email }}</td>
                </tr>
                <tr>
                  <td><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></td>
                  <td>Chat</td>
                  <td>{{ $setting->chat }}</td>
                </tr>

                <tr>
                  <td><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></td>
                  <td>Information</td>
                  <td>{{ $setting->info }}</td>
                </tr>
              </table>

            </div>

        </div>

    </div>
    <!-- /.container -->

@endsection
