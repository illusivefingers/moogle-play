<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'users';

	protected $dates = ['deleted_at'];

}