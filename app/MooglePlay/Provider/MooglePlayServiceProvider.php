<?php namespace MooglePlay\Provider;

use \Illuminate\Support\ServiceProvider;
use \MooglePlay\Repository\UserRepositoryInterface;
use \MooglePlay\Repository\Eloquent\EloquentUserRepository;
use \League\Fractal\Manager;

class MooglePlayServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->app->singleton(UserRepositoryInterface::class, function() {
			return new EloquentUserRepository( new \User());
		});

		$this->app->singleton(UserService::class, function() {
			return $this->app->make('\MooglePlay\Service\UserService');
		});

		$this->app->bind(
			'League\Fractal\Serializer\SerializerAbstract',
			'League\Fractal\Serializer\DataArraySerializer'
		);
	}
}