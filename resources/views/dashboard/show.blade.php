@extends('layout')

@section('maps')
<!-- script to maps -->
<?php echo $map['js']; ?>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
	function getLatLng(newLat, newLng)
	{
		$("#lat").val(newLat);
		$("#lng").val(newLng);
	}
</script>

<!-- script to galleries -->
<style>
      ul {
          padding:0 0 0 0;
          margin:0 0 0 0;
      }
      ul li {
          list-style:none;

      }
      ul li img {
          cursor: pointer;
      }
      .modal-body {
          padding:5px !important;
      }
      .modal-content {
          border-radius:0;
      }
      .modal-dialog img {
          text-align:center;
          margin:0 auto;
      }

    .controls{
        width:50px;
        display:block;
        font-size:11px;
        padding-top:8px;
        font-weight:bold;
    }
    .next {
        float:right;
        text-align:right;
    }

      /*override modal for demo only*/
      .modal-dialog {
          max-width:500px;
          padding-top: 90px;
      }
      @media screen and (min-width: 768px){
          .modal-dialog {
              width:500px;
              padding-top: 90px;
          }
      }
      @media screen and (max-width:1500px){
          #ads {
              display:none;
          }
      }
  </style>

@endsection

@section('content')

<div class="nav-foo">
	<div class="container">

		<ul class="nav navbar-nav">

		</ul>

		<ul class="nav navbar-nav navbar-right">
			<ol class="breadcrumb">
			  <li><a href="{{ url() }}">Home</a></li>
			  <li class="active">{{ $event->title }}</li>
			</ol>
		</ul>

  </div>
</div>

<!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-4">
							<p class="lead">Categories</p>
							<div class="list-group">

								@foreach($tags as $tag)

								<a href="{{ url('categories') }}/{{ $tag->id }}" class="list-group-item">{{ $tag->name }}</a>

								@endforeach

							</div>

                <p class="lead">Event Terkait</p>
                <div class="list-group">

									@foreach($relateds as $related)

										@if($related->id == $event->id)

										@else
											<a href="{{ $related->id }}" class="list-group-item">{{ $related->title }}</a>
										@endif

									@endforeach

                </div>

                <p class="lead">Sponsored By</p>
                <div class="list-group">
                  @foreach($sponsors as $sponsor)
                  <p>
                  <img src="img_upload/sponsors/{{ $sponsor->image_name }}" alt="..." width="50" height="50" class="img-rounded" align="middle">
                  {{ $sponsor->sponsor_name }}
                  </p>
                  @endforeach
                </div>
            </div>

            <div class="col-md-8">

              <h2>{{ $event->title }}</h2>

							<div class="row">
								<div class="col-md-6">

									<img src="img_upload/banner/{{ $event->banner }}"   class="img-responsive img-thumbnail" alt="Responsive image" />

								</div>
								<div class="col-md-6">

									<table class="table">
		                <tr>
		                  <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></td>
		                  <td>{{ date('d F Y', strtotime($event->date_start)) }} - {{ date('d F Y', strtotime($event->date_end)) }}</td>
		                </tr>
										<tr>
		                  <td><span class="glyphicon glyphicon-time" aria-hidden="true"></span></td>
		                  <td>{{ date('H:i', strtotime($event->date_start)) }} - {{ date('H:i', strtotime($event->date_end)) }}</td>
		                </tr>
		                <tr>
		                  <td><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></td>
		                  <td>{{ $event->location }} - {{ $event->city->city_name }}</td>
		                </tr>
										<tr>
		                  <td><span class="glyphicon glyphicon-user" aria-hidden="true"></span></td>
		                  <td>{{ $event->user->name }}</td>
		                </tr>
		              </table>

								</div>
							</div>




							<hr/>

              <p>{{ $event->contents }}</p>

							<hr/>

							<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>  Category / Tag

              @foreach($event->tags as $tag)

                {{ $tag->name }}

              @endforeach


              <hr/>

              <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#maps" aria-controls="maps" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Maps</a></li>
                  <li role="presentation"><a href="#galleries" aria-controls="galleries" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Galleries</a></li>
                  <!--<li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comments</a></li>-->
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

									<!-- MAPS ---------------------------------------->
                  <div role="tabpanel" class="tab-pane active" id="maps">
                    <hr/>
                    <div>
          						<?php echo $map['html']; ?>
          					</div>
                  </div>

									<!-- GALLERY ---------------------------------------->
                  <div role="tabpanel" class="tab-pane" id="galleries">
                    <hr/>
										<ul class="row">

											@foreach($galleries as $gallery)





													<li class="col-lg-3 col-md-2 col-sm-3 col-xs-4">
															<img class="img-thumbnail img-responsive" src="img_upload/galleries/{{ $gallery->gallery_name }}">
													</li>





											@endforeach


					          </ul>

                  </div>
									<!--
                  <div role="tabpanel" class="tab-pane" id="comments">
                    <hr/>

                  </div>
								-->
                </div>

              </div>

            </div>

        </div>

    </div>
    <!-- /.container -->


		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
