<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Permission;
use Dev\Infrastructure\Repository\PermissionRepository;

/**
 *
 */
class PermissionService extends AbstractService
{
	/**
	 *
	 */
	public function __construct(PermissionRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 *
	 */
	public function index()
	{
		$repository = $this->repository;		
		return $repository->get();
	}

	/**
	 *
	 */
	public function show(int $id)
	{
	}

	/**
	 *
	 */
	public function update(int $id, $data = [])
	{
	
	}

	/**
	 *
	 */
	public function delete(Permission $permission)
	{
	
	}

	
}