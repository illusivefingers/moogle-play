<?php namespace MooglePlay\Service;

use \MooglePlay\Repository\UserRepositoryInterface;
use \MooglePlay\Transformer\UserSongPlayTransformer;
use \League\Fractal\Resource\Collection;
use \League\Fractal\Manager;

class UserService
{
	/**
	 * @var UserRepositoryInterface
	 */
	private $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function showAllUsers()
	{
		return $this->userRepository->all();
	}

	public function songsByUser($userId)
	{
		$users = $this->userRepository->songsByUser($userId);

		$fractal = new Manager();

		$resource = new Collection($users, new UserSongPlayTransformer);

		return $fractal->parseIncludes('song_plays')
			->createData($resource)
			->toArray();
	}
}