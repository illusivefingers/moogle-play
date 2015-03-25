<?php

use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Artist extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'artists';

	protected $dates = ['deleted_at'];

}