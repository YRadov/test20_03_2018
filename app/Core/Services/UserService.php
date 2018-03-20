<?php
/**
 * User: <radov.yuriy@ukr.net>
 * Date: 20.03.2018
 */

namespace App\Core\Services;


use App\Core\Repositories\UserRepository;

class UserService
{
	protected $userRep;

	public function __construct(UserRepository $userRep ) {
		$this->userRep = $userRep;
	}

	public function createNew($params)
	{
		$email = $params['email'];
		$password = $params['password'];

		return $this->userRep->addNew($email, $password);
	}// createNew


	public function getUser()
	{
		$user_id = \Auth::user()->id;
		return $this->userRep->getById($user_id);
	}//getUser

}// UserService