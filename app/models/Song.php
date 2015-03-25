<?php

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Song extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'songs';

	protected $dates = ['deleted_at'];


}