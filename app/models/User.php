<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'users';

	protected $dates = ['deleted_at'];

	protected $guarded =['*'];

	public function songsPlayed()
	{
		return $this->belongsToMany('Song', 'song_plays')
			->withPivot('started_at');
	}

	public function songPlays()
	{
		return $this->hasMany('SongPlay');
	}
}