<div class="form-group">

  {!! Form::label('city_name', 'City Name') !!}

  {!! Form::text('city_name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('province_id', 'Province') !!}

  {!! Form::select('province_id', $provinces, null, ['class' => 'form-control chosen-select']) !!}

</div>

<div class="form-group">

  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

</div>
