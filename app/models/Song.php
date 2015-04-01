<?php

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Song extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'songs';

	protected $dates = ['deleted_at'];

	protected $guarded =['*'];

	public function album()
	{
		return $this->belongsTo('Album');
	}

	public function artist()
	{
		return $this->belongsTo('Artist');
	}

	public function usersPlayed()
	{
		return $this->belongsToMany('User', 'song_plays')
			->withPivot('started_at');
	}

	public function getStartedAtAttribute()
	{
		return $this->pivot->started_at;
	}

	public function songPlay()
	{
		return $this->hasMany('SongPlay');
	}
}