<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Role;
use Dev\Infrastructure\Repository\RoleRepository;

/**
 *
 */
class RoleService extends AbstractService
{
	/**
	 *
	 */
	public function __construct(RoleRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 *
	 */
	public function create($data = [])
	{
		$role = new Role();
		$role->name_arabic =$data['name_arabic'];
		$role->name_english =$data['name_english'];
		$role->description_arabic =$data['description_arabic'];
		$role->description_english =$data['description_english'];
		$role->save();
		$role->permissions()->sync($data['permissions']); 
		return $role;
	}

	/**
	 *
	 */
	public function index(array $filter = [], int $limit = 15)
	{
		$repository = $this->repository;
		if (isset($filter['name'])) {
			$repository = $repository
				->where('name_arabic', 'like', "%{$filter['name']}%")
				->orWhere('name_english', 'like', "%{$filter['name']}%")
				->orWhere('description_ar', 'like', "%{$filter['name']}%")
				->orWhere('description_en', 'like', "%{$filter['name']}%");
		}
		return $repository->paginate($limit);
	}

	/**
	 *
	 */
	public function show(int $id)
	{
		return $this->repository->find($id);
	}

	/**
	 *
	 */
	public function update(Role $role, $data = [])
	{
		$role->name_arabic =$data['name_arabic'];
		$role->name_english =$data['name_english'];
		$role->description_arabic =$data['description_arabic'];
		$role->description_english =$data['description_english'];
		$role->save();
		$role->permissions()->detach();
		$role->permissions()->sync($data['permissions']);
		return $this->show($role->id);
	}

	/**
	 *
	 */
	public function delete(Role $role)
	{
		return $this->repository->destroy($role->id);
	}


	/**
	 *
	 */
	public function getAllRoles()
	{
		return $this->repository->all();
	}

	
}