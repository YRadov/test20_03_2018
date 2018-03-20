<?php

namespace App\Core\Helpers\Responses;


use App\Core\Models\User;
use App\Core\Transformers\UserTransformer;

class UserApiResp extends AApiResp
{
    public function registerUser(User $user)
    {
        $resp = new UserTransformer($user);

        return $resp;
    }//registerClient


}//AuthApiResp