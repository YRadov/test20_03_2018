<?php

namespace App\Core\Helpers\Responses;


use App\Core\Models\User;
use App\Core\Transformers\UserTransformer;

class UserApiResp extends AApiResp
{
    public function registerUser(User $user)
    {
        $resp = new UserTransformer($user, ['email', 'created']);

        return $resp;
    }//registerClient

	public function userData(User $user)
	{
		$resp = new UserTransformer($user, ['id', 'token', 'created']);

		return $resp;
	}//userData
}//AuthApiResp