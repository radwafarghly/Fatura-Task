<?php

namespace App\Http\Response\Utility;

use Dev\Application\Utility\UserStatus;
use Dev\Application\Exceptions\InvalidArgumentException;
use Dev\Application\Utility\UserType;

/**
 *
 */
final class ResponseType
{
	/**
	 *
	 */
	public static function simpleResponse(string $message, bool $success, array $aux = [],array $permission = [])
	{
		return array_merge([   
			"data" => [], 
            "message" => $message,
            "success" => $success
        ], $aux,$permission);	
	}

	public static function userStatusResponseMessage(string $status) {
		if (!in_array($status, UserType::statusArr())) {
			throw new InvalidArgumentException("Invalid user status");
		}
		$messages = [
			UserType::ADMIN => 'This account is in admin',
			UserType::DOCTOR => 'This account has doctor',
			UserType::CLIENT => 'This account has client',
		];
		return $messages[$status];
	}
}