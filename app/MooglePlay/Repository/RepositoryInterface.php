<?php namespace MooglePlay\Repository;

interface RepositoryInterface
{
	public function create( array $attributes );

	public function all($columns = ['*']);

	public function find($id, $columns = ['*']);

	public function destroy($ids);
}