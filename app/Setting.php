<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	protected $fillable = [
		'address',
		'contact',
		'email',
		'info',
		'chat',
		'paging',
		'slide_front',
		'slide_inside',
		'facebook',
		'twitter',
		'google',
		'rss'
	];

}
