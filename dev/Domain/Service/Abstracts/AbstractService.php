<?php

namespace Dev\Domain\Service\Abstracts;

use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class AbstractService base class for all services
 * @package Dev\Domain\Service\Abstracts
 */
abstract class AbstractService
{
	/**
	 *
	 */
	protected $repository;

	/*
	 *
	 */
	public function __construct(AbstractRepository $repository)
	{
		$this->repository = $repository;
	}
}