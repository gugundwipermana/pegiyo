<html>
<head>
  <?php echo $map['js']; ?>

  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script type="text/javascript">
		function getLatLng(newLat, newLng)
		{
			$("#lat").val(newLat);
      $("#lng").val(newLng);
		}
	</script>

</head>
<body>
  <?php echo $map['html']; ?>

  {!! Form::text('lat', null, ['class' => 'form-control', 'id' => 'lat']) !!}

  {!! Form::text('lng', null, ['class' => 'form-control', 'id' => 'lng']) !!}

</body>
</html>
