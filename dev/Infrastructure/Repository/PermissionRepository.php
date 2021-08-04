<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Models\Permission;

/**
 *
 */
class PermissionRepository extends AbstractRepository
{
	/**
	 * @param $model Category instance from Category model
	 */
	public function __construct(Permission $model)
	{
		$this->model = $model;
	}
}