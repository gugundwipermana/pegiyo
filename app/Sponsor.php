<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model {

	protected $fillable = [
		'event_id',
		'image_name',
		'sponsor_name',
		'type'
	];

	public function event()
	{
		return $this->belongsTo('App\Event');
	}

}
