<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Models\Role;

/**
 *
 */
class RoleRepository extends AbstractRepository
{
	/**
	 * @param $model Category instance from Category model
	 */
	public function __construct(Role $model)
	{
		$this->model = $model;
	}
}