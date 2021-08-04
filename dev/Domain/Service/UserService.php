<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Dev\Infrastructure\Models\User;
use Dev\Infrastructure\Repository\UserRepository;

/**
 *
 */
class UserService extends AbstractService
{
	/**
	 *
	 */
	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 *
	 */
	public function create($data = [])
	{
		$user= $this->repository->create($data);
		$user->roles()->sync($data['roles']);
		return  $this->show($user->id);
		
	}

	/**
	 *
	 */
	public function index(array $filter = [], int $limit = 15)
	{
		$repository = $this->repository;
		if (isset($filter['name'])) {
			$repository = $repository
				->Where('name', 'like', "%{$filter['name']}%")
				->orWhere('email', 'like', "%{$filter['name']}%");
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
	public function update(User $user, $data = [])
	{
		$user->update($data);
		$user->roles()->detach();
		$user->roles()->sync($data['roles']);
		return $this->show($user->id);
		

	}

	/**
	 *
	 */
	public function delete(User $user)
	{
		Storage::delete($user->photo);
		return $this->repository->destroy($user->id);
	}
	
}