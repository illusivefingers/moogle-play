<?php namespace MooglePlay\Provider;

use \Illuminate\Support\ServiceProvider;
use \MooglePlay\Repository\UserRepositoryInterface;
use \MooglePlay\Repository\Eloquent\EloquentUserRepository;

class MooglePlayServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->singleton(UserRepositoryInterface::class, function() {
			return new EloquentUserRepository( new \User());
		});
	}
}