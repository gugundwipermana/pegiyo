@extends('layout')

@section('content')

<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <?php
        $no = 1;
        foreach($events_pro as $event_pro) {
          ?>
          <li data-target="#myCarousel" data-slide-to="<?=$no?>"></li>
          <?php
          $no++;
        }
      ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('img_upload/example_banner.jpg');"></div>
            <div class="carousel-caption">
                <h2><img src="{{ url('images') }}/pegiyo.png" width="50%"/></h2>
            </div>
        </div>

        @foreach($events_pro as $event_pro)

        <div class="item">
            <div class="fill" style="background-image:url('img_upload/{{ $event_pro->banner }}');"></div>
            <div class="carousel-caption">
                <h2>{{ $event_pro->title}}</h2>
            </div>
        </div>

        @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>

<div class="container">
  <!-- Marketing Icons Section -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">

      </h1>
    </div>
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
                        <h4 class="label-date old">Oldest


                        </h4>
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
