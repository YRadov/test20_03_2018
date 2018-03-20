<?php

namespace App\Http\Controllers\Api\v1;

use App\Core\Helpers\Responses\UserApiResp;
use App\Core\Models\User;
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


	/**
	 * @api {post} /api/v1/registration  New User Register
	 */
	public function register(RegisterRequest $request)
    {
    	$user = $this->userService->createNew($request->all());

    	if (!$user) {
		    return $this->apiUserResp->fail("Registration failed");
    	}

	    /**
	     * @var $user User
	     */
	    return $this->apiUserResp->registerUser($user);

    }//register


	/**
	 * @api {get} /api/v1/user-details  Get User Details
	 *
	 * @apiHeaderExample {json} Header-Example:
	 * {
	 *      "Accept"        : "application/json"
	 *      "Authorization" : "Bearer d1ud5yQnjO3eeg64ZkmYupwGh6fKZJ4W"
	 * }
	 */
	public function details()
	{
		$user = $this->userService->getUser();

		if (!$user) {
			return $this->apiUserResp->fail("User not found");
		}

		/**
		 * @var $user User
		 */
		return $this->apiUserResp->userData($user);

	}//details

}// UserController
