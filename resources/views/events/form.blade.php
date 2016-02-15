<link href="{{ asset('/css/bootstrap-combined.min.css') }}" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">

<div class="form-group">

  {!! Form::label('title', 'Title') !!}

  {!! Form::text('title', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('contents', 'Contents') !!}

  {!! Form::textarea('contents', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('date_start', 'Date Start') !!}

  <div id="date_start" class="input-append date">
    {!! Form::input('text', 'date_start', strftime('%Y-%m-%dT%H:%M', strtotime($date_start)), ['class' => '']) !!}
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
    </span>
  </div>


</div>

<div class="form-group">

  {!! Form::label('date_end', 'Date End') !!}

  <div id="date_end" class="input-append date">
    {!! Form::input('text', 'date_end', strftime('%Y-%m-%dT%H:%M', strtotime($date_end)), ['class' => '']) !!}
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
    </span>
  </div>



</div>

<div class="form-group">

  {!! Form::label('location', 'Location') !!}

  {!! Form::text('location', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('city_id', 'City Name') !!}

  {!! Form::select('city_id', $cities, null, ['class' => 'form-control chosen-select']) !!}

</div>

@if($jenis == 'add')
<div class="form-group">

  {!! Form::label('banner', 'Banner') !!}

  {!! Form::file('banner', ['class' => 'form-control']) !!}

</div>
@endif

<div class="form-group">

  {!! Form::label('type', 'Type') !!}

  {!! Form::select('type', array('1' => 'Free', '2' => 'Pro'), null, ['class' => 'form-control']) !!}

</div>

<!-- {!! Form::hidden('status', '1', ['class' => 'form-control']) !!} -->

<div class="form-group">

  {!! Form::label('tag_list', 'Kategori') !!}

  {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control chosen-select', 'multiple']) !!}

</div>

<div class="form-group">

  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

</div>
