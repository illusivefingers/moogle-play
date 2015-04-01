<?php namespace MooglePlay\Repository;

interface UserRepositoryInterface extends RepositoryInterface
{

	public function songPlays();

	public function songsByUser($userId);

}