<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Models\User;

/**
 *
 */
class UserRepository extends AbstractRepository
{
	/**
	 * @param $model User instance from User model
	 */
	public function __construct(User $model)
	{
		$this->model = $model;
	}
}