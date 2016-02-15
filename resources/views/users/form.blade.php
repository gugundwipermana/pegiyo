<div class="form-group">

  {!! Form::label('name', 'Name') !!}

  {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('email', 'Email') !!}

  {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}

</div>

@if($jenis == 'add')
<div class="form-group">

  {!! Form::label('password', 'Password') !!}

  {!! Form::password('password', ['class' => 'form-control']) !!}

</div>
@endif

<div class="form-group">

  {!! Form::label('contact', 'Contact') !!}

  {!! Form::text('contact', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('info', 'Info') !!}

  {!! Form::textarea('info', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('level', 'Level') !!}

  {!! Form::select('level', array('1' => 'Event Organize', '2' => 'Administrator'), null, ['class' => 'form-control chosen-select']) !!}

</div>

<div class="form-group">

  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

</div>
