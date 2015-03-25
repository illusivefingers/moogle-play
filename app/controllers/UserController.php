<?php

use \MooglePlay\Repository\UserRepositoryInterface;
use \MooglePlay\Service\UserService;

class UserController extends BaseController
{
	private $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
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
} 