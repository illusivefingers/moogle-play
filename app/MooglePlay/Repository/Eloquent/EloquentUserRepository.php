<?php namespace MooglePlay\Repository\Eloquent;

use \MooglePlay\Repository\AbstractRepository;
use \MooglePlay\Repository\UserRepositoryInterface;
use \User;

class EloquentUserRepository extends AbstractRepository implements UserRepositoryInterface
{
	public function __construct(\User $model)
	{
		parent::__construct($model);
	}

	public function songPlays()
	{

	}

	public function songsByUser($userId)
	{
		/*
		 * Example of an advanced query with eager loading multiple relations combined with
		 * ordering of an attribute on a pivot table column.
		 */
		return User::with([
				'songsPlayed' => function($query) {
					return $query->orderBy('song_plays.started_at', 'desc');
				},
				'songsPlayed.songPlay'
			])
			->where('users.id', '=', $userId)
			->get();
	}
}