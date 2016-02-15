<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

	protected $fillable = [
		'event_id',
		'name',
		'type',
		'description',
		'latitude',
		'longitude'
	];

	public function event()
	{
		return $this->belongsTo('App\Event');
	}

}
