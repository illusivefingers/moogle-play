<?php namespace MooglePlay\Service;

use \MooglePlay\Repository\UserRepositoryInterface;

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
}