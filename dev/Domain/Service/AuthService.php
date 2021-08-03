<?php

namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Repository\UserRepository;
use Dev\Infrastructure\Models\User;



/**
 *
 */
class AuthService extends AbstractService
{
	
	/**
	 *
	 */
	public function __construct(
		UserRepository $repository

	) {
		$this->repository = $repository;
	}

/**
	 *
	 */
	public function create($data = [])
	{
		return $this->repository->create($data);
	}

	/**
	 *
	 */
	public function index(int $limit = 15)
	{
		return $this->repository->paginate($limit);
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
	public function update(int $id, $data = [])
	{ 

		$this->repository->where('id', $id)->update($data);
		return $this->show($id);
	}

	/**
	 *
	 */
	public function delete(User $user)
	{
		$this->repository->destroy($user->id);
	}

	
}