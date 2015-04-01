<?php

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Artist extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'artists';

	protected $dates = ['deleted_at'];

	protected $guarded =['*'];

	public function albums()
	{
		return $this->hasMany('Album');
	}

	public function songs()
	{
		return $this->hasManyThrough('Song', 'Album');
	}
}