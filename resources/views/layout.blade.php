
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
		<link href="{{ asset('/css/shop-homepage.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/chosen.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

		@yield('maps')

</head>

<body>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-default">
      <div class="container">

          <div class="navbar-header">

              <a class="navbar-brand" href="{{ url('') }}"><img src="{{ url('images') }}/pegiyo.png" width="50%"/></a>
          </div>

          <div class="navbar-contact" id="">
              <ul class="nav navbar-nav navbar-right">
                <li role="presentation" class="disabled">
                    <a href="#"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> {{ $setting->contact }}</a>
                </li>
                <li role="presentation" class="disabled">
                    <a href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> {{ $setting->chat }}</a>
                </li>
              </ul>
          </div>

      </div>
      </div>

        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="{{ url('') }}">Pegiyo.com</a> -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

              <ul class="nav navbar-nav">
                  <li>
                      <a href="{{ url('about') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> About</a>
                  </li>
                  <li>
                      <a href="{{ url('latest') }}"><span class="glyphicon glyphicon-indent-left" aria-hidden="true"></span> Latest</a>
                  </li>
                  <li>
                      <a href="{{ url('oldest') }}"><span class="glyphicon glyphicon-indent-right" aria-hidden="true"></span> Oldest</a>
                  </li>
              </ul>

                <ul class="nav navbar-nav navbar-right">
                    <!--
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Full Width Page</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Sidebar Page</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>
                        </ul>
                    </li>
                  -->
                    <li class="searchup">
                        <a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                    </li>
                    <li class="searchout active">
                        <a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="after-nav"></div>


   <div class="form-search">
     <div class="container">
       <div class="row">

           <div class="col-md-3"></div>

           <div class="col-md-6">

               {!! Form::open(array('action' => array('DashboardController@search'), 'class' => 'form', 'role' => 'search', 'method' => 'GET' )) !!}


                 <div class="form-group">
                   <div class="input-group">
                     <span class="input-group-addon" id="basic-addon1">
                       <span class=" glyphicon glyphicon-search" aria-hidden="true"></span>
                     </span>

                     {!! Form::text('title', null, array('class' => 'form-group form-control', 'placeholder' => 'Search title event...')) !!}

                   </div>
                 </div>

                 <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>

                          {!! Form::text('date_start', null, array('class' => 'form-group form-control datepicker', 'id' => 'date_start', 'data-date-format' => 'yyyy-mm-dd')) !!}

                        </div>
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>

                        {!! Form::text('date_end', null, array('class' => 'form-group form-control datepicker', 'id' => 'date_end', 'data-date-format' => 'yyyy-mm-dd')) !!}

                      </div>
                    </div>
                  </div>

                </div>

                <div class="row">

                 <div class="col-md-6">
                   <div class="form-group">
                     <div class="input-group">
                       <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>

                       {!! Form::select('city_id', $cities, null, ['class' => 'form-control chosen-select select-front']) !!}

                     </div>
                   </div>
                 </div>

                 <div class="col-md-6">
                   <div class="form-group">
                     <div class="input-group">
                       <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>

                       {!! Form::select('user_id', $users, null, ['class' => 'form-control chosen-select select-front']) !!}

                     </div>
                   </div>
                 </div>

               </div>



         </div>

         <div class="col-md-3">

           <div class="after-nav"></div>

           {!! Form::submit('Search', array('class' => 'btn btn-default search-bar-btn')) !!}

           {!! Form::close() !!}

         </div>
      </div>
    </div>
  </div>




		@yield('content')

  <div class="info-foo">
		<div class="container">

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Info</h2>
          <p class="text-danger">{{ str_limit($setting->info, $limit = 300, $end = '...') }}</p>
          <p><a href="{{ url('about') }}" class="btn btn-primary btn-only-border">Read more</a></p>

        </div>
        <div class="col-lg-4">
          <h2>Contact</h2>
          <li class="disabled">
              <span class="glyphicon glyphicon-home" aria-hidden="true"></span>  {{ $setting->address }}
          </li>
          <li class="disabled">
            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>  {{ $setting->contact }}
          </li>
          <li class="disabled">
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>  {{ $setting->email }}
          </li>

       </div>
        <div class="col-lg-4">
          <img src="{{ url('images') }}/pegiyo.png" width="300"/>
          <div class="after-nav"></div>
          <div class="row">
            <div class="col-xs-12">
              <a href="http://{{ $setting->facebook }}"><img src="{{ asset('images/Facebook.png') }}" /></a>
              <a href="http://{{ $setting->twitter }}"><img src="{{ asset('images/Twitter.png') }}" /></a>
              <a href="http://{{ $setting->google }}"><img src="{{ asset('images/Google+.png') }}" /></a>
              <a href="http://{{ $setting->rss }}"><img src="{{ asset('images/Feed.png') }}" /></a>
            </div>
          </div>

        </div>
      </div>
      <!-- Site footer -->
    </div>
    <!-- /.container -->
    <div class="footer">
      <div class="container">
        <ul class="nav navbar-nav navbar-right">
          <p>&copy; Pegiyo | 2015</p>
        </div>
      </div>
    </div>
  </div>

		<!-- Scripts
  	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  -->
    <script src="{{ asset('/js/jquery-1.11.2.min.js') }}"></script>
  	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>


  	<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
  	<script src="{{ asset('/js/bootstrap-datepicker.id.min.js') }}"></script>


    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

    <!-- Scropt to show and hide form search -->
    <script type="text/javascript">

      $(document).ready(function() {

        $(".form-search").hide();
        $(".searchout").hide();

        $(".searchup").click(function(){
          $(".form-search").show("normal");
          $(".searchout").show();
          $(".searchup").hide();
        });

        $(".searchout").click(function(){
          $(".form-search").hide("normal");
          $(".searchout").hide();
          $(".searchup").show();
        });

      });

    </script>

    <!-- Scropt to show datepicker -->
    <script type="text/javascript">
      $(document).ready(function() {
          $('#date_start').datepicker({

          });
          $('#date_end').datepicker({

          });
      } );
    </script>

    <script src="{{ asset('/js/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".chosen-select").chosen({width: "100%"});
      } );
    </script>

    <script src="{{ asset('/js/photo-gallery.js') }}"></script>


</body>

</html>
