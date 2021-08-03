<?php

namespace Dev\Application\Utility;

/**
 *
 */
class UserType
{
	/**
	 *
	 */
	const ADMIN = 'admin';

	
	/*
	 *
	 */
	const CLIENT = 'client';



	/**
	 *
	 */
	public static function statusArr() : array
	{
		return [
			self::ADMIN,
			self::CLIENT,
		
		];
	}
}