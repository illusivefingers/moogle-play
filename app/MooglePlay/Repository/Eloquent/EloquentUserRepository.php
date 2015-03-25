<?php namespace MooglePlay\Repository\Eloquent;

use \MooglePlay\Repository\AbstractRepository;
use \MooglePlay\Repository\UserRepositoryInterface;

class EloquentUserRepository extends AbstractRepository implements UserRepositoryInterface
{
	public function __construct(\User $model)
	{
		parent::__construct($model);
	}

}