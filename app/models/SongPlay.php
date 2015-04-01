<?php

class SongPlay extends Eloquent
{
	protected $table = 'song_plays';

	protected $guarded =['*'];

	public $timestamps = false;

	public function getDates()
	{
		return ['started_at'];
	}

	public function userPlayed()
	{
		return $this->belongsTo('User');
	}

	public function song()
	{
		return $this->belongsTo('Song');
	}
}