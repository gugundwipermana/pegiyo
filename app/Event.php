<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Event extends Model {

	protected $fillable = [
		'user_id',
		'title',
		'contents',
		'date_start',
		'date_end',
		'location',
		'city_id',
		'latitude',
		'longitude',
		'video',
		'banner',
		'type',
		'status'
	];

	public function scopePublished($query)
	{
		$query->where('date_end', '<=', Carbon::now());
	}

	public function scopeUnpublished($query)
	{
		$query->where('date_start', '>', Carbon::now());
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function city()
	{
		return $this->belongsTo('App\City');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}

	public function getTagListAttribute()
	{
		return $this->tags->lists('id');
	}

	public function locations()
	{
		return $this->hasMany('App\Location');
	}

	public function sponsors()
	{
		return $this->hasMany('App\Sponsor');
	}

	public function galleries()
	{
		return $this->hasMany('App\Gallery');
	}

}
