<?php

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Album extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'albums';

	protected $dates = ['deleted_at'];

}