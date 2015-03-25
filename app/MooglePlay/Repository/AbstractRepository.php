<?php namespace MooglePlay\Repository;

use \Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Collection;

abstract class AbstractRepository implements RepositoryInterface
{
	/**
	 * The Eloquent model on which these methods operate.
	 *
	 * @var Model
	 */
	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	/**
	 * @param array $attributes
	 * @return static
	 */
	public function create( array $attributes )
	{
		return $this->model->create($attributes);
	}

	/**
	 * @param array $columns
	 * @return Collection|static[]
	 */
	public function all($columns = ['*'])
	{
		return $this->model->all($columns);
	}


	public function find($id, $columns = ['*'])
	{
		return $this->model->find($id, $columns);
	}

	public function destroy($ids)
	{
		return $this->model->destroy($ids);
	}
}