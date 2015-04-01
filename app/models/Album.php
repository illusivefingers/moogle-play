<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;
use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Album extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'albums';

	protected $dates = ['deleted_at'];

	protected $guarded = ['*'];

	public function artist()
	{
		return $this->belongsTo('Artist');
	}

	public function songs()
	{
		return $this->hasMany('Song');
	}
}