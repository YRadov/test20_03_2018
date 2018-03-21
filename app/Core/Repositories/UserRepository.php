<?php
/**
 * User: <radov.yuriy@ukr.net>
 * Date: 20.03.2018
 */

namespace App\Core\Repositories;


use App\Core\Models\User;
use Hash;

class UserRepository extends ADefaultRepository
{
	public function __construct( User $model ) {
		parent::__construct( $model );
	}

	public function addNew($email, $password)
	{
		return User::create([
				'email'        => $email,
				'password'     => Hash::make($password),
				'api_token'    => str_random(60),
			]
		);
	}//addNew

	public function getById($user_id)
	{
		return $this->getOne($user_id);
	}//getById
}//UserRepository