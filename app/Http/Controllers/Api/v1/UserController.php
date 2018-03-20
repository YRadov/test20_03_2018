<?php

namespace App\Http\Controllers\Api\v1;

use App\Core\Helpers\Responses\UserApiResp;
use App\Core\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;

class UserController extends Controller
{
	protected $userService;
	protected $apiUserResp;

	public function __construct(UserService $userService, UserApiResp $apiUserResp)
	{
		$this->userService = $userService;
		$this->apiUserResp = $apiUserResp;
	}//__construct

	public function register(RegisterRequest $request)
    {
    	return $request->all();
    	$user = $this->userService->createNew($request->all());
        return $user;
    }//register


}// UserController
