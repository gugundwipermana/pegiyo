@extends('layout')

@section('content')


<div class="nav-foo">
	<div class="container">

		<ul class="nav navbar-nav">
      <h2>{{ $tag->name }}</h2>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<ol class="breadcrumb">
			  <li><a href="{{ url() }}">Home</a></li>
			  <li class="active">{{ $tag->name }}</li>
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

                  <!-- Marketing Icons Section -->

                  @foreach(array_chunk($events->getCollection()->all(), 3) as $row)

                  <div class="row">

                    @foreach($row as $event)

                    <div class="col-sm-4 col-lg-4 col-md-4">
											<div class="thumbnail">

												@if($event->date_start >= date('Y-m-d'))
												<h4 class="label-date lat">Latest</h4>
												@else
												<h4 class="label-date old">Oldest</h4>
												@endif

													<img src="{{ url() }}/img_upload/{{ $event->banner }}" alt="">
													<div class="caption">

															<h4>
																<a href="{{ url('') }}/{{ $event->id }}">{{ str_limit($event->title, $limit = 23, $end = '...') }}</a></a>
															</h4>

															<p><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> {{ date('d F Y', strtotime($event->date_start)) }} - {{ date('d F Y', strtotime($event->date_end)) }}</p>

															<p>{{ str_limit($event->contents, $limit = 55, $end = '...') }}</p>
													</div>
													<div class="ratings">
														<!--
															<p class="pull-right">15 reviews</p>
															<p>
																	<span class="glyphicon glyphicon-star"></span>
																	<span class="glyphicon glyphicon-star"></span>
																	<span class="glyphicon glyphicon-star"></span>
																	<span class="glyphicon glyphicon-star"></span>
																	<span class="glyphicon glyphicon-star"></span>
															</p>
														-->
													</div>
											</div>
                    </div>

                    @endforeach

                  </div>

                  @endforeach

                  <!-- /.row -->

                  {!! $events->render() !!}

            </div>

        </div>

    </div>
    <!-- /.container -->

@endsection
