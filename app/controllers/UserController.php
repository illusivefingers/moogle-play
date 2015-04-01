<?php

use \MooglePlay\Repository\UserRepositoryInterface;
use \MooglePlay\Service\UserService;

class UserController extends BaseController
{

	/**
	 * @var UserRepository
	 */
	private $userRepository;

	/**
	 *
	 * @var UserService
	 */
	private $userService;

	public function __construct(UserRepositoryInterface $userRepository, UserService $userService)
	{
		$this->userRepository = $userRepository;
		$this->userService = $userService;
	}

	public function showWithModel()
	{
		return User::all();
	}

	public function showWithRepository()
	{
		return $this->userRepository->all();
	}

	public function showWithService()
	{
		$userService = new UserService($this->userRepository);
		return $userService->showAllUsers();
	}

	public function songsByUser($userId)
	{

		return $this->userService->songsByUser($userId);
	}

} 