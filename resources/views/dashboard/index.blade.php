<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pegiyo.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/css/full-slider.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

    .cf:before, .cf:after{
      content:"";
      display:table;
    }

    .cf:after{
      clear:both;
    }

    .cf{
      zoom:1;
    }

    /*----------------------------- */

    .box-search {
      position:absolute;
      z-index:1;
      margin-left: auto;
      margin-right: auto;
      background: rgba(0,0,0,.3);
      width: 100%;
      height: 100%;
    }

    /* Form wrapper styling */
    .form-wrapper {
        width: 450px;
        padding: 15px;
        margin: 300px auto 50px auto;
        background: #444;
        background: rgba(0,0,0,.2);
        border-radius: 10px;
        box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
    }

    /* Form text input */

    .form-wrapper input {
        width: 310px;
        height: 40px;
        padding: 10px 5px;
        float: left;
        font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
        border: 0;
        background: #eee;
        border-radius: 3px 0 0 3px;
    }

    .form-wrapper input:focus {
        outline: 0;
        background: #fff;
        box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
    }

    .form-wrapper input::-webkit-input-placeholder {
       color: #999;
       font-weight: normal;
       font-style: italic;
    }

    .form-wrapper input:-moz-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }

    .form-wrapper input:-ms-input-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }

    /* Form submit button */
    .form-wrapper button {
        overflow: visible;
        position: relative;
        float: right;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 110px;
        font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
        color: #fff;
        text-transform: uppercase;
        background: #f25703;
        border-radius: 0 3px 3px 0;
        text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
    }

    .form-wrapper button:hover{
        background: #ef8c56;
    }

    .form-wrapper button:active,
    .form-wrapper button:focus{
        background: #c42f2f;
    	outline: 0;
    }

    .form-wrapper button:before { /* left arrow */
        content: '';
        position: absolute;
        border-width: 8px 8px 8px 0;
        border-style: solid solid solid none;
        border-color: transparent #f25703 transparent;
        top: 12px;
        left: -6px;
    }

    .form-wrapper button:hover:before{
        border-right-color: #ef8c56;
    }

    .form-wrapper button:focus:before,
    .form-wrapper button:active:before{
            border-right-color: #c42f2f;
    }

    .form-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
        border: 0;
        padding: 0;
    }

    </style>

</head>

<body>

  <div class="box-search">

      {!! Form::open(array('action' => array('DashboardController@search'), 'class' => 'form form-wrapper cf', 'role' => 'search', 'method' => 'GET' )) !!}

          <input type="text" name="title" placeholder="Search event here..." required>

          <button type="submit">Search</button>

      {!! Form::close() !!}

  </div>



    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('') }}"><img src="{{ url('images') }}/pegiyo.png" width="30%"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('about') }}">About</a>
                    </li>
                    <li>
                        <a href="{{ url('latest') }}">Latest</a>
                    </li>
                    <li>
                        <a href="{{ url('oldest') }}">Oldest</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Full Page Image Background Carousel Header -->
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

        <!-- Wrapper for Slides -->
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

    <!-- Scripts
  	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  -->
    <script src="{{ asset('/js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
